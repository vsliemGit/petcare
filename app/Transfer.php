<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table        = 'transfers';
    protected $primaryKey = ['transfer_id'];
    public $incrementing = false;
    protected $guarded = ['transfer_id'];
    protected $fillable     = ['transfer_name', 'transfer_shipping', 'transfer_status', 'transfer_desc', 'transfer_created_at', 'transfer_updated_at'];
    const CREATED_AT = 'transfer_created_at';
    const UPDATED_AT = 'transfer_updated_at';
    protected $dateFomat = 'Y-m-d H:i:s';

}
