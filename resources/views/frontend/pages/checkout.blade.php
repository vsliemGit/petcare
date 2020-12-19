{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Content of checkout --}}
@section('main-content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Step 1</h2>
        </div>
        {{-- <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options-->

        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req--> --}}

        <div class="shopper-informations">
            <div class="row">
                @if(Auth::guard('customer')->check())
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>Shopper Information</p>
                            <form>
                                <span for="name">Name: </span>
                                <input type="text" name="name" placeholder="Display Name" value="{{Auth::guard('customer')->user()->name}}" readonly>
                                <span for="email">Email: </span>
                                <input type="text" name="email" placeholder="User Name" value="{{Auth::guard('customer')->user()->email}}" readonly>
                                <span for="phone">Phone number: </span>
                                <input type="text" name="phone" placeholder="User Name" value="{{Auth::guard('customer')->user()->phone}}" readonly>
                                <span for="username">Username: </span>
                                <input type="text" name="username" placeholder="User Name" value="{{Auth::guard('customer')->user()->username}}" readonly>
                                {{-- <label>Sex: </label>
                                <div>
                                    <input type="radio" id="huey" name="drone" value="huey"
                                            checked>
                                    <label for="huey">Male</label>
                                </div>
                                <span>
                                    <input type="radio" id="dewey" name="drone" value="dewey">
                                    <label for="dewey">Femaile</label>
                                </span> --}}
                            </form>
                            {{-- <a class="btn btn-primary" href="">Get Quotes</a>
                            <a class="btn btn-primary" href="">Update account</a> --}}
                        </div>
                    </div>
                @endif
                
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">                         
                            <form id="form_bill_info" method="post">
                                @csrf
                                <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}" >
                                <span for="to_name">To Name: </span>
                                <input type="text" name="to_name" placeholder="Name *" value="{{Auth::guard('customer')->user()->name}}" required>
                                <span for="to_email">To Email: </span>
                                <input type="text" name="to_email" placeholder="Email*" value="{{Auth::guard('customer')->user()->email}}" required>
                                <span for="to_phone">To Phone: </span>                            
                                <input type="text" name="to_phone" placeholder="Phone number *" value="{{Auth::guard('customer')->user()->phone}}" required>
                                <span for="to_address">To Address: </span>
                                <input type="text" name="to_address" placeholder="Address 1 *" value="{{Auth::guard('customer')->user()->address}}" required>
                        </div>
                        <div class="form-two">
                                {{-- <select name="transfer">
                                    <option value="" selected hidden>Choose Transfer method</option>
                                    @foreach ($listTransfersMethod as $transfer)
                                        <option value="{{ $transfer->transfer_id }}">{{ $transfer->transfer_name }}</option>
                                    @endforeach
                                </select> --}}
                                <p>Shipping Method</p>
                                @foreach ($listTransfersMethod as $transfer)
                                <div>
                                    @if ($loop->index == 0)
                                        <input type="radio" name="transfer" value="{{$transfer->transfer_id}}" checked="checked">
                                        {{$transfer->transfer_name}} <br>
                                    @else
                                        <input type="radio" name="transfer" value="{{$transfer->transfer_id}}">
                                        {{$transfer->transfer_name}} <br>
                                    @endif
                                </div>
                                @endforeach
                                <div><br></div>
                                <p>Payment Method</p>
                                @foreach ($listPaymentsMethod as $payment)
                                <div>
                                    @if ($loop->index == 0)
                                    <input type="radio" id="radio_{{$loop->index}}" name="payment" value="{{$payment->payment_id}}" checked="checked">
                                        {{$payment->payment_name}} <br>
                                    @else
                                        <input type="radio" id="radio_{{$loop->index}}"  name="payment" value="{{$payment->payment_id}}">
                                        {{$payment->payment_name}} <br>
                                    @endif
                                </div>
                                @endforeach 
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Notes Order</p>
                        <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                        {{-- <label><input type="checkbox"> Shipping to bill address</label> --}}
                        {{-- <div>
                            <a class="btn btn-default check_out" href="" style="width: 200px;">Order Now</a>
                        </div> --}}
                    </div>	
                </div>
            </form>					
            </div>
        </div>
        <div class="step-one">
            <h2 class="heading">Step 2</h2>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                {{-- @php
                    $cart_content = Cart::instance('cart')->content();
                @endphp --}}
                <tbody>
                    @foreach($cart_content as $product)
                    <tr id="product_{{ $product->id }}">
                        <td class="cart_product">
                            <a href=""><img style="width: 100px; hight: 150px;" src="{{ asset('storage/images/'. $product->options->image ) }}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{ route('frontend.product_detail', ['id' => $product->id]) }}">{{ $product->name }}</a></h4>
                            <p>Web ID: {{ $product->id }}</p>
                        </td>
                        <td class="cart_price">
                            <p>$ {{ number_format($product->price) .' '. 'VNĐ' }}</p>
                        </td>
                        <form action="{{ route('update-to-cart') }}" method="post" class="form-update">
                            @csrf
                        <input type="hidden" name="rowId" value="{{ $product->rowId }}">
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="javascript:void(0)"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product->qty }}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="javascript:void(0)"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                        <p class="cart_total_price" id="{{ $product->id }}">$ {{ number_format($product->priceTotal).' VNĐ' }}</p>
                        </td>                      
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" data-product-id="{{ $product->id }}" data-id="{{ $product->rowId }}" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                                <button type="submit" class="cart_quantity_update" data-id="{{ $product->id  }}" href="javascript:void(0)"><i class="fa fa-refresh"></i></button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td><span id="subtotal">${{ Cart::subtotal() .' '. 'VNĐ' }}</span></td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>$0 VNĐ</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span id="subtotal">${{ Cart::subtotal() .' '. 'VNĐ' }}</span></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span>
                                        <button id="checkout" class="btn btn-default check_out"
                                        {{ ( Cart::content()->count() < 1) ? "disabled" : "" }}>
                                            Order Now</button>
                                        {{-- <form action="{{route('payments.purchase')}}" method="post"> --}}
                                            
                                            <button id="checkout_paypal" class="btn btn-default check_out"
                                            {{ ( Cart::content()->count() < 1) ? "disabled" : "" }}>
                                            Order With Paypal</button>
                                        {{-- </form> --}}
                                            
                                    </span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection

@section('custom-scripts')
<script>
    //Script load page
    $(document).ready(function(){
        $("#checkout_paypal").hide();
    })
    //Setup CSRF to AJAX
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $('#checkout_paypal').click(function(){
        $('#form_bill_info').attr('action', '{{route("payments.purchase")}}');
        $('#form_bill_info').submit();
    });
    
    //Checkout
    $("#checkout").click(function(e){
        e.preventDefault();
        let form = $('#form_bill_info');
        let url = "{{route('order')}}";
        $.ajax(
            {
                url: url,
                type: "POST",
                dataType : 'json',
                data: form.serialize()
            }).done(function(data){               
                swal('Success!', data.message);
                setTimeout(function() { 
                    window.open(data.redirectUrl,  "_self", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes");
                }, 3000);
            }).fail(function(data){
                swal("Error!", data.message , "error");
            });
    });

    //Show/Hide button checkout method
    $('input[type=radio][name=payment]').change(function () {
        if (this.value == 1) {
            if($("#checkout").is(":hidden")){
                $("#checkout").show();
            }
            if($("#checkout").is(":visible")){
                $("#checkout_paypal").hide();
            }
        }
        else if (this.value == 2) {
            if($("#checkout_paypal").is(":hidden")){
                $("#checkout_paypal").show();
            }
            if($("#checkout").is(":visible")){
                $("#checkout").hide();
            }
        }
    });
</script>
@endsection
