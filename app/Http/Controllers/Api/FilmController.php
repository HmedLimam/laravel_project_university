<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Categorie;
use App\Http\Resources\Film as FilmResource;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return $films;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $film = Film::create($request->all());
        return $film;
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return new FilmResource($film);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $film = Film::findOrFail($id);
        $film->update($request->all());
        return $film;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::findOrFail($id);
        $film->delete();
        return "Film deleted!";
    }
}
