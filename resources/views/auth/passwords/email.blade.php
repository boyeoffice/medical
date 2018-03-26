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
                            <h4 class="text-upper text-center">Reset Password</h4>
                        </div>
                        <div class="account-content">
                            <form class="from-vertical" action="{{route('password.email')}}" method="POST" id="password-email">
                                 {{ csrf_field() }}
                                <div class="form-group mb-20 row required {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label" for="email">
                                        Email<sup>*</sup>
                                    </label>
                                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" required="" value="{{ old('email') }}">
                                      @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-gorup row text-center">
                                    <button class="btn btn-block theme-btn" type="submit"> Send Password Reset Link</button>
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