<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'Basket';

    public function Products () {
        return $this->belongsTo('App\Model\Product','Product_id');
    }
    public function Users () {
        return $this->belongsTo('App\User','users_id');
    }
    public function Invoice () {
        return $this->HasMany('App\Model\Basket','users_id');
    }
}
