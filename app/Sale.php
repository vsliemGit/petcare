<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $primaryKey  = 'sale_id';
    protected $guarded = ['sale_id'];
    protected $fillable  = ['sale_name', 'sale_number', 'sale_start_date', 'sale_end_date', 'sale_condition', 'sale_status', 'sale_created_at', 'sale_updated_at'];
    protected $dateFomat = 'Y-m-d H:i:s';
    protected $dates = ['sale_created_at','sale_updated_at', 'sale_start_date', 'sale_end_date'];

    const CREATED_AT = 'sale_created_at';
    const UPDATED_AT = 'sale_updated_at';

    public function productSale(){
        return $this->belongsToMany('App\Product', 'product_sales', 'sale_id', 'product_id')->using('App\Product_Sale')
        ->withPivot([
            'sale_quantity'
        ]);
    }
}
