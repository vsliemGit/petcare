<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Product_Sale extends Pivot
{
    protected $table = 'product_sales';
    protected $primaryKey = ['product_id', 'sale_id'];
    public $incrementing = false;
    protected $fillable  = ['sale_quantity'];

    public   $timestamps   = false; //no column created_at, updated_at
}
