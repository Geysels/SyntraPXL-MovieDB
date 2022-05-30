<x-app-layout>
    <div class="row py-12">
        <div class="col col-6 p-0 offset-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="h2 text-center my-2">List of your favorite movies.</h1>
            <div class="card">
                <div class="row g-0">
                    <?php $i = 0; ?>
                    <div class="row p-0 m-0 py-2">
                            @foreach ($favorites as $movie)
                                <div class="col col-3 p-0 p-2">
                                    <div class="card text-white">
                                        <img src="{{ $movie->Poster }}" class="card-img"
                                            alt="poster of {{ $movie->Title }}">
                                        <div class="card-img-overlay"
                                            onclick="window.location.href ='/movies/{{ $movie->imdbID }}'">
                                            <h5 class="card-title">{{ $movie->Title }}</h5>
                                            <p class="card-text">{{ $movie->Year }}</p>
                                        </div>
                                    </div>
                                </div>
                                @if ($i == 4)
                                    </div>
                                    <div class="row p-0 m-0">
                                @endif
                                <?php $i++; ?>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
