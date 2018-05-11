@extends('layouts.app') 

@section('content')
<div class="main-block">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h5>Nosaukums</h5>
                <form>
                    <input class="form-control" type="search">
                </form>
            </div>
            <div class="col-3">
                <h5>Cena</h5>
                <div class="row">
                    <div class="col-2">
                        <p>No</p>
                    </div>
                    <div class="col-4">
                        <form>
                            <input class="form-control" type="number">
                        </form>
                    </div>
                    <div class="col-2">
                        <p>Līdz</p>
                    </div>
                    <div class="col-4">
                        <form>
                            <input class="form-control" type="number">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <h5>Cilvēku daudzums</h5>
                <div class="row">
                    <div class="col-2">
                        <p>No</p>
                    </div>
                    <div class="col-4">
                        <form>
                            <input class="form-control" type="number">
                        </form>
                    </div>
                    <div class="col-2">
                        <p>Līdz</p>
                    </div>
                    <div class="col-4">
                        <form>
                            <input class="form-control" type="number">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <h5>Atrašanas vieta</h5>
                <select>
                    <optgroup label="Riga">
                        <option value="12" selected="">Centrs</option>
                        <option value="13">This is item 2</option>
                        <option value="14">This is item 3</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-2">
                <button class="btn btn-primary btn-block" type="submit">Meklēt</button>
            </div>
        </div>
    </div>
</div>
<div class="pakalpojumi">
    <div class="row">
        <div class="col-3">
            <ul class="push">
                <li>Banketu zāles</li>
                <li>Pasākumu organizatori</li>
                <li>Fotografi un operatori</li>
                <li>Mūzikas grupas un izpildītāji</li>
                <li>Dekorētāji</li>
                <li>Pasākumu vadītāji</li>
            </ul>
        </div>
        <div class="col-9">
            @foreach ($services as $service)
                <div class="row">
                    <div class="col-6">
                        <h2>{{ $service->title }}</h2>
                        <p>{{ $service->price }}</p>
                        <p>{{ $service->adress }}</p>
                        <p>{{ $service->description }}</p>
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