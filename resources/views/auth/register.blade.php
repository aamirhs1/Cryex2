@extends('layouts.authmaster')

@section('content')
  <div class="login-container d-flex justify-content-center align-items-center animated slideInUpTiny animation-duration-3">
                      <div class="login-content text-center">
                          <div class="login-header">
                              <a class="site-logo" href="javascript:void(0)" title="Cryex">
                                  <img src="images/logo-color.png" alt="Cryex" title="Cryex">
                              </a>
                          </div>
                          <div class="mb-4">
                              <h2>Create an account</h2>
                          </div>
                          <div class="login-form">
                              <form method="POST" action="{{ route('register') }}">
                                                        @csrf
                                  <div class="form-group">
                                      <input placeholder="Name" class="form-control form-control-lg" type="text" name="name">
                                      @if ($errors->has('name'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('name') }}</strong>
                                           </span>
                                       @endif
                                  </div>
                                  <div class="form-group">
                                      <input placeholder="Email" class="form-control form-control-lg" type="text" name="email">
                                      @if ($errors->has('email'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="form-group">
                                      <input placeholder="Password" class="form-control form-control-lg" type="password" name="password">
                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="form-group">
                                      <input placeholder="Confirm Password" class="form-control form-control-lg" type="password" name="password_confirmation">

                                  </div>
                                  <div class="mt-4 mb-2">
                                    <button class="gx-btn gx-btn-rounded gx-btn-primary">Register</button>
                                  <p>Have an account
                                      <a href="{{ route('login') }}">Sign in</a>
                                  </p>
                              </form>
                          </div>
                      </div>
                  </div>

@endsection
