@extends('layouts.app') 
@section('content')
<div>
    <div class="three">
        <h1>Pakalpojumu veidošana</h1>
    </div>
</div>
<div id="profile-red">
    <div class="container">
        <div class="row row-profile-red">
            <div class="col-4">
                <h4 class="profile-red-info">Nosaukums:</h4>
            </div>
            <div class="col-4">
                <form>
                    <input class="form-control" type="text">
                </form>
            </div>
        </div>
        <div class="row row-profile-red">
            <div class="col-4">
                <h4 class="profile-red-info">Cena:</h4>
            </div>
            <div class="col-4">
                <form>
                    <input class="form-control" type="text">
                </form>
            </div>
        </div>
        <div class="row row-profile-red">
            <div class="col-4">
                <h4 class="profile-red-info">Atrašanas vieta:</h4>
            </div>
            <div class="col-4">
                <form>
                    <select class="form-control">
                        <optgroup label="This is a group">
                            <option value="12" selected="">This is item 1</option>
                            <option value="13">This is item 2</option>
                            <option value="14">This is item 3</option>
                        </optgroup>
                    </select>
                </form>
            </div>
        </div>
        <div class="row row-profile-red">
            <div class="col-4">
                <h4 class="profile-red-info">Cilvēku daudzums:</h4>
            </div>
            <div class="col-4">
                <form>
                    <input class="form-control" type="email">
                </form>
            </div>
        </div>
        <div class="row row-profile-red">
            <div class="col-4">
                <h4 class="profile-red-info">Kontaktinformācija:</h4>
            </div>
            <div class="col-4">
                <form>
                    <input class="form-control" type="email">
                </form>
            </div>
        </div>
        <div class="row row-profile-red">
            <div class="col-4">
                <h4 class="profile-red-info">Apraksts:</h4>
            </div>
            <div class="col-8">
                <form>
                    <input class="form-control" type="text" id="papild-form">
                </form>
            </div>
        </div>
        <div class="row row-profile-red">
            <div class="col-4">
                <h4 class="profile-red-info">Papildpakalpojumi:</h4>
            </div>
            <div class="col-8">
                <form>
                    <input class="form-control" type="text" id="apraksts-form">
                </form>
            </div>
        </div>
        <div class="row row-profile-red">
            <div class="col-4">
                <h4 class="profile-red-info">Profila bilde:</h4>
            </div>
            <div class="col-4">
                <form>
                    <input type="file">
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4">
                <button class="btn btn-primary btn-block" type="submit">Saglabāt</button>
            </div>
            <div class="col-4">
                <button class="btn btn-primary btn-block" type="submit">Atcelt</button>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
@endsection