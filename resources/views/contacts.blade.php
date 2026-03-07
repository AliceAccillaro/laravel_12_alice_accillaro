<x-layout>

    <!-- header -->
    <header>
        <div class="container-fluid movies">
            <div class="row h-100 justify-content-around align-items-center ">
                <div class="col-12 h-25 justify-content-center align-items-center">
                    <h2 class="text-color text-white display-5">Contatti</h2>
                </div>

                <div class="col-md-3 text-center box d-flex flex-column justify-content-center align-items-center text-white">
                    <div class="row">
                        <div class="col-12">
                            <i class="icon bi bi-whatsapp"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Scrivi su whatsapp</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 text-center box d-flex flex-column justify-content-center align-items-center text-white">
                    <div class="row">
                        <div class="col-12">
                            <i class="icon bi bi-instagram"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Seguici su instagram</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 text-center box d-flex flex-column justify-content-center align-items-center text-white">
                    <div class="row">
                        <div class="col-12">
                            <i class="icon bi bi-facebook"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Seguici su facebook</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row h-100 justify-content-center align-items-center">
                <h2 class="text-white display-4 text-center text-color">...o scrivici una mail:</h2>
                <div class="col-12 col-md-8 text-white text-color">
                    <form method="post" action="{{route('contactUs')}}">
                        @csrf
                         <div class="mb-3">
                            <label for="user" class="form-label">Inserisci il tuo nome:</label>
                            <input type="text" name="user" class="form-control" id="user" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Inserisci la tua mail</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Scrivi qui il tuo messaggio:  </label>
                            <textarea class="form-control" name="message" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </header>


</x-layout>