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
        @if(session()->has('message'))
        <div class="alert alert-success">
            {!! session()->get('message') !!}
        </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
        @endif
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
                    <form action="{{route('check_coupon')}}" method="POST">
                        @csrf
                        <ul class="user_info">
                            <li class="single_field zip-field">
                                <label for="coupon_id">Coupon ID:</label>
                                <input type="text" id="coupon_code" name="coupon_code">
                            </li> 
                        </ul>
                        <button type="submit" name="use_coupon" class="btn btn-default update" href="">Use Coupon</button>
                    </form>
                    <td>
                        @if(Session::get('coupon'))
                          <a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                        @endif
                    </td>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    @if(true)
						@php
							$total = 9;
						@endphp
							{{-- @foreach(Session::get('cart') as $key => $cart) --}}
                        @php       
                            $subtotal = 1;
                            $total+=$subtotal;
                        @endphp
                    @endif
                    <ul>
                        <li>Cart Sub Total <span id="subtotal1"> {{ Cart::subtotal() .' '. 'VNĐ' }}</span></li>
                        <li>Eco Tax <span>0 VNĐ</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        @if(Session::get('coupon'))
                            @php 
                            $subTotal = (double)filter_var(Cart::subtotal(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                            $total_after_coupon = 0; 
                            @endphp				
                            @foreach(Session::get('coupon') as $key => $cou)
                                @if($cou['coupon_condition'] == 0)
                                    <li>
                                        Giảm : <span>{{$cou['coupon_number']}} %</span>
                                        @php 
                                            $total_coupon = ($subTotal*$cou['coupon_number'])/100;
                                            $total_after_coupon = $subTotal - $total_coupon;	
                                        @endphp
                                    </li>		
								@elseif($cou['coupon_condition']==1)
                                   <li> 
                                       Giảm : <span> {{number_format($cou['coupon_number'],0,',','.')}} VNĐ</span>
                                        @php 
                                            $total_coupon = $subTotal - $cou['coupon_number'];
                                            $total_after_coupon = ($total_coupon > 0) ? $total_coupon : 0;	
                                        @endphp
                                    </li>
                                @endif
                            @endforeach  
                            <li>Total <span id="subtotal">{{number_format( $total_after_coupon ,0,',','.') .' '. 'VNĐ' }}</span></li>
                        @else
                            <li>Total <span id="subtotal">{{ Cart::subtotal() .' '. 'VNĐ' }}</span></li>
                        @endif
                    </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
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
            if(data.code == 200){
                realoadCountCart(data.itemInCart);
                $('#subtotal').text("$"+data.subtotal+" VNĐ");
            }else{
                swal(data.type+'!', data.message , data.type);
            }
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
                if(data.code==200){
                    realoadCountCart(data.itemInCart);
                    $('#subtotal1').text("$"+data.subtotal+" VNĐ");
                    $('#subtotal').text("$"+data.subtotal+" VNĐ");
                    pSubtotal.text("$"+data.pSubtotal+" VNĐ");
                }
                swal( data.type+'!', data.message , data.type);
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", "No response from server...", "error");
        });
    });
    
</script>
@endsection