<div class="card mb-3" style="width: 18rem;">
    @if ($movie->img)
    <img src="{{ asset('storage/' . $movie->img) }}"
    alt="Movie poster for {{ $movie->title }}"
    class="card-img-top cardImg img-fluid">
    @else
    <img src="https://picsum.photos/200/300"
        class="card-img-top cardImg img-fluid"
        alt="placeholder">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{$movie->title}}</h5>
        <h5 class="card-title muted">{{$movie->director}}</h5>
        <p class="card-text">{{$movie->genres}}</p>
        <a href="{{ route('movie.detail', $movie) }}" class="btn btn-primary">Leggi di più</a>
        <a href="{{ route('movie.edit', $movie) }}" class="btn btn-primary">Modifica il film</a>
    </div>
</div>