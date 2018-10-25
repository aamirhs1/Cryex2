<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function UserAccounts()
    {
        return $this->belongsToMany( 'App\Models\Asset', 'user_accounts', 'user_id', 'asset_id' )
        ->withPivot('address','available_balance','on_orders','on_hold')       
        ->withTimestamps();
    }
}
