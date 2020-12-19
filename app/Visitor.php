<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table        = 'visitors';
    protected $primaryKey = 'visitor_id';
    protected $guarded = ['visitor_id'];
    protected $fillable     = ['visitor_ip', 'customer_id'];
    const CREATED_AT = 'visitor_created_at';
    const UPDATED_AT = 'visitor_updated_at';
    protected $dateFomat = 'Y-m-d H:i:s';
}
