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

    public function product_category(){
        return $this->belongsTo('App\ProductCategory', 'pro_category_id', 'pro_category_id');
    }
}