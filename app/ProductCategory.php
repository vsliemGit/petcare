<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $primaryKey = 'pro_category_id';
    protected $dates = ['pro_category_created_at','pro_category_updated_at' ];
    protected $dateFomat = 'Y-m-d H:i:s';
    protected $guarded = ['pro_category_id'];
    
    const CREATED_AT = 'pro_category_created_at';
    const UPDATED_AT = 'pro_category_updated_at';

    public function products(){
        return $this->hasMany('App\Product', 'pro_category_id', 'pro_category_id');
    }
}
