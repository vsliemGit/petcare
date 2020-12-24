<!-- List Products by Category  -->
<div class="features_items" id="list-products"><!--features_items-->
    <!-- List Products  -->
    <h2 class="title text-center">LIST PRODUCTS BY <span id="name_of_category"></span></h2>
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-4">
            <label for="">{{ __('products.fil') }}</label>
            <form action="">
                @csrf
                <select name="sort" id="sort" class="form-control">
                    <option value="none">{{__('products.none')}}</option>
                    <option value="desc">{{__('products.price_desc')}}</option>
                    <option value="asc ">{{__('products.price_asc')}}</option>
                    <option value="a_z ">{{__('products.name_asc')}}</option>
                    <option value="z_a ">{{__('products.name_desc')}}</option>
                </select>
            </form>
        </div>
    </div>
    @include('frontend.widgets.list-products')
</div><!--features_items-->
<!-- New products  -->
@include('frontend.widgets.new-products') 

<script>
    //Sort product
    $(document).ready(function(){
            $('#sort').on('change', function(){
                var category_id = $("#category_id_choosed").val();
                $.get( "{{route('sort')}}" , { value :  $('#sort').val(), value_category_id: category_id } , function( data ) {     
                    $("#list-product").empty().html(data);
                });
            }); 
        });

</script>