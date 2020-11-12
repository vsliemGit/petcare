<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'brand_id';
    protected $dates = ['brand_created_at','brand_updated_at' ];
    protected $dateFomat = 'Y-m-d H:i:s';
    protected $guarded = ['brand_id'];
    
    const CREATED_AT = 'brand_created_at';
    const UPDATED_AT = 'brand_updated_at';

    public function products(){
        return $this->hasMany(App\Product, 'brand_id', 'brand_id');
    }
}
