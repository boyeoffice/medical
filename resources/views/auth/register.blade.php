@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="wrapper-page">
                <div class="account-pages">
                    <div class="account-box">
                        <div class="account-logo-box">
                            <a href="{{url('/')}}" class="d-block text-center">
                                <span>
                                    <img src="{{asset('img/logo.svg')}}" alt="MEDICAL">
                                </span>
                            </a>
                            <h4 class="text-upper text-center">Register</h4>
                        </div>
                        <div class="account-content">
                            <form class="from-vertical" action="{{route('register')}}" method="POST" id="register">
                                 {{ csrf_field() }}
                                <div class="form-group mb-20 row required {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label class="control-label" for="name">
                                        Username<sup>*</sup>
                                    </label>
                                    <input id="username" type="text" class="form-control" placeholder="Username" name="username" required=""  value="{{ old('username') }}">
                                      @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                  <div class="form-group mb-20 row required {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="control-label" for="name">
                                        Name<sup>*</sup>
                                    </label>
                                    <input id="name" type="text" class="form-control" placeholder="Name" name="name" required=""  value="{{ old('name') }}">
                                      @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group mb-20 row required {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label" for="email">
                                        Email<sup>*</sup>
                                    </label>
                                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" required=""  value="{{ old('email') }}">
                                      @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group mb-20 row required {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="control-label" for="password">
                                        Password<sup>*</sup>
                                    </label>
                                    <input type="password" id="password" class="form-control" required="" placeholder="Password" name="password">
                                     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group mb-20 row required">
                                    <label class="control-label" for="password">
                                       Confirm Password<sup>*</sup>
                                    </label>
                                    <input type="password" id="password-confirm" class="form-control" required="" placeholder="Password" name="password_confirmation">
                                </div>
                                <div class="form-gorup row text-center">
                                    <button class="btn btn-block theme-btn" type="submit">Register</button>
                                </div>
                            </form>
                            <div class="row mt-30">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">
                                        Already have an account? 
                                        <a href="{{route('login')}}">Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection