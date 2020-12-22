<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $primaryKey = 'banner_id';
    protected $dates = ['banner_created_at','banner_updated_at' ];
    protected $dateFomat = 'Y-m-d H:i:s';
    protected $guarded = ['banner_id'];
    protected $fillable  = ['banner_name', 'banner_image', 'banner_url', 'banner_status'];
    
    const CREATED_AT = 'banner_created_at';
    const UPDATED_AT = 'banner_updated_at';
}
