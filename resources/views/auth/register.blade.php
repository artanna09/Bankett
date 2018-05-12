@extends('layouts.app')

@section('content')
<div class="register-photo">
    <div class="form-container">
        <div class="image-holder"></div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2 class="text-center"><strong>Reģistrācija</strong></h2>
            <div class="form-group">
                <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="E-pasts" value="{{ old('email') }}" autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Parole" name="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Atkārtot paroli">
            </div>
            <div class="form-group">
                <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" value="{{ old('name') }}" placeholder="Vārds" name="name">
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input id="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" value="{{ old('surname') }}" type="text" placeholder="Uzvārds" name="surname">
                @if ($errors->has('surname'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" type="tel" placeholder="Tālrunis" name="phone">
                @if ($errors->has('phone'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-6"><button class="btn btn-primary btn-block" type="submit">Reģistrēties</button></div>
                <div class="col-6"><buton class="btn btn-primary btn-block" onclick="window.location.href='{{ url('/') }}'">Atcelt</button></div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
