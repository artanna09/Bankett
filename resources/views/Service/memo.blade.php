@extends('layouts.app') 

@section('content')
<div class="container">
    @if(count($favorites)>0)
        @foreach($favorites as $favorite)

        <div class="row blog-zina">
            <div class="col-5 blog-img-col">
                <img src="{{ asset('/storage/posts/'. $favorite->service->picture)  }}" class="blog-img">
            </div>
            <div class="col-7">
                <h1>{{ $favorite->service->title }}</h1>
                <p>{{ $favorite->service->updated_at }}</p>
                <p>{{ $favorite->service->text }}</p>
                <a href="{{ route('showService', ['id' => $favorite->service->id]) }}">Lasīt visu ziņu...</a>
            </div>
        </div>
        @endforeach
    <div class="pages-list" style="transform: translateX(45%);">
        {{$favorites->service->links()}}
    </div>
    @else
        <h1>Ziņas netika atrastas</h1>
    @endif
</div>
@endsection