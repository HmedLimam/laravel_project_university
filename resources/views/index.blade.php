@extends('template')
@section('contenu')
@if(session()->has('info'))
{{session('info')}}
@endif
<div class="container mt-5">
    <h1>Liste des films</h1>
    <a class="btn btn-info text-white" href="{{route('films.create')}}">Créer un Film</a><br>
    <form class="my-3 d-flex gap-2" method="get" action="{{route('films.find')}}">
        <input class="form-control flex" name="search" placeholder="search">
        <button class="btn btn-primary flex">Search</button>
    </form>
    <select onchange="window.location.href = this.value" class="form-select">
        @isset($categories)
        @foreach ($categories as $cat)
        @if(isset($nom))
        @if($cat->nom==$nom)
        <option value="{{route('films.categorie', $cat->nom)}}" selected>{{$cat->nom}}</option>
        @else
        <option value="{{route('films.categorie', $cat->nom)}}">{{$cat->nom}}</option>
        @endif
        @else
        <option value="{{route('films.categorie', $cat->nom)}}">{{$cat->nom}}</option>
        @endif
        @endforeach
        @endisset
    </select>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Catégorie</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach($films as $film)

        <tr>
            <td>
                {{$film->id}}
            </td>
            <td>
                {{$film->titre}}
            </td>
            <td>
                {{$film->categorie->nom}}
            </td>
            <td>
                <a href="{{ route('films.show', $film->id) }}" class="btn btn-primary">Détails</a>
            </td>
            <td>
                <form action="{{ route('films.destroy', $film->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
            <td>
                <a href="{{ route('films.edit', $film->id) }}" class="btn btn-outline-primary">Edit</a>
            </td>
        </tr>

        @endforeach
    </table>
    <div>
        @if($films->hasPages())
        {{$films->links()}}
        @endif
    </div>
</div>


@endsection