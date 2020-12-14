{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Content of shopping-cart --}}
@section('main-content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Wishlist</li>
            </ol>
        </div>
        <div class="table-responsive cart_info" id="tablene">
           @php
        //    Cart::instance('wishlist')->destroy();
            // $cart_content = Cart::instance('wishlist')->content();
            //    echo "<pre>";
            //   print_r($cart_content);
            //   echo "</pre>";
           @endphp 
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
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
                        <td class="cart_delete">
                            <a class="wishlist_delete" data-product-id="{{ $product->id }}" data-id="{{ $product->rowId }}" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            <button type="button" class="add-to-cart" data-id="{{ $product->id  }}" data-row="{{ $product->rowId }}" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@section('custom-scripts')
<script>
    //Remove item to Wishlist
    $('.wishlist_delete').click(function(){
        let rowId = $(this).data('id');
        let itemId = $(this).data('product-id');
        // deleteWishlist(rowId, itemId);  
        $.ajax(
        {
            url: "{{ route('delele-to-wishlist') }}",
            type: "GET",
            data: {
                rowId: rowId
            }
        }).done(function(data){            
            document.getElementById('product_'+ itemId).remove();
            realoadCountWishlist(data.itemInWishlist);
        }).error(function(data){
            console.log(data)
            alert( "error o xoa wishlist" );
        });  
    });

    function deleteWishlist(rowId, itemId){
        $.ajax(
        {
            url: "{{ route('delele-to-wishlist') }}",
            type: "GET",
            data: {
                rowId: rowId
            }
        }).done(function(data){           
            document.getElementById('product_'+ itemId).remove();
            realoadCountWishlist(data.itemInWishlist);
        }).error(function(data){
            console.log(data)
            alert( "Error o xoa wishlist" );
        });
    }
    //Setup CSRF to AJAX
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    //Add product to Cart using ajax
    $('.add-to-cart').click(function(event){
            event.preventDefault();
            let rowId = $(this).data('row');
            let product_id = $(this).data('id');
            $.ajax(
            {
                url: "{{ route('add-to-cart') }}",
                type: "POST",
                data: {
                    product_id : product_id
                }
            }).done(function(data){
                deleteWishlist(rowId, product_id);
                realoadCountCart(data.itemInCart);
                swal('Success!', 'Add item to cart successfully!.', 'success');
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", "No response from server...", "error");
            });
        });
</script>
@endsection