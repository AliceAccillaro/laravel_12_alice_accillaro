<x-layout>

    <div class="container-fluid movies">
        <div class="row">
            <h2 class="text-color text-white text-center">Inserisci il tuo film preferito:</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('movie.update', $movie) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label text-white">Titolo:</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ old('title', $movie->title) }}">
                    </div>

                    <div class="mb-3">
                        <label for="director" class="form-label text-white">Regista:</label>
                        <input type="text" name="director" class="form-control" id="director"
                            value="{{ old('director', $movie->director) }}">
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label text-white">Anno di uscita:</label>
                        <input type="text" name="year" class="form-control" id="year"
                            value="{{ old('year', $movie->year) }}">
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label text-white">Inserisci una locandina:</label>
                        <input type="file" name="img" class="form-control" id="img">
                    </div>

                    <div class="mb-3">
                        <label for="plot" class="form-label text-white">Trama:</label>
                        <textarea name="plot" class="form-control" id="plot" cols="30" rows="10">{{ old('plot', $movie->plot) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Salva modifiche</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>