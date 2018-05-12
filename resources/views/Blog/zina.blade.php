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
@endsection