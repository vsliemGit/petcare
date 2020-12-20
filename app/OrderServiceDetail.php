<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderServiceDetail extends Pivot
{
    protected $table = 'order_service_details';
    protected $primaryKey = ['service_id', 'order_service_id'];
    protected $dateFomat = 'Y-m-d H:i:s';
    public $incrementing = false;

    public   $timestamps   = false; //no column created_at, updated_at
}
