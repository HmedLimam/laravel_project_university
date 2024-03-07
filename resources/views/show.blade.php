@extends("template")
@section("contenu")
<div class="container">
    <h1>{{$film->titre}}</h1>
    <b>Année de sortie: </b>{{$film->anneesortie}}<br>
    <b>Description </b>{{$film->description}}<br>
    <b>Durée en min: </b>{{$film->duree}}<br>
    <b>Catégorie: </b>{{$film->categorie->nom}}<br>
</div>
@endsection