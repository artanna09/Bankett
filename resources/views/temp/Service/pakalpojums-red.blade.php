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
    <div><div class="three"><h1>Pakalpojumu rediģēšana</h1></div></div>
    <div id="profile-red">
        <div class="container">
            <div class="row row-profile-red">
                <div class="col-4">
                    <h4 class="profile-red-info">Nosaukums:</h4>
                </div>
                <div class="col-4">
                    <form><input class="form-control" type="text"></form>
                </div>
            </div>
            <div class="row row-profile-red">
                <div class="col-4">
                    <h4 class="profile-red-info">Cena:</h4>
                </div>
                <div class="col-4">
                    <form><input class="form-control" type="text"></form>
                </div>
            </div>
            <div class="row row-profile-red">
                <div class="col-4">
                    <h4 class="profile-red-info">Atrašanas vieta:</h4>
                </div>
                <div class="col-4">
                    <form><select class="form-control"><optgroup label="This is a group"><option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></form>
                </div>
            </div>
            <div class="row row-profile-red">
                <div class="col-4">
                    <h4 class="profile-red-info">Cilvēku daudzums:</h4>
                </div>
                <div class="col-4">
                    <form><input class="form-control" type="email"></form>
                </div>
            </div>
            <div class="row row-profile-red">
                <div class="col-4">
                    <h4 class="profile-red-info">Kontaktinformācija:</h4>
                </div>
                <div class="col-4">
                    <form><input class="form-control" type="email"></form>
                </div>
            </div>
            <div class="row row-profile-red">
                <div class="col-4">
                    <h4 class="profile-red-info">Apraksts:</h4>
                </div>
                <div class="col-8">
                    <form><input class="form-control" type="text" id="papild-form"></form>
                </div>
            </div>
            <div class="row row-profile-red">
                <div class="col-4">
                    <h4 class="profile-red-info">Papildpakalpojumi:</h4>
                </div>
                <div class="col-8">
                    <form><input class="form-control" type="text" id="apraksts-form"></form>
                </div>
            </div>
            <div class="row row-profile-red">
                <div class="col-4">
                    <h4 class="profile-red-info">Profila bilde:</h4>
                </div>
                <div class="col-4">
                    <form><input type="file"></form>
                </div>
            </div>
            <div class="row row-profile-red">
                <div class="col-4 dzest-pakalpojumu"><button class="btn btn-primary btn-block" type="submit">Dzēst profilu</button></div>
                <div class="col-4 dzest-pakalpojumu"><button class="btn btn-primary btn-block" type="submit">Saglabāt</button></div>
                <div class="col-4 dzest-pakalpojumu"><button class="btn btn-primary btn-block" type="submit">Atcelt</button></div>
            </div>
        </div>
    </div>
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