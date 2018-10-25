@extends('layouts.master')
@section('content')
<div class="page-heading d-sm-flex justify-content-sm-between align-items-sm-center">
    <h2 class="title mb-3 mb-sm-0">
    User Dashboard</h2>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-collapse">
                <div class="panel-body">
                    <!-- Table Starts Here -->
                    <section class="main-content">
                        <h3>Wallet
                                             <br>
                                             <small></small>
                                          </h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <small></small>
                                    </div>
                                    <div class="panel-body">
                                        <table id="RealTimeCryptoPricing1" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Currency</th>
                                                    <th>Name</th>
                                                    <th>Deposit</th>
                                                    <th>Withdraw</th>
                                                    <th>Available</th>
                                                    <th>On Orders</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wallets as $w)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$w->name}}</td>
                                                    <td>{{$w->symbol}}</td>
                                                    <td><a href="javascript:void(0)" class="gx-btn disabled">Deposit</a></td>
                                                    <td><a href="javascript:void(0)" class="gx-btn disabled" >Withdraw</a></td>
                                                    <td>{{$w->pivot->available_balance}}</td>
                                                    <td>{{$w->pivot->on_orders}}</td>
                                                    <td>{{$w->pivot->on_orders+$w->pivot->available_balance}}</td>
                                                </tr>                                             
                                                @endforeach
                                            </tbody>
                                        </table>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Table Ends Here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
