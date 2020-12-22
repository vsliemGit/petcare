<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table        = 'comments';
    protected $primaryKey = 'cmt_id';
    protected $guarded = ['cmt_id'];
    protected $fillable     = ['cmt_content', 'cmt_status', 'cmt_created_at', 'cmt_updated_at', 'product_id', 'customer_id'];
    const CREATED_AT = 'cmt_created_at';
    const UPDATED_AT = 'cmt_updated_at';
    protected $dateFomat = 'Y-m-d H:i:s';

    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

}
