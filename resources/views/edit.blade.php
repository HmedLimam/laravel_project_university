@extends('template')
@section('titre', 'Bienvenue !')
@section('contenu')
<div class="card" style="width: 18rem">
    <div class="card-body">
        <h5 class="card-title">Ajouter</h5>
        <form method="POST" action="{{ route('films.update', ['film' => $film->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titre">Titre</label>
                <input value="{{ $film->titre }}" type="text" class="form-control" id="titre" name="titre" required>
            </div>
            <div class="form-group">
                <label for="anneesortie">Année de sortie</label>
                <input value="{{ $film->anneesortie }}" type="number" class="form-control" id="anneesortie" name="anneesortie" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $film->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="duree">Durée</label>
                <input value="{{ $film->duree }}" type="number" class="form-control" id="duree" name="duree" required>
            </div>
            <div class="form-group">
                <label for="description">Catégorie</label>
                <select class="form-control" id="categorie" name="categorie_id" required>
                    @foreach ($categories as $cat)
                    @if($cat->nom == $film->nom)
                    <option value="{{$cat->id}}" selected>{{$cat->nom}}</option>
                    @else
                    <option value="{{$cat->id}}">{{$cat->nom}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection