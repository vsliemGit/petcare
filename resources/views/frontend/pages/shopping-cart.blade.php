{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Content of shopping-cart --}}
@section('main-content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info" id="tablene">
           {{-- @php
            $cart_content = Cart::content();
            //    echo "<pre>";
            //   print_r($cart_content);
            //   echo "</pre>";
           @endphp --}}
           
            @php
                $cart_content = Cart::content();
            @endphp           
                
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
                </tbody>
            </table>
        </div>
    </div>
</section>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span id="subtotal">${{ Cart::subtotal() .' '. 'VNĐ' }}</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
                        <a class="btn btn-default update" id="store-cart" href="">Store cart</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-scripts')
<script>

    $(".cart_quantity_up").on("click", function() {
        let oldValue = $(this).parent().find(".cart_quantity_input").val();
        let newVal = parseFloat(oldValue) + 1;
        $(this).parent().find(".cart_quantity_input").val(parseFloat(oldValue) + 1)
    });

    $(".cart_quantity_down").on("click", function() {
        let oldValue = $(this).parent().find(".cart_quantity_input").val();
        if (parseFloat(oldValue) > 1) {
            let newVal = parseFloat(oldValue) - 1;
            $(this).parent().find(".cart_quantity_input").val(newVal)
        }
    });

    $('.cart_quantity_delete').click(function(){
        var rowId = $(this).data('id');
        var itemId = $(this).data('product-id');
        $.get("{{ route('delele-to-cart') }}", {rowId: rowId}, function(data){
            realoadCountCart(data.itemInCart);
            $('#subtotal').text("$"+data.subtotal+" VNĐ");
        }).done(function() {
            document.getElementById('product_'+ itemId).remove();
        })
        .fail(function() {
            alert( "error" );
        });
    });
    //Setup CSRF to AJAX
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $('.form-update').submit(function(e){
        e.preventDefault();       
        var form = $(this);
        // let button = form.parent().find('.cart_quantity_update').data('id');
        let pSubtotal = form.parent().find('.cart_total_price');
        let url = form.attr('action');
        let rowId = $(this).data('id');
        $.ajax(
            {
                url: url,
                type: "POST",
                data: form.serialize(),
            }).done(function(data){
                realoadCountCart(data.itemInCart);
                $('#subtotal').text("$"+data.subtotal+" VNĐ");
                pSubtotal.text("$"+data.pSubtotal+" VNĐ");
                swal('Success!', 'Update item to cart successfully!.', 'success');
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", "No response from server...", "error");
        });
    });

    //Store cart
    $('#store-cart').click(function(e){
        e.preventDefault();       
        $.ajax(
        {
            url: "{{ route('store-to-cart') }}",
            type: "GET"
        }).done(function(data){
            alert(data.message);
        }).fail(function(data){
            alert(data.message);
        });
    });

</script>
@endsection