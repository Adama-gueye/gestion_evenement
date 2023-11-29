@include('header')

<x-guest-layout>

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
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" class="block mt-1 w-full bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0" type="role" name="role" :value="old('role')" autocomplete="role">
                <option value="">---Vous inscivez en tant que qui ?</option>
                <option value="association">Association</option>
                <option value="client">Client</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <div class="mt-4 client-fields">
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" autofocus autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                         autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 client-fields">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" autocomplete="telephone" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <div class="mt-4 association-fields">
            <x-input-label for="slogan" :value="__('Slogan')" />
            <x-text-input id="slogan" class="block mt-1 w-full" type="text" name="slogan" :value="old('slogan')" autofocus autocomplete="slogan" />
            <x-input-error :messages="$errors->get('slogan')" class="mt-2" />
        </div>

        <div class="mt-4 association-fields">
            <x-input-label for="logo" :value="__('Logo')" />
            <input type="text" class="block mt-1 w-full" id="logo" name="logo" :value="old('logo')" autofocus autocomplete="logo" />
            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="btn btn-secondary me-3" href="{{ route('login') }}">Connexion</a>
            <x-primary-button class="ms-4">
                {{ __('Inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    $(document).ready(function() {
        $('.client-fields').hide();
        $('.association-fields').hide();
        $('#role').change(function() {
            $('.client-fields').hide();
            $('.association-fields').hide();
            var selectedRole = $(this).val();
            if (selectedRole === 'client') {
                $('.client-fields').show();
            } else if (selectedRole === 'association') {
                $('.association-fields').show();
            }
        });
    });
</script>

</body>
</html>
