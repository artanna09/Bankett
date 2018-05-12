@extends('layouts.app')

@section('content')
<div class="register-photo">
    <div class="form-container">
        <div class="image-holder2"></div>
        <form method="post" action="{{ route('sendServiceRequest') }}">
            @csrf
            <h3 class="par-pakalpojumu">Aprakstiet šeit jūsu pakalpojumu, lai mūsu admins varētu to pievienot</h3>
            <div class="form-group">
                <textarea class="form-control" rows="10" name="content"></textarea>
            </div>
            <p>Neaizmirstiet minēt tādus punktus, kā nosaukums, kategorija, cena, atrašanas vieta, kontaktinformācija, cilvēku
                daudzums, apraksts un papildpakalpojumi.</p>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" onclick="alert('Jūsu pieprasījums tika aizsūtīts administratoram!'); return true;">Atsutīt</button>
                <button class="btn btn-primary btn-block" onclick="window.history.go(-1); return false;">Atcelt</button>
            </div>
        </form>
    </div>
</div>
@endsection