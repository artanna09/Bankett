@extends('layouts.app') 

@section('content')
<div class="container">
    @if(count($favorites)>0)
        @foreach($favorites as $favorite)
        <div class="row blog-zina">
            <div class="col-5 blog-img-col">
                <img src="{{ asset('/storage/services/'. $favorite->service->photo)  }}" class="blog-img">
            </div>
            <div class="col-5">
                <h1>{{ $favorite->service->title }}</h1>
                <p>{{ $favorite->service->text }}</p>
                <a href="{{ route('showService', ['id' => $favorite->service->id]) }}">Lasīt visu ziņu...</a>
            </div>
            <div class="col-2">
                <button class="btn btn-primary btn-block" onclick="window.location.href='{{ route('removeFavorite', ['id' => $favorite->id]) }}'">Dzēst</button>
            </div>
        </div>
        @endforeach
    <div class="pages-list" style="transform: translateX(45%);">
        {{$favorites->links()}}
    </div>
    @else
        <h1>Tukšs...</h1>
    @endif
</div>
@endsection