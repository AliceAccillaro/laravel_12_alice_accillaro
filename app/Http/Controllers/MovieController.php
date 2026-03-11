<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MovieEditRequest;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->except('index');
    }


    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', compact('movies'));
    }


    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }


    public function create()
    {
        $genres = Genre::all();
        return view('movie.create', compact('genres'));
    }


 public function store(MovieRequest $request)
{
    $data = $request->validated();

    $data['user_id'] = Auth::id();

    if ($request->hasFile('img')) {
        $data['img'] = $request->file('img')->store('images', 'public');
    } else {
        $data['img'] = null;
    }

    $movie = Movie::create($data);

    if ($request->genres) {
        $movie->genres()->attach($request->genres);
    }

    return redirect()->route('homepage')
        ->with('successMessage', 'Hai correttamente inserito il tuo film!');
}


    public function edit(Movie $movie)
    {
        if ($movie->user_id == Auth::user()->id) {
            return view('movie.edit', compact('movie'));
        } else {
            return redirect()->route('homepage')
                ->with('errorMessage', 'Non puoi vedere questa pagina');
        }
    }


    public function update(MovieEditRequest $request, Movie $movie)
    {
        if ($movie->user_id == Auth::id()) {

            $data = $request->validated();

            if ($request->hasFile('img')) {
                $data['img'] = $request->file('img')->store('images', 'public');
            }

            $movie->update($data);

            return redirect()->route('homepage')
                ->with('successMessage', 'Hai correttamente modificato il tuo film!');
        } else {

            return redirect()->route('homepage')
                ->with('errorMessage', 'Non puoi modificare questo film!');
        }
    }

    public function destroy(Movie $movie)
    {
        if ($movie->user_id == Auth::user()->id) {
            $movie->delete();
            return redirect()->route('homepage')
                ->with('successMessage', 'Hai correttamente eliminato il tuo film!');
        } else {
            return redirect()->route('homepage')
                ->with('errorMessage', 'Non puoi vedere questa pagina');
        }
    }
}
