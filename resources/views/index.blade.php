@extends('layouts.app')

@section('content')
    <div id="block_1">
        <div id="round-1">
            <h1 id="cover-1-heading"> BANKETT - sludinājumu sistēma svētku organizēšanai</h1>
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
                <p>Aizmirstiet par dažām paterētam stundām "guglēšanai". « Bankett » — tā ir sistēma, kas atvieglo dzīvi visiem,
                        kuri ir aizņemti ar svētku sagatavošanās procesu. Mūsu pasākumu noformējums ļauj organizēt svinības Rīgā
                        rekordliels īsos termiņos. Korporatīvs, kāzas, jubilejs: neatkarīgi no iemesla, visi organizatoriskie
                        jautājumi tiks atrisinātas ar apbrīnojamu ātrumu.</p>
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
                    <img src="{{ asset('img/farblog5.jpg') }}" />
                        <div class="box_data">
                            <span>Pasākumu organizatori</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <img src="{{ asset('img/c_blur.jpg') }}" />
                        <div class="box_data">
                            <span>Fotografi un operatori</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <img src="{{ asset('img/4930.jpg') }}" />
                        <div class="box_data">
                            <span>Banketu zāles</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <img src="{{ asset('img/img_0653.jpg') }}" />
                        <div class="box_data">
                            <span>Mūzikas grupas un izpildītāji</span>
                        </div>
                    </a>
                </li>
                <li style="  position:relative;
            top:-134px;
            ">
                    <a href="#0">
                        <img src="{{ asset('img/decor.jpg') }}" />
                        <div class="box_data">
                            <span>Dekorētāji</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <img src="{{ asset('img/510.jpg') }}" />
                        <div class="box_data">
                            <span>Pasākumu vadītāji</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="virsraksts">
        <div class="container">
            <div class="three">
                <h1>Mūsu mājaslapā jūs varēsiet redzēt informāciju par tādiem atslēgas momentiem, kā:</h1>
            </div>
        </div>
    </div>
    <div id="pakalpojumi">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <i class="fa fa-money icon_6"></i>
                    <h4 class="heading_6">Pakalpojumu cena</h4>
                </div>
                <div class="col-2">
                    <i class="fa fa-phone icon_6"></i>
                    <h4 class="heading_6">Kontaktu informācija</h4>
                </div>
                <div class="col-2">
                    <i class="fa fa-thumbs-up icon_6"></i>
                    <h4 class="heading_6">Lietotāju atsauksmes</h4>
                </div>
                <div class="col-2">
                    <i class="fa fa-map icon_6"></i>
                    <h4 class="heading_6">Atrašanas vieta</h4>
                </div>
                <div class="col-2">
                    <i class="fa fa-music icon_6"></i>
                    <h4 class="heading_6">Papildu pakalpojumi</h4>
                </div>
                <div class="col-2">
                    <i class="fa fa-users icon_6"></i>
                    <h4 class="heading_6">Atļautais cilvēku skaits
                        <br />
                        <br />
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection