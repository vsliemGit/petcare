<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table        = 'stores';
    protected $primaryKey = 'store_id';
    protected $guarded = ['store_id'];
    protected $fillable     = ['store_address', 'store_name', 'store_image', 'store_latitude', 'store_longitude', 'store_created_at', 'store_updated_at'];
    const CREATED_AT = 'store_created_at';
    const UPDATED_AT = 'store_updated_at';
    protected $dateFomat = 'Y-m-d H:i:s';
}
