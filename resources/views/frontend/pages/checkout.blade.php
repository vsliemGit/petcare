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
                                <label for="name">Name: </label>
                                <input type="text" name="name" placeholder="Display Name" value="{{Auth::guard('customer')->user()->name}}">
                                <label for="username">Username: </label>
                                <input type="text" name="username" placeholder="User Name" value="{{Auth::guard('customer')->user()->username}}">
                                <label for="email">Email: </label>
                                <input type="text" name="email" placeholder="User Name" value="{{Auth::guard('customer')->user()->email}}">
                                <label for="phone">Phone number: </label>
                                <input type="text" name="phone" placeholder="User Name" value="{{Auth::guard('customer')->user()->phone}}">
                                <label>Sex: </label>
                                <div>
                                    <input type="radio" id="huey" name="drone" value="huey"
                                            checked>
                                    <label for="huey">Male</label>
                                </div>
                                <span>
                                    <input type="radio" id="dewey" name="drone" value="dewey">
                                    <label for="dewey">Femaile</label>
                                </span>
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
                            <form>
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Email*">                             
                                <input type="text" placeholder="Phone number *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            {{-- <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                        {{-- <div>
                            <a class="btn btn-default check_out" href="" style="width: 200px;">Order Now</a>
                        </div> --}}
                    </div>	
                </div>					
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
                                    <td><span id="subtotal">$ {{ Cart::subtotal() .' '. 'VNĐ' }}</span></td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>$2</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>$61</span></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span>
                                        <a class="btn btn-default check_out" href="">Order Now</a>
                                    </span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->

@endsection