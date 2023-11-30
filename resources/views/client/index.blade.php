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
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="alert alert-danger">SE DÉCONNECTER</button>
                </form>
                <div class="block-heading">
                    <h2 class="text-info">Bienvenue {{ $user->nom }} {{ $user->prenom }}</h2>
                </div>

                <div class="row">
                @foreach($evenements as $evenement)
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card text-center clean-card position-relative">
                            <img class="card-img-top w-100 d-block" src="{{url('public/images/'.$evenement->image) }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{$evenement->libelle}}</h5>
                                <p class="card-text">{{$evenement->description}}</p>
                                <a href="{{ route('reservation.index', ['id' => $evenement->id]) }}" class="btn btn-success">Réserver</a>
                            </div>
                        </div>
                    </div>
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
