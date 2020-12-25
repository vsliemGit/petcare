<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    protected $table = 'order_services';
    protected $primaryKey  ='order_service_id';
    protected $guarded = ['order_service_id'];
    protected $fillable  = ['customer_id', 'order_service_status', 'order_service_time'];
    protected $dateFomat = 'Y-m-d';
    protected $dates = ['order_service_date_begin'];

    const CREATED_AT = 'order_created_at';
    const UPDATED_AT = 'order_updated_at';

    public function detail(){
        return $this->belongsToMany('App\Service', 'order_service_details', 'order_service_id', 'service_id')->using('App\OrderServiceDetail')
        ->withPivot([
            'order_detail_quantity'
        ]);
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
}
