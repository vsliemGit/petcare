<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table        = 'payments';
    protected $primaryKey = ['payment_id'];
    protected $guarded = ['payment_id'];
    protected $fillable     = ['payment_name', 'payment_status', 'payment_desc','payment_created_at', 'payment_updated_at'];
    const CREATED_AT = 'payment_created_at';
    const UPDATED_AT = 'payment_updated_at';
    protected $dateFomat = 'Y-m-d H:i:s';
    public $incrementing = false;
}
