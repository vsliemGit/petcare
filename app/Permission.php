<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = ['pms_id'];
    protected $dateFomat = 'Y-m-d H:i:s';

    const CREATED_AT = 'pms_created_at';
    const UPDATED_AT = 'pms_updated_at';

    public function group_permission()
    {
        return $this->belongsTo('App\Group_permission');
    }
}
