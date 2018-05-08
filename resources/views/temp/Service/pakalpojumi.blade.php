<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bankett</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="#"><img src="assets/img/banquet.png" class="bankett-icon">Bankett</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color:rgb(252,242,229);width:250px;">Administratoriem</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Pievienot pakalpojumu</a><a class="dropdown-item" role="presentation" href="#">Pievienot ziņu</a></div>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="color:rgb(252,242,229);">Blogs</a></li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color:rgb(252,242,229);">Pakalpojumi&nbsp;</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Svētku pakalpojumi</a><a class="dropdown-item" role="presentation" href="#">Pieprasīt pakalpojumu pievienošanu</a></div>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="color:rgb(252,242,229);"><i class="fa fa-heart" id="navbar-icon"></i>Memo</a></li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color:rgb(252,242,229);">Profils</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Mans profils</a><a class="dropdown-item" role="presentation" href="#">Iziet</a></div>
                        </li>
                    </ul><span class="navbar-text actions"> </span></div>
    </div>
    </nav>
    </div>
    <div class="main-block">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h5>Nosaukums</h5>
                    <form><input class="form-control" type="search"></form>
                </div>
                <div class="col-3">
                    <h5>Cena</h5>
                    <div class="row">
                        <div class="col-2">
                            <p>No</p>
                        </div>
                        <div class="col-4">
                            <form><input class="form-control" type="number"></form>
                        </div>
                        <div class="col-2">
                            <p>Līdz</p>
                        </div>
                        <div class="col-4">
                            <form><input class="form-control" type="number"></form>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <h5>Cilvēku daudzums</h5>
                    <div class="row">
                        <div class="col-2">
                            <p>No</p>
                        </div>
                        <div class="col-4">
                            <form><input class="form-control" type="number"></form>
                        </div>
                        <div class="col-2">
                            <p>Līdz</p>
                        </div>
                        <div class="col-4">
                            <form><input class="form-control" type="number"></form>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <h5>Atrašanas vieta</h5><select><optgroup label="Riga"><option value="12" selected="">Centrs</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                <div class="col-2"><button class="btn btn-primary btn-block" type="submit">Meklēt</button></div>
            </div>
        </div>
    </div>
    <div class="pakalpojumi">
        <div class="row">
            <div class="col-3"><ul class="push">
  <li>Banketu zāles</li>
  <li>Pasākumu organizatori</li>
  <li>Fotografi un operatori</li>
  <li>Mūzikas grupas un izpildītāji</li>
  <li>Dekorētāji</li>
  <li>Pasākumu vadītāji</li>
</ul></div>
            <div class="col-9">
                <div class="row">
                    <div class="col-6">
                        <h2>Pakalpojums 1</h2>
                        <p></p>
                        <p>Cena</p>
                        <p>Atrašanas vieta</p>
                        <p>Apraksts 1</p><a href="#">Lasīt visu pakalpojumu...</a></div>
                    <div class="col"><img src="assets/img/large.jpg" class="pakalpojumi-img"></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h2>Pakalpojums 2</h2>
                        <p></p>
                        <p>Cena</p>
                        <p>Atrašanas vieta</p>
                        <p>Apraksts 2</p><a href="#">Lasīt visu pakalpojumu...</a></div>
                    <div class="col"><img src="assets/img/normal.jpg" class="pakalpojumi-img"></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h2>Pakalpojums 3</h2>
                        <p></p>
                        <p>Cena</p>
                        <p>Atrašanas vieta</p>
                        <p>Apraksts 3</p><a href="#">Lasīt visu pakalpojumu...</a></div>
                    <div class="col"><img src="assets/img/normal (1).jpg" class="pakalpojumi-img"></div>
                </div>
            </div>
        </div>
    </div>
    <div></div>
    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Blogs</a></li>
                <li class="list-inline-item"><a href="#">Pakalpojumi</a></li>
                <li class="list-inline-item"><a href="#">Mans profils</a></li>
            </ul>
            <p class="copyright">Latvijas Universitāte 2018</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>