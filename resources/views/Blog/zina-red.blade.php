@extends('layouts.app')

@section('content')
    <div>
        <div class="three">
            <h1>Ziņas rediģēšana</h1>
        </div>
    </div>
    <div>
        <div class="container">
            <form method="post" action="{{ route('updatePost', ['id' => $post->id]) }}"  enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label" for="title">Nosaukums</label>
                        </div>
                        <div class="col-6">
                            <input class="form-control" type="text" name="title" id="title" 
                            value=@if(old('title') == ""){{ $post->title }}@else{{ old('title') }}@endif>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label" for="text">Ziņa</label>
                        </div>
                        <div class="col-6">
                            <textarea class="form-control" name="text" id="text" rows="10">@if(old('text') == ""){{ $post->text }}@else{{ old('text') }}@endif</textarea>
                            @if ($errors->has('text'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-2 form-headings">
                            <label class="col-form-label">Bilde</label>
                        </div>
                        <div class="col-6">
                            <input type="file" name="picture" id="picture">
                            @if ($errors->has('picture'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('picture') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <button class="btn btn-primary btn-block" onclick="window.location.href='{{ route('deletePost', ['id' => $post->id]) }}';return false;">Dzēst ziņu</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary btn-block" type="submit">Publicēt</button>
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
            <div class="row">
                <div class="col">
                    <a class="atcelt" href="{{ route('blog', ['id' => $post->id]) }}">Atcelt</a>
                </div>
            </div>
        </div>
    </div>
@endsection
