<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AssetPair;
use App\Models\Order;
use App\Models\Asset;
use App\Models\OrderTransaction;
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
         $pair = AssetPair::findorfail(1);
         //$user = User::with('UserAccounts')->find(auth()->user()->id);
         //$wallets = $user->UserAccounts;
         //dd($user->UserAccounts);

        return view('Exchange.market',compact('wallets','pair'));
    }


    public function createorder(Request $request)
    {
        $pair = AssetPair::findorfail($request->pair);
        $user = User::findorfail(auth()->user()->id);
        
      
        $userparent = $user->UserAccounts()->where('asset_id', '=' , $pair->parent_id)->first();
        $userchild = $user->UserAccounts()->where('asset_id', '=' , $pair->child_id)->first();
        //dd($userchild->pivot->available_balance);
        
        
        $BaseCurrency = Asset::findorfail($pair->parent_id);
        $PairCurrency = Asset::findorfail($pair->child_id);

        $order = new Order;
        $order->type = $request->type;;
        $order->child_units = $request->units;
        $order->child_price_per_unit = $request->price_per_unit;
        $order->base_units = $request->units * $request->price_per_unit;

        $order->remaining = $request->units;
        $order->status = "New";

        $order->AssetPair()->associate($pair);
        $order->User()->associate($user);       

        $order->save();
        //Order - User Account Update
        if($order->type == "SellOrder")
        {
            //Sell Order Update User Child/Pair Wallet
            $balance = ($userchild->pivot->available_balance - $order->child_units);
            $on_orders = ($userchild->pivot->on_orders + $order->child_units);
            $user->UserAccounts()->updateExistingPivot($pair->child_id ,  ['available_balance'=>$balance , 'on_orders' => $on_orders]);

        }
        else
        {
            ////Buy Order Update User Parent/Pair Wallet                     
            $on_orders = ($userparent->pivot->on_orders + $order->base_units);
            $on_hold = ($userparent->pivot->on_hold + ($order->base_units*0.00075));
            $balance = ($userparent->pivot->available_balance - ($order->base_units + ($order->base_units*0.00075)));
            $user->UserAccounts()->updateExistingPivot($pair->parent_id ,  ['available_balance'=>$balance , 'on_orders' => $on_orders , 'on_hold' => $on_hold]);

        }
        $user->save();

        //Order Matchings
        $matchList = Order::where([['child_price_per_unit','=',$order->child_price_per_unit],['asset_pair_id','=',$order->asset_pair_id],['status','!=',"Completed"],['type','!=',$order->type],['user_id','!=',$order->user_id]])->get();

        if (isset($matchList)) {
            foreach ($matchList as $match) {
                    //Order User Accounts
                    $orderuser = User::findorfail($order->user_id);
                    $orderuserparent = $orderuser->UserAccounts()->where('asset_id', '=' , $pair->parent_id)->first();
                    $orderuserchild = $orderuser->UserAccounts()->where('asset_id', '=' , $pair->child_id)->first();

                    //Match User Accounts
                    $matchuser = User::findorfail($match->user_id);
                    $matchuserparent = $matchuser->UserAccounts()->where('asset_id', '=' , $pair->parent_id)->first();
                    $matchuserchild = $matchuser->UserAccounts()->where('asset_id', '=' , $pair->child_id)->first();


                    $order->remaining >= $match->remaining ? $order->remaining - $match->remaining : $match->remaining - $order->remaining;
                    $trx = new OrderTransaction;
                    $trx->price_per_unit = $order->child_price_per_unit;
                    if($order->type == "SellOrder")
                    {
                        $trx->sellorder_id = $order->id;
                        $trx->buyorder_id = $match->id; 

                    }
                    else
                    {
                        $trx->sellorder_id = $match->id;
                        $trx->buyorder_id = $order->id; 
                    }
                    
                    if($order->remaining != 0.00)
                    {
                        $order->status = "Partial";
                        $match->status = "Completed";
                        $trx->sellorder_units = $match->remaining;
                        $trx->buyorder_units = $match->remaining * $match->child_price_per_unit;
                        $order->save();
                        $match->save();
                        $trx->save();
                        $commission = $trx->buyorder_units * 0.00075;
                        if($order->type == "SellOrder")
                        {
                        //Order User Account
                            //Sell Order Update Order User Child/Pair Wallet                          
                            $on_orders = ($orderuserchild->pivot->on_orders - $trx->sellorder_units);
                            $orderuser->UserAccounts()->updateExistingPivot($pair->child_id ,  ['on_orders' => $on_orders]);

                            //Sell Order Update User Parent/Pair Wallet
                            $balance = ($orderuserparent->pivot->available_balance + ($trx->buyorder_units - $commission));
                            $orderuser->UserAccounts()->updateExistingPivot($pair->parent_id ,  ['available_balance' => $balance]);

                        //Match User Account
                            //Match Sell Order - Update Order User Child/Pair Wallet
                            $balance = ($matchuserchild->pivot->available_balance + $trx->sellorder_units);                            
                            $matchuser->UserAccounts()->updateExistingPivot($pair->child_id ,  ['available_balance' => $balance]);

                            //Match Sell Order - Update Order User Parent/Pair Wallet
                            $on_orders = ($matchuserparent->pivot->on_orders - $trx->buyorder_units);
                            $on_hold = ($matchuserparent->pivot->on_hold - $commission);
                             $matchuser->UserAccounts()->updateExistingPivot($pair->parent_id ,  ['on_orders' => $on_orders , 'on_hold' => $on_hold]);

                             $orderuser->save();
                             $matchuser->save();     



                        }
                        else
                        {
                        //Order User Account
                            //Buy Order Update Order User Child/Pair Wallet
                            $balance = ($orderuserchild->pivot->available_balance + $trx->sellorder_units);                            
                            $orderuser->UserAccounts()->updateExistingPivot($pair->child_id ,  ['available_balance' => $balance]);

                            // Update Order User Parent/Pair Wallet
                            $on_orders = ($orderuserparent->pivot->on_orders - $trx->buyorder_units);
                            $on_hold = ($orderuserparent->pivot->on_hold - $commission);
                             $orderuser->UserAccounts()->updateExistingPivot($pair->parent_id ,  ['on_orders' => $on_orders , 'on_hold' => $on_hold]);


                        //Match User Account
                            //Buy Order Update Match User Child/Pair Wallet                          
                            $on_orders = ($matchuserchild->pivot->on_orders - $trx->sellorder_units);
                            $matchuser->UserAccounts()->updateExistingPivot($pair->child_id ,  ['on_orders' => $on_orders]);

                            //Buy Order Update Match User Parent/Pair Wallet
                            $balance = ($matchuserparent->pivot->available_balance + ($trx->buyorder_units - $commission));
                            $matchuser->UserAccounts()->updateExistingPivot($pair->parent_id ,  ['available_balance' => $balance]);

                            $orderuser->save();
                             $matchuser->save();    


                        }
                    }
                    else
                    {
                        $order->status = "Completed";
                        $match->status = $match->remaining > 0.00 ? "Partial" : "Completed";     
                        $trx->sellorder_units = $order->remaining;
                        $trx->buyorder_units = $order->remaining * $order->child_price_per_unit;
                        $order->save();
                        $match->save();
                        $trx->save();
                        if($order->type == "SellOrder")
                        {
                        //Order User Account
                            //Sell Order Update Order User Child/Pair Wallet                          
                            $on_orders = ($orderuserchild->pivot->on_orders - $trx->sellorder_units);
                            $orderuser->UserAccounts()->updateExistingPivot($pair->child_id ,  ['on_orders' => $on_orders]);

                            //Sell Order Update User Parent/Pair Wallet
                            $balance = ($orderuserparent->pivot->available_balance + ($trx->buyorder_units - $commission));
                            $orderuser->UserAccounts()->updateExistingPivot($pair->parent_id ,  ['available_balance' => $balance]);

                        //Match User Account
                            //Match Sell Order - Update Order User Child/Pair Wallet
                            $balance = ($matchuserchild->pivot->available_balance + $trx->sellorder_units);                            
                            $matchuser->UserAccounts()->updateExistingPivot($pair->child_id ,  ['available_balance' => $balance]);

                            //Match Sell Order - Update Order User Parent/Pair Wallet
                            $on_orders = ($matchuserparent->pivot->on_orders - $trx->buyorder_units);
                            $on_hold = ($matchuserparent->pivot->on_hold - $commission);
                             $matchuser->UserAccounts()->updateExistingPivot($pair->parent_id ,  ['on_orders' => $on_orders , 'on_hold' => $on_hold]);

                             $orderuser->save();
                             $matchuser->save();     



                        }
                        else
                        {
                        //Order User Account
                            //Buy Order Update Order User Child/Pair Wallet
                            $balance = ($orderuserchild->pivot->available_balance + $trx->sellorder_units);                            
                            $orderuser->UserAccounts()->updateExistingPivot($pair->child_id ,  ['available_balance' => $balance]);

                            // Update Order User Parent/Pair Wallet
                            $on_orders = ($orderuserparent->pivot->on_orders - $trx->buyorder_units);
                            $on_hold = ($orderuserparent->pivot->on_hold - $commission);
                             $orderuser->UserAccounts()->updateExistingPivot($pair->parent_id ,  ['on_orders' => $on_orders , 'on_hold' => $on_hold]);


                        //Match User Account
                            //Buy Order Update Match User Child/Pair Wallet                          
                            $on_orders = ($matchuserchild->pivot->on_orders - $trx->sellorder_units);
                            $matchuser->UserAccounts()->updateExistingPivot($pair->child_id ,  ['on_orders' => $on_orders]);

                            //Buy Order Update Match User Parent/Pair Wallet
                            $balance = ($matchuserparent->pivot->available_balance + ($trx->buyorder_units - $commission));
                            $matchuser->UserAccounts()->updateExistingPivot($pair->parent_id ,  ['available_balance' => $balance]);

                            $orderuser->save();
                             $matchuser->save();    


                        }
                        break;
                    }
            }
        }

       


    }
}
