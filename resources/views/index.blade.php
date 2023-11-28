<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Immobilier</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{route('acceuil')}}">Acceuil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('apropos')}}">a propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">connection</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
            </div>
        </div>
    </nav>

<body style="background-color: blanchedalmond;">
    <!-- Section principale avec image et texte descriptif -->
    <div class="jumbotron text-center">
        <img src="{{ asset('images/pexels-photo-1080696.jpeg') }}" class="img-fluid" alt="Bien immobilier">
        <h1 class="display-4">Bien immobilier à découvrir</h1>
        <p class="lead">Une résidence élégante et moderne située au cœur de la ville, offrant un confort exceptionnel et des équipements de luxe. Cette propriété unique combine un design contemporain avec des espaces de vie spacieux. Profitez de la tranquillité dans un environnement soigneusement conçu, idéal pour une vie urbaine sophistiquée.</p>
    </div>

    <!-- Footer existant -->
    
    
    
    
    
    
    
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">ACCUEIL</a></li>
                        <li><a href="#">A&nbsp; PROPOS</a></li>
                        <li><a href="#">CONNECTION</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                 
                    <ul></ul>
                </div>
                <div class="col-sm-3">
                    
                    <ul></ul>
                </div>
                <div class="col-sm-3">
                   
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2023 Copyright Text</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
