@include('header')
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="alert alert-danger">SE DÉCONNECTER</button>
</form>
<div class="container mt-5">
    <h1 style="text-align:center">BIENVENUE {{$user->nom}}</h1>
</div>

<div class="container mt-5">
    <h2>Liste de vos Événements</h2>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#AjoutEvenement">
  Ajout Evénement
</button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Libellé</th>
            <th scope="col">Date Limite</th>
            <th scope="col">Description</th>
            <th scope="col">Date Événement</th>
            <th scope="col">État</th>
            <!-- <th scope="col">Organisateur</th> -->
        </tr>
        </thead>
        <tbody>
            @foreach($evenements as $evenement)
                @if($evenement->user_id === $user->id)
                    <tr>
                        <td><img src="{{ url('public/images/'.$evenement->image) }}" width="70" height="70" class="img img-responsive" alt=""></td>
                        <td>{{$evenement->libelle}}</td>
                        <td>{{$evenement->date_limite_inscription}}</td>
                        <td>
                            @if(strlen($evenement->description) > 7)
                                {{ Illuminate\Support\Str::limit($evenement->description, 10, '...') }}
                            @else
                                {{ $evenement->description }}
                            @endif
                        </td>
                        <td>{{$evenement->date_evenement}}</td>
                        <td>{{$evenement->etat}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('evenement.show', $evenement->id) }}" class="btn btn-outline-primary">✍🏾</a>
                            <form method="POST" action="{{ route('evenement.destroy',$evenement->id)}}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-outline-primary" onclick="return confirmDelete()" title="Supprimer Evenement">✖</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<!-- Ajout Evenement -->
<div class="modal fade" id="AjoutEvenement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout Evenement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card" style="box-shadow:2px 2px 20px blue,2px 2px 20px grey ;">
        <div class="card-header" style="background: rgb(2,36,36); color:white;text-align:center;">Ajout Evenement</div>
            <div class="card-body">
            <h2>Formulaire Événement</h2>
                <form method="post" action="{{route('evenement.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="libelle" class="form-label">Libellé</label>
                        <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Libellé de l'événement">
                    </div>
                    <div class="mb-3">
                        <label for="date_limite" class="form-label">Date Limite d'Inscription</label>
                        <input type="date" class="form-control" id="date_limite" name="date_limite_inscription">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description de l'événement"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Mise en Avant</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="date_evenement" class="form-label">Date de l'Événement</label>
                        <input type="date" class="form-control" id="date_evenement" name="date_evenement">
                    </div>
                    <div class="mb-3">
                        <label for="etat" class="form-label">État</label>
                        <select class="form-control" id="etat" name="etat">
                            <option value="cloturer">Clôturé</option>
                            <option value="pas cloturer">Pas Clôturé</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter Événement</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
    <h2>Liste de vos Reservation</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Reference</th>
                <th scope="col">Nombre de Place</th>
                <th scope="col">Client</th>
                <th scope="col">Etat</th>
                <th scope="col">ChangeEtat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                @if($reservation->evenement->user_id === $user->id)
                    <tr>
                        <td>{{$reservation->reference}}</td>
                        <td>{{$reservation->nbre}}</td>
                        <td>{{$reservation->user->nom}}</td>
                        <td>{{$reservation->etat}}</td>
                        <td>
                            <form class="change-role-form" action="{{ route('reservation.changeEtat', $reservation->id) }}" method="post">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-outline-primary">Changer Role</button>
                            </form>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="" class="btn btn-outline-primary">✍🏾</a>
                            <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-outline-primary" onclick="return confirmDelete()" title="Supprimer Evenement">✖</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function confirmDelete() {
        if (!confirm("Etes Vous sûr de vouloir supprimer cette Enregistrement?")) {
            return false;
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
