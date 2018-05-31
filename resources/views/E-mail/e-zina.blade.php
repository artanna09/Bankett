@extends('layouts.app')

@section('content')
<div class="register-photo">
    <div class="form-container">
        <div class="image-holder3"></div>
        <form method="post" action="{{ route('emailServiceContact') }}">
            @csrf
            <h2 class="text-center">
                <strong>Uzrakstiet šeit jūsu ziņu, lai pakalpojumu sniedzējs varētu to apskatīt</strong>
            </h2>
            <div class="form-group">
                <textarea class="form-control" rows="10" name="content">{{ old('content') }}</textarea>
            </div>
            <input type="hidden" value="{{ $serviceId }}" name="serviceId">
            <div class="form-group">
                <div class="form-row">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block" type="submit">Atsūtīt</button>
                            <a class="atcelt" href="{{ route('showService',['id' => $serviceId]) }}">Atcelt</a>
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection