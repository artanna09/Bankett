@extends('layouts.app') 
@section('content')
<div class="main-block">
    <div class="container">
        <div class="three">
            <h1>INTERESANTI! Ziņas par svētkiem</h1>
        </div>
        @if(count($posts)>0)
            @foreach($posts as $post)

            <div class="row blog-zina">
                <div class="col-5 blog-img-col">
                    <img src="{{ asset('/storage/posts/'. $post->picture)  }}" class="blog-img">
                </div>
                <div class="col-7">
                    <h1>{{ $post->title }}</h1>
                    <p>{{ $post->updated_at }}</p>
                    <p>{{ $post->text }}</p>
                    <a href="{{ route('showPost', ['id' => $post->id]) }}">Lasīt visu ziņu...</a>
                </div>
            </div>
            @endforeach
        <div class="pages-list" style="transform: translateX(45%);">
            {{$posts->links()}}
        </div>
        @else
            <h1>Ziņas netika atrastas</h1>
        @endif
    </div>
</div>
@endsection