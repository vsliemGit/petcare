<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistics';
    protected $primaryKey = 'id_statistical';
    public $timestamps = false;
    protected $guarded = ['id_statistical'];
    protected $fillable  = ['order_date', 'sales', 'profit', 'quantity', 'total_order'];
}
