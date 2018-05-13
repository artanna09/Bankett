@extends('layouts.app')
@section('content')
<div>
    <div class="three">
        <h1>Ziņas veidošana</h1>
    </div>
</div>
<div>
    <div class="container">
        <form method="POST" action="{{ route('createPost') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="title">Nosaukums</label>
                    </div>
                    <div class="col-6">
                        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title') }}"> @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span> @endif
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="text">Ziņa</label>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" id="text" rows="10"
                            >{{ old('text') }}</textarea> @if ($errors->has('text'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('text') }}</strong>
                        </span> @endif
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-2 form-headings">
                        <label class="col-form-label" for="picture">Bilde</label>
                    </div>
                    <div class="col-6">
                        <input type="file" id="picture" name="picture"> @if ($errors->has('picture'))
                        <span class="invalid-feedback-input">
                            <strong>{{ $errors->first('picture') }}</strong>
                        </span> @endif
                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="col-2"></div>
                <div class="col-4">
                    <button class="btn btn-primary btn-block" type="submit">Publicēt</button>
                    <a href='{{ route('blog') }}' class="atcelt">Atcelt</a>
                </div>

                <div class="col-2"></div>
            </div>
        </form>
    </div>
</div>
@endsection