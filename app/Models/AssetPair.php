<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetPair extends Model
{
    //
     public function Orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
