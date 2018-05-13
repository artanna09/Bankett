@extends('layouts.app')

@section('content')
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
                        <p>{{ $service->price }}&nbsp;<i class="fa fa-eur"></i></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 pakalpojumi-info1">
                        <h4>Atrašanas vieta:</h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $service->district . ', ' . $service->adress }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 pakalpojumi-info1">
                        <h4>Cilvēku daudzums:</h4>
                    </div>
                    <div class="col">
                        <p>{{ $service->person_number_from . '-' . $service->person_number_to }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 pakalpojumi-info1">
                        <h4>Kontaktinformācija:</h4>
                    </div>
                    <div class="col">
                        <p>E-pasts: {{ $service->email }}</p>
                        <p>Telefons: {{ $service->phone }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary btn-block" type="submit" onclick="window.location.href='{{ route('contactService', ['id' => $service->id]) }}'">Uzrakstiet e-ziņu pakalpojuma snedzējam</button>
                    </div>
                </div>
                @if(Auth::user()->isAdmin())
                    <div class="row">
                        <div class="col-12 pakalpojumi-row-button">
                            <button class="btn btn-primary btn-block" type="submit" onclick="window.location.href='{{ route('editService', ['id' => $service->id]) }}'">Rediģet pakalpojumu</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-6">
                <h2></h2>
                <p>{{ $service->description }}</p>
                <h4>Papildpakalpojumi:</h4>
                <p>{{ $service->extra_service }}</p>
                <a class="btn btn-primary" href="{{ route('addToFavorites', ['id' => $service->id]) }}">Pievienot favorītiem <i class="fa fa-heart" id="navbar-icon"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="atsauksmes">
    <form action="{{ route('storeFeedback', ['id' => $service->id]) }}" method="post">
        @csrf
        <div class="container">
            <h3>Atstāt atsauksmi</h3>
            <div class="row">
                <div class="col-9">
                    <textarea rows="5" class="form-control" placeholder="Atsauksmes teksts..." name="text"></textarea>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary btn-block" type="submit">Publicēt</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row no-gutters">
        <div class="col-4 pakalpojumi-info1">
            <h3>Lietotāju atsauksmes</h3>
        </div>
    </div>
    @foreach ($feedbacks as $feedback)
        <div class="container">
            <div class="row">
                <div class="col-2 atsauksme-bilde">
                    <img src="{{ asset('/storage/users/'. $feedback->user->picture)  }}" class="atsauksme-bilde">
                </div>
                <div class="col-7">
                    <h5>{{ $feedback->user->name . ' ' . $feedback->user->surname }}</h5>
                    <p>{{ $feedback->text }}</p>
                </div>
                @if(Auth::user()->isAdmin() || Auth::user()->id == $feedback->user->id)
                <div class="col button7">
                    <button class="btn btn-primary btn-block" onclick="window.location.href='{{ route('deleteFeedback', ['id' => $feedback->id]) }}';return false;">Dzēst</button>
                </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection