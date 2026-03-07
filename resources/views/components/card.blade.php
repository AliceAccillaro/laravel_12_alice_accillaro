<div class="card mb-3" style="width: 18rem;">
    <img src="{{ Storage::url($movie->img) }}"
    alt="Poster di '{{ $movie->title }}'"
    class="card-img-top cardImg img-fluid">
    <div class="card-body">
        <h5 class="card-title">Titolo: {{$movie->title}}</h5>
        <h5 class="card-title muted">Regista: {{$movie->director}}</h5>
        <p class="card-text">Anno: {{$movie->year}}</p>
        <p>Creato da: {{$movie->user->name}}</p>
        <a href="{{ route('movie.show', compact('movie')) }}" class="btn btn-primary">Leggi di più</a>
        @auth      
        @if ($movie->user_id == Auth::id())
        <a href="{{ route('movie.edit', compact('movie')) }}" class="btn btn-primary">Modifica il film</a>
        @endif
        @endauth
    </div>
</div>