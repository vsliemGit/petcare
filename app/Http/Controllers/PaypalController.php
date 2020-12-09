<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use URL;
use DB;
use Config;
use Cart;
use Auth;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    private $_api_context;
    private const CURRENCY = 'USD';

    public function __construct(Request $request){
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function purchaseWithPaypal(Request $request){
        try{   
            //A resource representing a Payer that funds a payment
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            //Create a new item list and assign the item
            $items = array();
            $total = 0;
  
            Cart::instance('cart');
            $cart_content = Cart::content();

            //Create list Items and save orderdetail
            foreach($cart_content as $product){
                $price = ceil(($product->price/23));
                $item = new Item();
                $item->setName($product->name) /** item name **/
                    ->setCurrency(self::CURRENCY)
                    ->setQuantity($product->qty)
                    ->setPrice($price);
                array_push($items, $item);
                $total += ($price*$product->qty);
                // Cart::instance('cart')->remove($product->rowId);
            }
                
            $item_list = new ItemList();
            $item_list->setItems($items);
        
            //The total payment amount - additional detail such as shipping , tax can be added
            $amount = new Amount();
            // $amount->setCurrency("USD")
            //     ->setTotal($request->get('total'));
            $amount->setCurrency(self::CURRENCY)
                    ->setTotal($total);

            //A Transaction defines the contract of payment
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                        ->setItemList($item_list)
                        ->setDescription('Payment description');
            
            // //Set the redirect urls after approval/ cancellation
            $redirect_urls = new RedirectUrls();
            // $redirect_urls->setReturnUrl(sprintf('%s%s', URL::to('/payments/paypal-status'), '?success=true'))
            //              ->setCancelUrl(sprintf('%s%s', URL::to('/payments/paypal-status'), '?success=false'));
            $redirect_urls->setReturnUrl(route('payment.status', ['success' => true,
                                'to_name' => $request->to_name,
                                'to_email' => $request->to_name,
                                'to_phone' => $request->to_phone,
                                'to_address' => $request->to_address,
                                'transfer_id' => $request->transfer,
                                'message' => $request->message ]))
                        ->setCancelUrl(route('payment.status', ['success' => true,
                            'to_name' => $request->to_name,
                            'to_email' => $request->to_name,
                            'to_phone' => $request->to_phone,
                            'to_address' => $request->to_address,
                            'transfer_id' => $request->transfer,
                            'message' => $request->message ]));

            //Init the payment with intent to "Sale"
            $payment = new Payment();
            $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));    
            try {

                $payment->create($this->_api_context);
    
            } catch (\PayPal\Exception\PPConnectionException $ex) {
    
                if (Config::get('app.debug')) {
                    Session::put('error', 'Connection timeout');
                    return redirect()->route('paypal.test');
                } else {
                    Session::put('error', 'Some error occur, sorry for inconvenient');
                    return redirect()->route('paypal.test');
                }  
            }
            
            //Handle the paypal redirects
            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;  
                }  
            }  
           


            if (isset($redirect_url)) {
                /** redirect to paypal **/
                return Redirect::away($redirect_url);
            }

            Session::put('error', 'Unknown error occurred');
            return redirect()->route('paypal.test');

        }catch(Throwable $e){
            throw $e;
        }
    }

    public function getPaypalPaymentStatus(Request $request){
        try{
            $dataArray = $request->all();
            //If the request success is true proceed with payment excution 
            if($dataArray['success'] == true){
                if(empty($dataArray['PayerID']) || empty($dataArray['token'])){
                    Session::put('alert-danger', 'There was a problem processing your payment');
                    return Redirect::route('frontend.home');
                }
                $payment = Payment::get($dataArray['paymentId'], $this->_api_context);
                $execution = new PaymentExecution();
                $execution->setPayerId($dataArray['PayerID']);

                //Execute the payment
                $result = $payment->execute($execution, $this->_api_context);
                //Put success message in section and redirect home
                if($result->getState() == 'approved'){
                    Session::put('alert-success', 'Payment success');
                    $order_id =  DB::table('orders')->insertGetId([
                        'customer_id' => Auth::guard('customer')->user()->id,
                        'transfer_id' => $request->transfer_id,
                        'payment_id' => 2,
                        'order_adress' => $request->to_address,
                        'order_notes' => "thanh toan paypal"
                    ]);
                    Cart::instance('cart');
                    $cart_content = Cart::content();
                    foreach($cart_content as $product){
                        DB::table('order_details')->insert([
                            'product_id' => $product->id,
                            'order_id' => $order_id,
                            'order_detail_quantity' => $product->qty
                        ]);
                        Cart::instance('cart')->remove($product->rowId);
                    } 
                    return Redirect::route('frontend.home');
                }
            }
            Session::put('alert-danger', 'Payment failed');
            return Redirect::route('frontend.home');

        }catch(Throwable $e){
            throw $e;
        }
    }
}
