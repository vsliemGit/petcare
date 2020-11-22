<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = ['role_id'];
    protected $dateFomat = 'Y-m-d H:i:s';

    const CREATED_AT = 'role_created_at';
    const UPDATED_AT = 'role_updated_at';
}
