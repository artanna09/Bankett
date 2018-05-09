@extends('layouts.app')

@section('content')
@foreach($errors->all() as $message)
    <p class="has-error">{{ $message }}</p>
@endforeach
<div id="block_1">
    <div id="round-1">
        <h1 id="cover-1-heading"> KAUT KO PAR BANKETT</h1>
    </div>

</div>
<div id="block_2">
    <div id="round-1-2">
    </div>
</div>
<div id="par_bankett">
    <div class="border">
        <div class="border-top"></div>
        <div class="center">
            <p>Bankett....</p>
        </div>
        <div class="border-bottom"></div>
    </div>
</div>
<div class="virsraksts">
    <div class="three">
        <h1>Svētki Rīgā: labākie piedavājumi</h1>
    </div>
</div>
<div id="foto_galerija">
    <div class="container">
        <ul class="gallery_box">
            <li>
                <a href="#0">
                    <img src="{{ asset('img/farblog5.jpg') }}">
                    <div class="box_data">
                        <span>Ravi With Bike</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#0">
                    <img src="{{ asset('img/c_blur.jpg') }}">
                    <div class="box_data">
                        <span>Ravi Singh</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#0">
                    <img src="{{ asset('img/4930.jpg') }}">
                    <div class="box_data">
                        <span>White wall</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#0">
                    <img src="{{ asset('img/img_0653.jpg') }}">
                    <div class="box_data">
                        <span>Green Tree</span>
                    </div>
                </a>
            </li>
            <li style="    position: relative;
    top: -134px;">
                <a href="#0">
                    <img src="{{ asset('img/decor.jpg') }}">
                    <div class="box_data">
                        <span>Blue</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#0">
                    <img src="{{ asset('img/510.jpg') }}">
                    <div class="box_data">
                        <span>Ravi</span>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>
<div class="virsraksts">
    <div class="container">
        <div class="three">
            <h1>На нашем сайте вы можете увидеть полную картину по таким ключевым моментам, как:</h1>
        </div>
    </div>
</div>
<div id="pakalpojumi">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <i class="fa fa-money icon_6"></i>
                <h4 class="heading_6">Heading</h4>
            </div>
            <div class="col-2">
                <i class="fa fa-calendar-o icon_6"></i>
                <h4 class="heading_6">Heading</h4>
            </div>
            <div class="col-2">
                <i class="fa fa-cutlery icon_6"></i>
                <h4 class="heading_6">Heading</h4>
            </div>
            <div class="col-2">
                <i class="fa fa-automobile icon_6"></i>
                <h4 class="heading_6">Heading</h4>
            </div>
            <div class="col-2">
                <i class="fa fa-music icon_6"></i>
                <h4 class="heading_6">Heading</h4>
            </div>
            <div class="col-2">
                <i class="fa fa-birthday-cake icon_6"></i>
                <h4 class="heading_6">Heading</h4>
            </div>
        </div>
    </div>
</div>
@endsection