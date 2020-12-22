<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Image extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'img_id';
    protected $dates = ['img_created_at','img_updated_at'];
    protected $dateFomat = 'Y-m-d H:i:s';
    protected $guarded = ['img_id'];
    protected $fillable  = ['img_name'];

    const CREATED_AT = 'img_created_at';
    const UPDATED_AT = 'img_updated_at';

    public function getName()
    {
        return $this->attributes['img_name'];
    }

    public function products(){
        return $this->belongsToMany('App\Product')->using('App\Image_Product', 'product_id', 'product_id');
    }

    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

}
