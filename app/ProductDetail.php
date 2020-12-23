<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details';
    protected $primaryKey = 'product_detail_id';
    protected $dates = ['product_detail_created_at','product_detail_updated_at'];
    protected $dateFomat = 'Y-m-d H:i:s';
    protected $guarded = ['product_detail_id'];
    protected $fillable  = ['product_detail_content', 'product_detail_created_at', 'product_detail_updated_at', 'product_id'];

    const CREATED_AT = 'product_detail_created_at';
    const UPDATED_AT = 'product_detail_updated_at';

    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }
}
