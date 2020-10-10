<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permissions;

class Group_permission extends Model
{
    protected $table = 'group_permissions';
    protected $primaryKey = ['gpms_id'];
    protected $dateFomat = 'Y-m-d H:i:s';

    const CREATED_AT = 'gpms_created_at';
    const UPDATED_AT = 'gpms_updated_at';

    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }
}
