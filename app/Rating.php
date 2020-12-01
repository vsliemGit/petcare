<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table        = 'rating';
    protected $primaryKey = ['rating_id'];
    protected $guarded = ['rating_id'];
    protected $fillable     = ['rating_content', 'rating_status', 'rating_created_at', 'rating_updated_at', 'product_id', 'customer_id'];
    const CREATED_AT = 'rating_created_at';
    const UPDATED_AT = 'rating_updated_at';
    protected $dateFomat = 'Y-m-d H:i:s';

    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
}
