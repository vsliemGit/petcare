<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    protected $table = 'shoppingcart';
    protected $primaryKey = ['identifier', 'instance'];
    protected $guarded = ['identifier', 'instance'];
    protected $dateFomat = 'Y-m-d H:i:s';
    public $incrementing = false;

}
