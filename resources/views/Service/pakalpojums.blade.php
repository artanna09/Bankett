@extends('layouts.app') @section('content')
<div class="pakalpojums-info">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="{{ asset('/storage/services/'. $service->photo)  }}">
                <h2 class="pakalpojums-nt">{{ $service->title }}</h2>
                <h3 class="pakalpojums-nt">{{ $service->service_type->name }}</h3>
                <div class="row">
                    <div class="col-6 pakalpojumi-info1">
                        <h4>Cena:</h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $service->price }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 pakalpojumi-info1">
                        <h4>Atrašanas vieta:</h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $service->adress }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 pakalpojumi-info1">
                        <h4>Cilvēku daudzums:</h4>
                    </div>
                    <div class="col">
                        <p>{{ $service->person_number }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 pakalpojumi-info1">
                        <h4>Kontaktinformācija:</h4>
                    </div>
                    <div class="col">
                        <p>{{ $service->contact_information }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary btn-block" type="submit" onclick="window.location.href='{{ route('emailService') }}'">Uzrakstiet e-ziņu</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 pakalpojumi-row-button">
                        <button class="btn btn-primary btn-block" type="submit" onclick="window.location.href='{{ route('editService', ['id' => $service->id]) }}'">Rediģet</button>
                    </div>
                    <div class="col-6 pakalpojumi-row-button">
                        <button class="btn btn-primary btn-block" type="submit" onclick="window.location.href='{{ route('deleteService') }}'">Dzēst</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h2></h2>
                <p>{{ $service->description }}</p>
                <h4>Papildpakalpojumi:</h4>
                <p>{{ $service->extra_service }}</p>
            </div>
        </div>
    </div>
</div>
<div class="atsauksmes">
    <div class="container">
        <h3>Lietotāju atsauksmes</h3>
        <div class="row">
            <div class="col-2 atsauksme-bilde">
                <img src="assets/img/0_200.png" class="atsauksme-bilde">
            </div>
            <div class="col-7">
                <p>Atsauksmes teksts</p>
            </div>
            <div class="col button7">
                <button class="btn btn-primary btn-block" type="submit">Rediģet</button>
                <button class="btn btn-primary btn-block" type="submit">Dzēst</button>
            </div>
        </div>
    </div>
</div>
@endsection