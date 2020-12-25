<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $primaryKey  = 'coupon_id';
    protected $guarded = ['coupon_id'];
    protected $fillable  = ['coupon_name', 'coupon_status', 'coupon_code', 'coupon_times', 'coupon_condition', 'coupon_number'];
    protected $dateFomat = 'Y-m-d H:i:s';
    protected $dates = ['coupon_created_at','coupon_updated_at'];
    // public $incrementing = false;

    const CREATED_AT = 'coupon_created_at';
    const UPDATED_AT = 'coupon_updated_at';
}
