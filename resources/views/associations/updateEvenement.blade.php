@include('header')
<div class="container mt-5">
    <h1>BIENVENUE SUR LA PAGE DE MODIFICATION D'EVENEMENT {{$user->nom}}</h1>
    <h2>Formulaire Événement</h2>
    <form method="post" action="{{route('evenement.update',$evenement->id)}}" enctype="multipart/form-data">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        @csrf
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Libellé de l'événement" value="{{$evenement->libelle}}">
        </div>
        <div class="mb-3">
            <label for="date_limite" class="form-label">Date Limite d'Inscription</label>
            <input type="date" class="form-control" id="date_limite" name="date_limite_inscription" value="{{$evenement->date_limite_inscription}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description de l'événement">{{$evenement->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image Mise en Avant</label>
            <input type="file" class="form-control" id="image" name="image" value="{{$evenement->image}}">
        </div>
        <div class="mb-3">
            <label for="date_evenement" class="form-label">Date de l'Événement</label>
            <input type="date" class="form-control" id="date_evenement" name="date_evenement" value="{{$evenement->date_evenement}}">
        </div>
        <div class="mb-3">
            <label for="etat" class="form-label">État</label>
            <select class="form-control" id="etat" name="etat">
                <option value="cloturer" {{ $evenement->etat == 'cloturer' ? 'selected' : '' }}>Clôturé</option>
                <option value="pas_cloturer" {{ $evenement->etat == 'pas_cloturer' ? 'selected' : '' }}>Pas Clôturé</option>
            </select>
        </div>
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Ajouter Événement</button>
    </form>
</div>
