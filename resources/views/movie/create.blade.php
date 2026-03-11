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

                <form method="post" action="{{ route('movie.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label text-white">Titolo:</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp">
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label text-white">Regista:</label>
                        <input type="text" name="director" class="form-control" id="director" aria-describedby="directorHelp">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label text-white">Anno di uscita:</label>
                        <input type="text" name="year" class="form-control" id="year" aria-describedby="yearHelp">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label text-white">Iserisci una locandina:</label>
                        <input type="file" name="img" class="form-control" id="img" aria-describedby="imgHelp">
                    </div>
                    <div class="mb-3">
                        <label for="plot" class="form-label text-white">Trama:</label>
                        <textarea name="plot" class="form-control" id="plot" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        @foreach ($genres as $genre)
                                <input type="checkbox" id="{{'genreCheck' . $genre->id}}" name="genres[]" value="{{$genre->id}}">
                                <label for="{{'genreCheck' . $genre->id}}" class="text-white">{{$genre->name}}</label>
                        @endforeach
                                <p class="text-white">Non vedi la categoria corretta? <a href="{{route('genre.create')}}" class="fst-italic small text-white">Inseriscila tu</a></p>     
                    </div>


                    <button type="submit" class="btn btn-primary">Inserisci il tuo film</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>