<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    public function UserAccounts()
    {
        return $this->belongsToMany( 'App\Models\User', 'user_accounts', 'asset_id', 'user_id' )
        ->withPivot('address','available_balance','on_orders','on_hold')       
        ->withTimestamps();
    }
    
}
