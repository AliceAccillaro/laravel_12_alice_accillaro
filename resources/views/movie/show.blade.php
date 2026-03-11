<x-layout>
    <div class="container-fluid movies">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-white text-color text-center">
                <h2>{{ $movie->title }}</h2>
                <h3>Regista: {{ $movie->director }}</h3>
                <p>{{ $movie->plot }}</p>
                <ul>
                @forelse ($movie->genres as $genre)
                   <li>{{ $genre->name }}</li>
                @empty
                @endforelse
                </ul>
            <div class="col-12 col-md-6">
                <img src="{{ Storage::url($movie->img) }}"
                    class="img-fluid"
                    alt="poster di {{ $movie->title }}">
            </div>
            @auth
                @if ($movie->user_id == Auth::id())
                    <div class="row justify-content-end">
                        <form action="{{route('movie.delete', compact('movie'))}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina il film</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
</x-layout>