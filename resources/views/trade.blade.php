@extends('layouts.master')
@section('content')
<section>
    <section class="main-content">
        <button type="button" class="btn btn-labeled btn-primary pull-right" data-toggle="modal" data-target="#selectCurrency">
            <span class="btn-label"><i class="fa fa-dollar"></i>
                   </span>Select Currency Pair</button>
        <h3>Dashboard
                   </h3>
        <div class="row">
            <div class="col-md-12">
                <!-- Chart Starts Here -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-collapse">
                                <div class="panel-body">
                                    <h4>{{$pair->pair}}</h4>
                                    <div id="candlestickChart" class="h-500">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Chart Ends Here -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Buy LTC
                        <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                               <em class="fa fa-minus"></em>
                               </a>
                    </div>
                    <form method="POST" action="{{ route('createorder') }}">
                        @csrf
                        <input type="hidden" value="{{$pair->id}}" name="pair">
                        <input type="hidden" value="BuyOrder" name="type">                        
                        <div class="pannel panel-body">
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Units</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="buyunits" oninput="calculateBuy()" class="form-control text-right limfield" name="units" required>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">LTC</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Bid Price</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" class="form-control text-right limfield" id="buyprice" oninput="calculateBuy()" placeholder="BTC Per Unit" name="price_per_unit" required>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">BTC</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Sum</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="buysum" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">BTC</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Fee</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="buyfee" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">BTC</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Total</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="buytotal" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">BTC</label>
                                <h6 style="padding-left:10px;">0.075% Fee will be charged.</h6>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary btn-block col-sm-8 col-sm-offset-2"><i class="fa fa-plus"></i> Create Buy Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Sell LTC
                        <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                               <em class="fa fa-minus"></em>
                               </a>
                    </div>
                    <form method="POST" action="{{ route('createorder') }}">
                        @csrf
                        <input type="hidden" value="{{$pair->id}}" name="pair">
                        <input type="hidden" value="SellOrder" name="type">
                        <div class="pannel panel-body">
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Units</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="sellunits" oninput="calculateSell()" class="form-control text-right limfield" name="units" required>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">LTC</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Ask Price</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" class="form-control text-right limfield" id="sellprice" oninput="calculateSell()" placeholder="BTC Per Unit" name="price_per_unit" required>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">BTC</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Sum</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="sellsum" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">BTC</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Fee</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="sellfee" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">LTC</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Total</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="selltotal" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">LTC</label>
                                <h6 style="padding-left:10px;">0.075% Fee will be charged.</h6>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary btn-block col-sm-8 col-sm-offset-2"><i class="fa fa-minus"></i> Create Sell Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Orders Book -->
        
    </section>
</section>
<div id="selectCurrency" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Instruments</h4>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#btc">BTC</a></li>
          <li class="active"><a data-toggle="tab" href="#ltc">LTC</a></li>
          <li class="active"><a data-toggle="tab" href="#eth">ETH</a></li>
          <li class="active"><a data-toggle="tab" href="#usdt">USDT</a></li>
        </ul>

        <div class="tab-content">
          <div id="btc" class="tab-pane fade in active">
            <table class="table table-striped table-hover table-condensed">
               <thead>
                  <tr>
                     <th>
                        Symbol
                     </th>
                     <th>
                        Name
                     </th>
                  </tr>
               </thead>
               <tbody>
                @foreach ($pairs as $ps)
                    @if ($ps->parent_symbol=="BTC")
                        <tr>
                         <td class="number cursor-pointer"><a href='' >{{$ps->child_symbol}}</td>
                         <td class="number cursor-pointer">{{$ps->child_name}}</td>
                        </tr>
                    @endif
                @endforeach
               </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
@section('myscripts')
@endsection
