@extends('layouts.app')

@section('content')
<div class="main-block">
    <div class="container">
        <div class="three">
            <h1>INTERESANTI! Ziņas par svētkiem</h1>
        </div>
        <div class="row blog-zina">
            <div class="col-5 blog-img-col"><img src="assets/img/2711131909_1928632259 - Copy.jpg" class="blog-img"></div>
            <div class="col-7">
                <h1>Nosaukums 1</h1>
                <p>Apraksts 1</p><a href="#">Lasīt visu ziņu...</a></div>
        </div>
        <div class="row blog-zina">
            <div class="col-5 blog-img-col"><img src="assets/img/336_front_banket - Copy.jpg" class="blog-img"></div>
            <div class="col-7">
                <h1>Nosaukums 2</h1>
                <p>Data un laiks</p>
                <p>Data un laiks</p>
                <p>Apraksts 1</p><a href="#">Lasīt visu ziņu...</a></div>
        </div>
        <div class="row blog-zina">
            <div class="col-5 blog-img-col"><img src="assets/img/hochzeitstorte_anschneiden_detail - Copy.jpg" class="blog-img"></div>
            <div class="col-7">
                <h1>Nosaukums 3</h1>
                <p>Data un laiks</p>
                <p>Apraksts 1</p><a href="#">Lasīt visu ziņu...</a></div>
        </div>
        <div class="pages-list"></div>
    </div>
</div>
@endsection