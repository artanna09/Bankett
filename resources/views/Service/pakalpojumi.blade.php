@extends('layouts.app') 

@section('content')
<div class="main-block">
    <div class="container">
        <form method="GET" action="{{ Request::url() }}" role="search">
            <div class="row">
                <div class="col-2">
                    <h5>Nosaukums</h5>
                    <input class="form-control" type="text" name="title">
                </div>
                <div class="col-3">
                    <h5>Cena</h5>
                    <div class="row">
                        <div class="col-2">
                            <p>No</p>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="number" name="fromPrice" step="0.01">
                        </div>
                        <div class="col-2">
                            <p>Līdz</p>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="number" name="toPrice" step="0.01">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <h5>Cilvēku daudzums</h5>
                    <input class="form-control" type="number" name="peopleCount">
                </div>
                <div class="col-2">
                    <h5>Atrašanas vieta</h5>
                    <select name="district" class="form-control">
                        <option value="Visi" selected="">Visi</option>
                        <optgroup label="Riga">
                            <option value="Centrs">Centrs</option>
                            <option value="Purvciems">Purvciems</option>
                            <option value="Pļavnieki">Pļavnieki</option>
                        </optgroup>
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary btn-block" type="submit">Meklēt</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="pakalpojumi">
    <div class="row">
        <div class="col-3">
            <ul class="push">
                <a href="{{ route('services') }}"><li>Visi pakalpojumi</li></a>                
                @foreach ($serviceTypes as $serviceType)
                    <a href="{{ route('sortServices', ['id' => $serviceType->id]) }}"><li>{{ $serviceType->name }}</li></a>
                @endforeach
            </ul>
        </div>
        <div class="col-9">
            @foreach ($services as $service)
                <div class="row pakalpjumi-list">
                    <div class="col-6">
                        <h2>{{ $service->title }}</h2>
                        <p>{{ $service->price }}&nbsp;<i class="fa fa-eur"></i></p>
                        <p>{{ $service->description }}</p>
                        <p>{{ $service->adress }}</p>
                        <a href="{{ route('showService', ['id' => $service->id]) }}">Lasīt visu pakalpojumu...</a>
                    </div>
                    <div class="col">
                        <img src="{{ asset('/storage/services/'. $service->photo)  }}" class="pakalpojumi-img">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection