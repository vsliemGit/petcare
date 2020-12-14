<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderDetail extends Pivot
{
    protected $table = 'order_details';
    protected $primaryKey = ['product_id', 'order_id'];
    protected $dateFomat = 'Y-m-d H:i:s';
    public $incrementing = false;

    public   $timestamps   = false; //no column created_at, updated_at
}
