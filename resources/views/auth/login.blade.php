@extends('layouts.authmaster')

@section('content')
  <div class="login-container d-flex justify-content-center align-items-center animated slideInUpTiny animation-duration-3">
                      <div class="login-content">
                          <div class="login-header">
                              <a class="site-logo" href="javascript:void(0)" title="Cryex">
                                  <img src="images/logo-color.png" alt="Cryex" title="Cryex">
                              </a>
                          </div>
                          <div class="login-form">
                              <form method="POST" action="{{ route('login') }}">
                                                        @csrf
                                  <fieldset>
                                      <div class="form-group">
                                          <input name="email" id="email" class="form-control form-control-lg" placeholder="Email" type="email" value="{{ old('email') }}" required autofocus>
                                          @if ($errors->has('email'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                      <div class="form-group">
                                          <input name="password" id="password" class="form-control form-control-lg" placeholder="Password" type="password">
                                          @if ($errors->has('password'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                      <div class="form-group text-row-between">
                                          <div class="custom-control custom-checkbox mr-2">
                                              <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember">
                                              <label class="custom-control-label" for="customControlInline">Remember me</label>
                                          </div>
                                          <p>
                                              <a href="{{ route('password.request') }}" title="Reset Password">Forgot your password</a>
                                          </p>
                                      </div>
                                      <div class="mt-4 mb-2">
                                        <button class="gx-btn gx-btn-rounded gx-btn-primary">Sign In</button>
                                      <p>Don't have an account
                                          <a href="{{ route('register') }}">Register</a>
                                      </p>

                                  </fieldset>
                              </form>
                          </div>
                      </div>
                  </div>
@endsection
