<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $dateFomat = 'Y-m-d H:i:s';

    const CREATED_AT = 'product_created_at';
    const UPDATED_AT = 'product_updated_at';

    public function category(){
        return $this->belongsTo('App\ProductCategory', 'pro_category_id', 'pro_category_id');
    }

    public function brand(){
        return $this->belongsTo('App\Brand', 'brand_id', 'brand_id');
    }

    public function detail(){
        return $this->belongsTo('App\ProductDetail', 'product_id', 'product_id');
    }
    
    public function images(){
        return $this->belongsToMany('App\Image', 'image_product', 'product_id', 'img_id');
    }

    public function order(){
        return $this->belongsToMany('App\Order')->using('App\OrderDetail')
        ->withPivot([
            'order_detail_quantity'
        ]);
    }
}