@extends('layouts.app')

@section('content')
<div class="container">
    <div class="three">
        <h1>Profila rediģēšana</h1>
    </div>
    <div class="profile-red">
        <div class="container">
            <form method="post" action="{{ route('updateUserProfile') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label" for="name">Vārds</label>
                        </div>
                        <div class="col-6">
                            <input class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" type="text" name="name" id="name" value="@if(old('name') == ""){{ $user->name }}@else{{ old('name') }}@endif">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label" for="surname">Uzvārds</label>
                        </div>
                        <div class="col-6">
                            <input class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" type="text" name="surname" id="surname" value="@if(old('surname') == ""){{ $user->surname }}@else{{ old('surname') }}@endif">
                            @if ($errors->has('surname'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label" for="password">Parole</label>
                        </div>
                        <div class="col-6">
                            <input class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" type="password" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label" for="title">Atkārtot paroli</label>
                        </div>
                        <div class="col-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label" for="email">E-pasts</label>
                        </div>
                        <div class="col-6">
                            <input class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="email" type="email" value="@if(old('email') == ""){{ $user->email }}@else{{ old('email') }}@endif">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label" for="phone">Tālrunis</label>
                        </div>
                        <div class="col-6">
                            <input class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" type="phone" name="phone" value="@if(old('phone') == ""){{ $user->phone }}@else{{ old('phone') }}@endif">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label" for="picture">Profila bilde</label>
                        </div>
                        <div class="col-6">
                            <input type="file" name="picture" id="picture">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <button class="btn btn-primary btn-block" onclick="window.location.href='{{ route('deleteUser') }}';return false;">Dzēst profilu</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary btn-block" type="submit">Saglabāt</button>
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
            <div class="row">
                <div class="col">
                    <a class="atcelt" href="{{ route('userProfile') }}">Atcelt</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection