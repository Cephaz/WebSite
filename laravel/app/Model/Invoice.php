<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'Invoice';

    public function Users () {
        return $this->belongsTo('App\User','users_id');
    }
}
