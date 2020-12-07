<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $primaryKey = ['product_id', 'order_id'];
    protected $dateFomat = 'Y-m-d H:i:s';
    public $incrementing = false;
}
