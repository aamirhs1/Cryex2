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
                                    <h4>{{$parent_symbol}}/{{$child_symbol}}</h4>
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
                    <div class="panel-heading">Buy {{$child_symbol}}
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
                                <label class="col-sm-2 control-label m-t-9">{{$child_symbol}}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Bid Price</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" class="form-control text-right limfield" id="buyprice" oninput="calculateBuy()" placeholder="{{$parent_symbol}} Per Unit" name="price_per_unit" required>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">{{$parent_symbol}}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Sum</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="buysum" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">{{$parent_symbol}}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Fee</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="buyfee" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">{{$parent_symbol}}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Total</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="buytotal" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">{{$parent_symbol}}</label>
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
                    <div class="panel-heading">Sell {{$child_symbol}}
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
                                <label class="col-sm-2 control-label m-t-9">{{$child_symbol}}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Ask Price</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" class="form-control text-right limfield" id="sellprice" oninput="calculateSell()" placeholder="{{$parent_symbol}} Per Unit" name="price_per_unit" required>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">{{$parent_symbol}}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Sum</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="sellsum" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">{{$parent_symbol}}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Fee</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="sellfee" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">{{$parent_symbol}}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label m-t-9">Total</label>
                                <div class="input-group col-sm-5 m-b">
                                    <input type="text" placeholder="0.00000000" id="selltotal" class="form-control text-right" disabled>
                                </div>
                                <label class="col-sm-2 control-label m-t-9">{{$parent_symbol}}</label>
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
         <div class="row">
                      <div class="col-md-12">
                         <div class="panel panel-default">
                            <div class="panel-heading">Orders Book
                               <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                               <em class="fa fa-minus"></em>
                               </a>
                            </div>
                            <div class="panel-heading border-none">
                            </div>
                            <div class="panel-body">
                               <div class="row">
                                  <div class="col-md-6 col-sm-12">
                                    <h3>Buy Orders</h3>
                                     <div class="table-responsive m-t-10">
                                        <table class="table table-striped table-hover table-condensed">
                                           <thead>
                                              <tr>
                                                <th>
                                                   Units (LTC)
                                                </th>
                                                <th>
                                                   Bid per Unit
                                                </th>
                                                <th>
                                                   Remaining Units
                                                </th>
                                              </tr>
                                           </thead>
                                           <tbody>
                                             @foreach ($buy as $s)
                                               <tr>
                                                  <td class="number cursor-pointer">{{number_format($s->units, 8)}}</td>
                                                  <td class="number cursor-pointer">{{number_format($s->price_per_unit, 9)}}</td>
                                                  <td class="number">{{number_format($s->remaining, 8)}}</td>
                                               </tr>
                                             @endforeach

                                           </tbody>

                                        </table>
                                     </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <h3>Sell Orders</h3>
                                     <div class="table-responsive">
                                        <table class="table table-striped table-hover table-condensed">
                                           <thead>
                                              <tr>
                                                 <th>
                                                    Units (LTC)
                                                 </th>
                                                 <th>
                                                    Ask per Unit
                                                 </th>
                                                 <th>
                                                    Remaining Units
                                                 </th>
                                              </tr>
                                           </thead>
                                           <tbody>
                                             @foreach ($sell as $s)
                                               <tr>
                                                  <td class="number cursor-pointer">{{number_format($s->units, 8)}}</td>
                                                  <td class="number cursor-pointer">{{number_format($s->price_per_unit, 8)}}</td>
                                                  <td class="number">{{number_format($s->remaining, 8)}}</td>
                                               </tr>
                                             @endforeach







                                           </tbody>
                                        </table>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <!-- Open Orders -->
                      <div class="col-md-12">
                         <div class="panel panel-default">
                            <div class="panel-heading">Open Orders
                               <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                               <em class="fa fa-minus"></em>
                               </a>
                            </div>
                            <div class="table-responsive">
                               <table class="table table-bordered table-hover">
                                  <thead>
                                     <tr>
                                        <th><i class="fa fa-plus"></i></th>
                                        <th>Order Date</th>
                                        <th>Units</th>
                                        <th>Bid/Ask</th>
                                        <th>Remaining</th>
                                        <th>Status</th>
                                        <th>Order Type</th>

                                     </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($openo as $o)
                                      <tr>
                                         <td><i class="fa fa-minus"></i></td>
                                         <td>
                                            {{$o->created_at}}
                                         </td>
                                         <td>{{number_format($o->units, 8)}}</td>
                                         <td>{{number_format($o->price_per_unit, 8)}}</td>
                                         <td>{{number_format($o->remaining, 8)}}</td>
                                         <td>{{$o->status}}</td>
                                         <td>{{$o->type}}</td>


                                      </tr>

                                    @endforeach                                   



                                  </tbody>
                               </table>
                            </div>
                         </div>
                      </div>
                      <!-- My Order History -->
                      <div class="col-md-12">
                      <div class="panel panel-default">
                         <div class="panel-heading">My Order History
                            <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                            <em class="fa fa-minus"></em>
                            </a>
                         </div>
                         <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                               <thead>
                                  <tr>
                                    <th>Order Date</th>
                                    <th>Units</th>
                                    <th>Bid/Ask</th>
                                    <th>Remaining</th>
                                    <th>Status</th>
                                    <th>Order Type</th>
                                  </tr>
                               </thead>
                               <tbody>


                               @foreach ($closeo as $o)
                                 <tr>

                                    <td>
                                       {{$o->created_at}}
                                    </td>
                                    <td>{{number_format($o->units, 8)}}</td>
                                    <td>{{number_format($o->price_per_unit, 8)}}</td>
                                    <td>{{number_format($o->remaining, 8)}}</td>
                                    <td>{{$o->status}}</td>
                                    <td>{{$o->type}}</td>

                                 </tr>

                               @endforeach

                           


                               </tbody>
                            </table>
                         </div>
                      </div>
                   </div>
                   </div>
        
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
            <h3>Base Currency: BTC</h3>
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
                         <td class="number cursor-pointer"><a href='{{ route('market',$ps->pair_id) }}' >{{$ps->child_symbol}}</a></td>
                         <td class="number cursor-pointer">{{$ps->child_name}}</td>
                        </tr>
                    @endif
                @endforeach
               </tbody>
            </table>
          </div>
          <div id="ltc" class="tab-pane fade">
            <h3>Base Currency: LTC</h3>
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
                    @if ($ps->parent_symbol=="LTC")
                        <tr>
                         <td class="number cursor-pointer"><a href='{{ route('market',$ps->pair_id) }}' >{{$ps->child_symbol}}</a></td>
                         <td class="number cursor-pointer">{{$ps->child_name}}</td>
                        </tr>
                    @endif
                @endforeach
               </tbody>
            </table>
          </div>
          <div id="eth" class="tab-pane fade">
            <h3>Base Currency: ETH</h3>
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
                    @if ($ps->parent_symbol=="ETH")
                        <tr>
                         <td class="number cursor-pointer"><a href='{{ route('market',$ps->pair_id) }}' >{{$ps->child_symbol}}</a></td>
                         <td class="number cursor-pointer">{{$ps->child_name}}</td>
                        </tr>
                    @endif
                @endforeach
               </tbody>
            </table>
          </div>
          <div id="usdt" class="tab-pane fade">
            <h3>Base Currency: USDT</h3>
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
                    @if ($ps->parent_symbol=="USDT")
                        <tr>
                         <td class="number cursor-pointer"><a href='{{ route('market',$ps->pair_id) }}' >{{$ps->child_symbol}}</a></td>
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
