@extends('layouts.app')

@section('content')
<div></div>
    <div class="three">
        <h1>Pakalpojumu veidošana</h1>
    </div>
</div>
<div>
    <div class="container">
        <form method="POST" action="{{ route('createService') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="title">Nosaukums</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="district">Atrašanas vieta</label>
                    </div>
                    <div class="col-6">
                        <select name="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}">
                            <optgroup label="Riga">
                                <option value="Centrs" @if(old('district') == "Centrs") selected="" @endif>Centrs</option>
                                <option value="Purvciems" @if(old('district') == "Purvciems") selected="" @endif>Purvciems</option>
                                <option value="Pļavnieki" @if(old('district') == "Pļavnieki") selected="" @endif>Pļavnieki</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="price">Cena</label>
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" step="0.01">
                        @if ($errors->has('price'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="title">Tips</label>
                    </div>
                    <div class="col-6">
                        {{ Form::select('serviceType', $serviceTypes, null, ['class' => 'form-control']) }} 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="adress">Adrese</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" name="adress" value="{{ old('adress') }}">
                        @if ($errors->has('adress'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('adress') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="person_number_from">Cilvēku daudzums no</label>
                    </div>
                    <div class="col-6">
                        <input class="form-control{{ $errors->has('person_number_from') ? ' is-invalid' : '' }}" type="number" name="person_number_from" value="{{ old('person_number_from') }}">
                        @if ($errors->has('person_number_from'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('person_number_from') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="person_number_to">Cilvēku daudzums līdz</label>
                    </div>
                    <div class="col-6">
                        <input class="form-control{{ $errors->has('person_number_to') ? ' is-invalid' : '' }}" type="number" name="person_number_to" value="{{ old('person_number_to') }}">
                        @if ($errors->has('person_number_to'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('person_number_to') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="email">E-pasts</label>
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="phone">Tālrunis</label>
                    </div>
                    <div class="col-6">
                        <input type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="description">Apraksts</label>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="10">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="extra_service">Papildpakalpojumi</label>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control{{ $errors->has('extra_service') ? ' is-invalid' : '' }}" rows="10" name="extra_service">{{ old('extra_service') }}</textarea>
                        @if ($errors->has('extra_service'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('extra_service') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="photo">Bilde</label>
                    </div>
                    <div class="col-6">
                        <input type="file" name="photo">
                        @if ($errors->has('photo'))
                            <span class="invalid-feedback-input">
                                <strong>{{ $errors->first('photo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <button class="btn btn-primary btn-block" type="submit">Saglabāt</button>
                    <a class="atcelt" href="{{ route('services') }}">Atcelt</a>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </form>
</div>
@endsection