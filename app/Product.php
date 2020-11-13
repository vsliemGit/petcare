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

    public function images(){
        return $this->hasMany('App\Image', 'product_id', 'product_id');
    }
}