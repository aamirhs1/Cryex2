<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function account()
    {
         $user = User::with('UserAccounts')->find(auth()->user()->id);
         $wallets = $user->UserAccounts;
         

        return view('UserDashboard.accounts',compact('wallets'));
    }

    public function market()
    {
         //$user = User::with('UserAccounts')->find(auth()->user()->id);
         //$wallets = $user->UserAccounts;
         //dd($user->UserAccounts);

        return view('Exchange.market',compact('wallets'));
    }
}
