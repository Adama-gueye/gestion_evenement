@include('header')
<div class="container mt-5">
    <h1>BIENVENUE SUR LA PAGE DE CREATION D'ASSOCIATION {{$user->nom}}</h1>
    <h2>Formulaire Événement</h2>
    <form>
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" placeholder="Libellé de l'événement">
        </div>
        <div class="mb-3">
            <label for="date_limite" class="form-label">Date Limite d'Inscription</label>
            <input type="date" class="form-control" id="date_limite">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" placeholder="Description de l'événement"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image Mise en Avant</label>
            <input type="file" class="form-control" id="image">
        </div>
        <div class="mb-3">
            <label for="date_evenement" class="form-label">Date de l'Événement</label>
            <input type="date" class="form-control" id="date_evenement">
        </div>
        <div class="mb-3">
            <label for="etat" class="form-label">État</label>
            <select class="form-control" id="etat">
                <option value="cloturer">Clôturé</option>
                <option value="pas_cloturer">Pas Clôturé</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter Événement</button>
    </form>
</div>

<div class="container mt-5">
    <h2>Tableau Événements</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Libellé</th>
            <th scope="col">Date Limite</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Date Événement</th>
            <th scope="col">État</th>
            <th scope="col">Organisateur</th>
        </tr>
        </thead>
        <tbody>
        <!-- Vous devrez remplir cette partie avec les données de votre base de données -->
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
