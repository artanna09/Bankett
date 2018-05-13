@extends('layouts.app') 

@section('content')
<div>
    <div class="container zinas">
        <h1 class="zinas-h">{{ $post->title }}</h1>
        <img src="{{ asset('/storage/posts/'. $post->picture)  }}" class="zina-img">
        <p class="zinas-p">{{ $post->text }}</p>
    </div>
</div>
<div class="zina-data">
    <p>{{ $post->updated_at }}</p>
</div>
@if(Auth::user()->isAdmin())
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <button class="btn btn-primary btn-block" type="submit" onclick="window.location.href='{{ route('editPost', ['id' => $post->id]) }}'">Rediģēt ziņu</button>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endif
@endsection