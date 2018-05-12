@extends('layouts.app') @section('content')
<div class="login-clean">
    <form method="POST" action="{{ route('login') }}" id="auto-form">
        @csrf
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration">
            <i class="fa fa-user"></i>
        </div>
        <div class="form-group">
            <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="E-pasts" value="{{ old('email') }}" autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Parole">
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Ienākt</button>
        </div>
        <a id="forgot-password" href="{{ route('password.request') }}">
            {{ __('Aizmirsu paroli') }}
        </a>
    </form>
</div>
@endsection