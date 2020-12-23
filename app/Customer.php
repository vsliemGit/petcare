<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Gloudemans\Shoppingcart\Contracts\InstanceIdentifier;

class Customer extends Authenticatable implements InstanceIdentifier
{
    use Notifiable;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'customers';
    // protected $primaryKey   = ['id'];

    protected $guarded = ['id'];
    protected $fillable = [
      'username', 'name', 'email', 'password', 'phone', 'avatar'
    ];

    protected $hidden = [
      'password', 'remember_token',
    ];

    protected $dateFomat = 'Y-m-d H:i:s';

    public function comments(){
      return $this->hasMany('App\Comment::class', 'cmt_id', 'cmt_id');
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the unique identifier to load the Cart from
     *
     * @return int|string
     */
    public function getInstanceIdentifier($options = null)
    {
        return $this->email;
    }

    /**
     * Get the unique identifier to load the Cart from
     *
     * @return int|string
     */
    public function getInstanceGlobalDiscount($options = null)
    {
        return $this->discountRate ?: 0;
    }
}
