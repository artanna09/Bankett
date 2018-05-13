@extends('layouts.app')

@section('content')
<div class="register-photo">
    <div class="form-container">
        <div class="image-holder2"></div>
        <form method="post" action="{{ route('sendServiceRequest') }}" enctype="multipart/form-data">
            @csrf
            <h3 class="par-pakalpojumu">Aprakstiet šeit jūsu pakalpojumu, lai mūsu admins varētu to pievienot</h3>
            <div class="form-group">
                <textarea class="form-control" rows="10" name="content">{{ old('content') }}</textarea>
            </div>
            <p>Neaizmirstiet minēt tādus punktus, kā nosaukums, kategorija, cena, atrašanas vieta, kontaktinformācija, cilvēku
                daudzums, apraksts un papildpakalpojumi.</p>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        <label for="photo">Bilde</label>
                    </div>
                    <div class="col-6">
                        <input type="file" name="photo">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Atsutīt</button>
            </div>
            <a class="atcelt" href="{{ route('services') }}">Atcelt</a>
        </form>
    </div>
</div>
@endsection