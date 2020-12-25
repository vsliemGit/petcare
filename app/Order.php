<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey  ='order_id';
    protected $guarded = ['order_id'];
    protected $fillable  = ['order_adress', 'order_status', 'order_notes', 'order_date_shipping','order_created_at','order_updated_at','transfer_id', 'product_id', 'customer_id'];
    protected $dateFomat = 'Y-m-d H:i:s';
    protected $dates = ['order_created_at','order_updated_at', 'order_date_shipping'];

    const CREATED_AT = 'order_created_at';
    const UPDATED_AT = 'order_updated_at';

    public function transfer(){
        return $this->belongsTo('App\Transfer', 'transfer_id', 'transfer_id');
    }

    public function payment(){
        return $this->belongsTo('App\Payment', 'payment_id', 'payment_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    public function detail(){
        return $this->belongsToMany('App\Product', 'order_details', 'order_id', 'product_id')->using('App\OrderDetail')
        ->withPivot([
            'order_detail_quantity'
        ]);
    }
}
