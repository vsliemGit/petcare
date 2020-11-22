<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'customers';
    // protected $primaryKey   = ['id'];

    protected $guarded = ['id'];
    protected $fillable = [
      'username', 'name', 'email', 'password'
    ];

    protected $hidden = [
      'password', 'remember_token',
    ];

    protected $dateFomat = 'Y-m-d H:i:s';

    public function getAuthPassword()
    {
        return $this->password;
    }
}
