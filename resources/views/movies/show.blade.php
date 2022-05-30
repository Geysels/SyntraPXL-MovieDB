<x-app-layout>
    <div class="row py-12">
        <div class="col col-6 offset-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ isset($movie->Poster)?$movie->Poster:null }}" class="img-fluid rounded-start" alt="poster of {{ isset($movie->Title)?$movie->Title:"unknown" }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            @auth
                            @if(true)
                                <button class="btn btn-success mb-2"><i class="fa-solid fa-heart me-1"></i>Add to favorites</button>
                            @endif
                            @if(true)
                                <button class="btn btn-danger mb-2"><i class="fa-solid fa-heart-crack me-1"></i>Remove from favorites</button>
                            @endif
                            @endauth
                            <h5 class="card-title">{{ isset($movie->Title)?$movie->Title:null }}</h5>
                            <p class="card-text">{{ isset($movie->Plot)?$movie->Plot:null }}</p>
                            <p class="card-text"><small class="text-muted">Released on {{ isset($movie->Released)?$movie->Released:null }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
