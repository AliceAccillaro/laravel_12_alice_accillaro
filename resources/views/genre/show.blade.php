<x-layout>
    <div class="container-fluid movies">
        <div class="row">
            <h2 class="text-white text-color display-4 py-5">Film del genere: <span>{{ $genre->name }}</h2>
        </div>
        <div class="row justify-content-center">
            @forelse ($genre->movies as $movie)
                <div class="col-12 col-md-3 d-flex justify-content-center">
                    <x-card :movie="$movie"/>
                </div>
            @empty
            <div class="col-12 col-md-8">
                <h4 class="text-color text-white text-center">Nessun film trovato per questo genere</h4>
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Crealo tu!</a>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>