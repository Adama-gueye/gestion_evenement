<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>About Us - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
</head>

<body style="background-color: blanchedalmond;">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Immobilier</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{route('acceuil')}}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{route('apropos')}}" >a propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">connection</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page">
        <section class="clean-block about-us">
            <div class="container">
                <div class="row justify-content-center">

                @foreach($evenements as $evenement)
                    <div class="card alert alert-primary" style="max-width: 20rem;">
                        <div class="card text-center clean-card position-relative"><img class="card-img-top w-100 d-block" src="{{url('public/images/'.$evenement->image) }}" style="height: 200px; object-fit: cover;">
                        <a href="{{ route('reservation.index', ['id' => $evenement->id]) }}" class="btn btn-success position-absolute top-50 start-50 translate-middle" style="opacity: 0.8;">Reserver</a></div>
                            <hr>
                             <p style="text-align:center">INFOS</p>
                            <hr>
                            <div class="card-body">
                                <p class="card-text">Libelle : {{$evenement->libelle}}</p>
                                <p class="card-text">Description : {{$evenement->description}}</p>
                                <p class="card-text">Date Limite Inscription : {{$evenement->date_limite_inscription}}</p>
                                <p class="card-text">Date Evènement : {{$evenement->date_evenement}}</p>
                                <p class="card-text">Etat : {{$evenement->etat}}</p>
                                <p class="card-text">Organisateur : {{$evenement->user->nom}}</p>
                            </div>
                            <hr>
                        </div>
                    <div class="col-md-1"></div>
                @endforeach
                </div>
            </div>
        </section>
    </main>
</body>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>

</html>