<x-layout>

    <!-- header -->
    <header>
        <div class="container-fluid header">
            <div class="row h-100 justify-content-around align-items-center">
                <div class="col-6">
                    <h2 class="text-light text-color text-center">Chi siamo</h2>
                    <p class="text-white text-color">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut fugiat, deserunt quam numquam asperiores odio laborum ipsum officia ab ducimus velit dolor voluptatum quisquam, consectetur maxime. Excepturi sint recusandae doloremque.
                    </p>
                </div>
                <div class="col-6">
                    <img src="/media/team.jpg" alt="foto del team" class="shadow rounded fotoTeam">
                </div>

            </div>
        </div>
        </div>
        <!-- fine header -->
        <!-- section team members -->
        <section>
            <div class="container userHeight">
                <div class="row h-100 justify-content-around align-items-center">
                    @foreach($users as $user)
                    <div class="col-12 col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user['name'] }} {{ $user['surname'] }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $user['role'] }}</h6>
                                <a href="{{ route('aboutUsDetail', ['nome' => $user['name']]) }}" class="card-link">Leggi di più</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

</x-layout>