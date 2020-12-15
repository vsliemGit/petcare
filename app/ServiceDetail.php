<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    protected $table = 'service_details';
    protected $primaryKey = 'service_detail_id';
    protected $dates = ['service_detail_created_at','service_detail_updated_at'];
    protected $dateFomat = 'Y-m-d H:i:s';
    protected $guarded = ['service_detail_id'];
    protected $fillable  = ['service_detail_image', 'service_detail_image', 'service_detail_content', 'service_detail_status', 'service_id'];

    const CREATED_AT = 'service_detail_created_at';
    const UPDATED_AT = 'service_detail_updated_at';
}
