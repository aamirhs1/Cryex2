@extends('layouts.app')

@section('styles')
  <!-- Site favicon -->
    <link rel='shortcut icon' type='image/x-icon' href="{{URL::asset('main/images/favicon.ico')}}" />
    <!-- /site favicon -->

    <!-- Font Material stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('main/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
    <!-- /font material stylesheet -->

    <!-- Bootstrap stylesheet -->
    <link href="{{URL::asset('main/css/jumbo-bootstrap.css')}}" rel="stylesheet">
    <!-- /bootstrap stylesheet -->

    <!-- Perfect Scrollbar stylesheet -->
    <link href="{{URL::asset('main/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <!-- /perfect scrollbar stylesheet -->

    <!-- Jumbo-core stylesheet -->
    <link href="{{URL::asset('main/css/jumbo-core.min.css')}}" rel="stylesheet">
    <!-- /jumbo-core stylesheet -->

    <!-- Color-Theme stylesheet -->
    <link id="override-css-id" href="{{URL::asset('main/css/theme-dark-indigo.css')}}" rel="stylesheet">
    <!-- Color-Theme stylesheet -->

@endsection

@section('body_id','body')

@section('page')
  <!-- Page container -->
  <div class="gx-container">
    <!-- Sidebar Menu -->
    @include('layouts.includes.left-sidebar')

    <!-- Main Container -->
    <div class="gx-main-container">
      <!-- Main Header -->
        @include('layouts.includes.main-header')
        <!-- Main Content -->
        <div class="gx-main-content">
          <!--gx-wrapper-->
          <div class="gx-wrapper">
            @yield('content')
          </div>
        </div>
    </div>
  </div>

@endsection

@section('scripts')

  <!--Load JQuery-->
<script src="{{URL::asset('main/node_modules/jquery/dist/jquery.min.js')}}"></script>
<!--Bootstrap JQuery-->
<script src="{{URL::asset('main/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!--Perfect Scrollbar JQuery-->
<script src="{{URL::asset('main/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<!--Big Slide JQuery-->
<script src="{{URL::asset('main/node_modules/bigslide/dist/bigSlide.min.js')}}"></script>
<!--Custom JQuery-->
<script src="{{URL::asset('main/js/functions.js')}}"></script>



<script src="{{URL::asset('main/plugins/chosen/chosen.jquery.js')}}"></script>
<script src="{{URL::asset('main/plugins/velocity/velocity.js')}}"></script>
<script src="{{URL::asset('main/plugins/velocity/velocity.ui.js')}}"></script>
<script src="{{URL::asset('main/plugins/slider/js/bootstrap-slider.js')}}"></script>
<script src="{{URL::asset('main/plugins/filestyle/bootstrap-filestyle.js')}}"></script>
<script src="{{URL::asset('main/plugins/animo/animo.js')}}"></script>
<script src="{{URL::asset('main/plugins/sparklines/jquery.sparkline.js')}}"></script>
<script src="{{URL::asset('main/plugins/slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{URL::asset('main/plugins/datatable/media/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('main/plugins/datatable/extensions/datatable-bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('main/plugins/datatable/extensions/ColVis/js/dataTables.colVis.js')}}"></script>
<script src="{{URL::asset('main/tradify/highcharts.js')}}"></script>
<script src="{{URL::asset('main/tradify/exporting.js')}}"></script>
<script src="{{URL::asset('main/js/tradify.js')}}"></script>

@endsection
