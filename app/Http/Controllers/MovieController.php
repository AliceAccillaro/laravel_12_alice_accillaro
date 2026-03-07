<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieEditRequest;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update']);
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
        return view('movie.create');
    }

    
    public function store(MovieRequest $request)
    {
        $data = $request->validated();

        
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('images', 'public');
        } else {
            $data['img'] = null;
        }

        Movie::create($data);

        return redirect()->route('homepage')
            ->with('successMessage', 'Hai correttamente inserito il tuo film!');
    }

    
    public function edit(Movie $movie)
    {
        return view('movie.edit', compact('movie'));
    }

    
    public function update(MovieEditRequest $request, Movie $movie)
    {
        $data = $request->validated();

        
        if ($request->hasFile('img')) {
            $request->validate([
                'img' => 'image',
            ], [
                'img.image' => 'Il file deve essere di tipo immagine',
            ]);
            $data['img'] = $request->file('img')->store('images', 'public');
        }

        $movie->update($data);

        return redirect()->route('homepage')
            ->with('successMessage', 'Hai correttamente modificato il tuo film!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('homepage')
            ->with('successMessage', 'Hai correttamente eliminato il tuo film!');
    }
}