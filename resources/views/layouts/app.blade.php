<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description', 'Cryex')">
    <meta name="keywords" content="@yield('meta_keywords', 'Cryex')">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <!-- Title -->
    <title>{{ config('app.name', 'Cryex') }}</title>
    <!-- Stylesheets -->
    @yield('styles')

  </head>
  <body id="@yield('body_id')">
    {{--Page--}}
    @yield('page')

  {{--scripts--}}
  @yield('scripts')
  </body>
</html>
