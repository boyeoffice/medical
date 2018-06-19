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
                                    <img src="{{asset('img/logo_login_page.svg')}}" alt="MEDICAL">
                                </span>
                            </a>
                            <h4 class="text-upper text-center">Entrar</h4>
                        </div>
                        <div class="account-content">
                            <form class="from-vertical" action="{{route('login')}}" method="POST" id="login">
                                 {{ csrf_field() }}
                                <div class="form-group mb-20 row required {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label" for="email">
                                        Email<sup>*</sup>
                                    </label>
                                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" required="">
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
                                    <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                                     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-gorup row text-center">
                                    <button class="btn btn-block theme-btn" type="submit">entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection