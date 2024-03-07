<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Categorie;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::paginate(5);
        $categories = Categorie::all();
        return view('index', compact('films', 'categories'));
    }

    public function index2($nom)
    {
        $films = Categorie::where('nom', $nom)->first()->films()->paginate(5);
        $categories = Categorie::all();
        return view('index', compact('films', 'categories', 'nom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // Changed FilmRequest to Request because it doesn't work
    public function store(Request $filmRequest)
    {
        Film::create($filmRequest->all());
        //return ($filmRequest);
        return redirect()->route("films.index")->with('info', 'Le film a été crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $categories = Categorie::all();
        return view('edit', compact('film', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */

    // Changed FilmRequest to Request because it didn't work
    public function update(Request $filmRequest, Film $film)
    {
        $film->update($filmRequest->all());
        return redirect()->route('films.index')->with('info', 'le film a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return back()->with('info', 'Le film a été supprimé de la base de données.');
    }

    public function find(Request $request)
    {
        $search = $request->search;
        $films = Film::where('titre', 'like', "%$search%")->paginate(5);
        $categories = Categorie::all();
        return view('index', compact('films', 'categories'));
    }
}
