<x-layout>

    <!-- sezione movies -->

    <div class="container-fluid movies">
        <div class="row h-100 justify-content-center">
            <div class="row">
                <h2 class="display-5 text-white text-center text-color">Dettaglio del film {{$movie['title']}}</h2>
            </div>
            <div class="col-12 col-md-6 text-white d-flex flex-column justify-content-center align-items-center">
                <h3>Titolo: {{$movie['title']}}</h3>
                <h4 class="text-muted">Regista: {{$movie['director']}}</h4>
                <p>Genere: {{$movie['genres']}}</p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <img src="{{$movie['img']}}" class="card-img-top cardImg" alt="poster di " {{$movie['title']}}"">
            </div>
        </div>
    </div>

    <!-- fine sezione movies -->

</x-layout>