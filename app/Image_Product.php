<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Product extends Model
{
    public   $timestamps   = false; //created_at, updated_at

    protected $table        = 'image_product';
    protected $primaryKey   = ['img_id', 'product_id'];
    public $incrementing = false;
}
