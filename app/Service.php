<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'service_id';
    protected $dateFomat = 'Y-m-d H:i:s';

    const CREATED_AT = 'service_created_at';
    const UPDATED_AT = 'service_updated_at';

    public function images(){
        return $this->belongsToMany('App\Image', 'image_service', 'service_id', 'img_id');
    }

    public function detail(){
        return $this->belongsTo('App\ServiceDetail', 'service_id', 'service_id');
    }
}
