<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulaire</title>
</head>
<body>

<div class="container mt-5">
    <h2>Veuillez passer votre reservation {{$user->nom}}</h2>
    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="reference">Référence:</label>
            <input type="text" class="form-control" id="reference" name="reference" required>
        </div>

        <div class="form-group">
            <label for="nbre">Nombre:</label>
            <input type="number" class="form-control" id="nbre" name="nbre" required>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="evenement_id" name="evenement_id" hidden value="{{$evenement->id}}">
        </div>

        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
