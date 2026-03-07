<x-layout>
<div class="container-fluid movies">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 text-white text-color text-center">
            <h2>{{ $movie->title }}</h2>
            <h3>Regista: {{ $movie->director }}</h3>
            <p>{{ $movie->plot }}</p>
        </div>
        <div class="col-12 col-md-6">
            @if ($movie->img)
                <img src="{{ asset('storage/'.$movie->img) }}" 
                     class="img-fluid" 
                     alt="poster di {{ $movie->title }}">
            @else
                <img src="https://picsum.photos/200/300" 
                     class="img-fluid" 
                     alt="placeholder">
            @endif
        </div>
        <div class="row">
            <form action="{{route('movie.delete', compact('movie'))}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina il film</button>
            </form>
        </div>
    </div>
</x-layout>