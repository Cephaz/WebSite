<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['image', 'title', 'description', 'price', 'category', 'quantity', 'users_id'];
    protected $table = 'Product';

    public function Baskets () {
        return $this->HasMany('App\Model\Basket', 'Product_id');
    }
    public function Users () {
        return $this->belongsTo('App\User','users_id');
    }
}
