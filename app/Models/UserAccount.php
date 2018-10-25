<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
     
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Asset()
    {
        return $this->belongsTo('App\Models\Asset');
    }
}
