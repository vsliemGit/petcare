<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Image_Service extends Model
{
    public    $timestamps   = false; //created_at, updated_at

    protected $table        = 'image_service';
    protected $primaryKey   = ['img_id', 'service_id'];
    public $incrementing = false;

}
