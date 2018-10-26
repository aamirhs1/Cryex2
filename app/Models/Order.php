<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function AssetPair()
    {
        return $this->belongsTo('App\Models\AssetPair');
    }
}
