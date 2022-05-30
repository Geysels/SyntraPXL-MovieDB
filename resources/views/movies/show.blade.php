<x-app-layout>
    <div class="row py-12">
        <div class="col col-6 p-0 offset-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ isset($movie->Poster)?$movie->Poster:null }}" class="img-fluid rounded-start" alt="poster of {{ isset($movie->Title)?$movie->Title:"unknown" }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100">
                                <form method="POST" action="/favorites/{{$movie->imdbID}}">
                                    @csrf
                                    <input type="hidden" name="uuid" value="{{auth()->user()->uuid}}">
                                    @auth
                                    @if(!$favorite)
                                        <button class="btn btn-success mb-2"><i class="fa-solid fa-heart me-1"></i>Add to favorites</button>
                                    @endif
                                </form>
                                <form method="POST" action="/favorites/{{$movie->imdbID}}/delete">
                                    @csrf
                                    <input type="hidden" name="uuid" value="{{auth()->user()->uuid}}">
                                    @if($favorite)
                                        <button class="btn btn-danger mb-2"><i class="fa-solid fa-heart-crack me-1"></i>Remove from favorites</button>
                                    @endif
                                </form>
                                @endauth
                                <h5 class="card-title">{{ isset($movie->Title)?$movie->Title:null }}</h5>
                                <p class="card-text">{{ isset($movie->Plot)?$movie->Plot:null }}</p>
                                <p class="card-text" style="position:absolute;bottom:1vh;"><small class="text-muted">Released on {{ isset($movie->Released)?$movie->Released:null }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
