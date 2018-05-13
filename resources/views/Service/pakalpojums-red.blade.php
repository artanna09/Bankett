@extends('layouts.app')

@section('content')
<div>
    <div class="three">
        <h1>Pakalpojumu rediģēšana</h1>
    </div>
</div>
<form method="post" action="{{ route('updateService', ['id' => $service->id]) }}" enctype="multipart/form-data">
    <div>
        <div class="container">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="title">Nosaukums</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="title" id="title" class="form-control" value="@if(old('title') == ""){{ $service->title }}@else{{ old('title') }}@endif">
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
                        <label class="col-form-label" for="title">Tips</label>
                    </div>
                    <div class="col-6">
                        {{ Form::select('serviceType', $serviceTypes, ['class' => 'form-control']) }} 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="price">Cena</label>
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control" name="price" value="@if(old('price') == ""){{ $service->price }}@else{{ old('price') }}@endif" step="0.01">
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
                        <label class="col-form-label" for="title">Atrašanas vieta</label>
                    </div>
                    <div class="col-6">
                        <select name="district" class="form-control">
                            <optgroup label="Riga">
                                <option value="Centrs" @if( $service->district == "Centrs" ) selected="" @endif>Centrs</option>
                                <option value="Purvciems" @if( $service->district == "Purvciems" ) selected="" @endif>Purvciems</option>
                                <option value="Pļavnieki" @if( $service->district == "Pļavnieki" ) selected="" @endif>Pļavnieki</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="adress">Adrese</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="adress" value="@if(old('adress') == ""){{ $service->adress }}@else{{ old('adress') }}@endif">
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
                        <input type="number" class="form-control" name="person_number_from" value="@if(old('person_number_from') == ""){{ $service->person_number_from }}@else{{ old('person_number_from') }}@endif">
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
                        <input type="number" class="form-control" name="person_number_to" value="@if(old('person_number_to') == ""){{ $service->person_number_to }}@else{{ old('person_number_to') }}@endif">
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
                        <input type="email" class="form-control" name="email" value="@if(old('email') == ""){{ $service->email }}@else{{ old('email') }}@endif">
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
                        <input type="phone" class="form-control" name="phone" value="@if(old('phone') == ""){{ $service->phone }}@else{{ old('phone') }}@endif">
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
                        <textarea class="form-control" rows="10" name="description">@if(old('description') == ""){{ $service->description }}@else{{ old('description') }}@endif</textarea>
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
                        <label class="col-form-label" for="extra_service">Papildpakalpojumi</label>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" rows="10" name="extra_service">@if(old('extra_service') == ""){{ $service->extra_service }}@else{{ old('extra_service') }}@endif</textarea>
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
                        <label class="col-form-label" for="photo">Bilde</label>
                    </div>
                    <div class="col-6">
                        <input type="file" name="photo">
                        @if ($errors->has('photo'))
                            <span class="invalid-feedback">
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
                <div class="col-2"></div>
                <div class="col-4">
                    <button class="btn btn-primary btn-block" onclick="window.location.href='{{ route('deleteService', ['id' => $service->id]) }}';return false;">Dzēst pakalpojumu</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary btn-block" type="submit">Saglabāt</button>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-12">
        <a class="atcelt" href="{{ route('services') }}">Atcelt</a>
    </div>
</div>
@endsection