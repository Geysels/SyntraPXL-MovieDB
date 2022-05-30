<x-app-layout>
    <div class="row py-12">
        <div class="col col-6 offset-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class='text-left'>Search for a movie by name.</h1>
                 <form action="/movies" method="POST" class="form-floating mb-3 mt-1">
                    @csrf
                    <input type="title" class="form-control mb-3 rounded" name="title" id="title" placeholder="empty">
                    <label for="title"> Type here the name of the movie</label>
                    <button class="btn btn-outline-dark btn-lg">Find movies</button>
                 </form>
                 @if(isset($movies))
                    <div class="row p-0 m-0 py-2">
                        <?php $i=0; ?>
                        @foreach($movies as $movie)
                            <div class="col p-0 p-2">
                                <div class="card text-white">
                                    <img src="{{$movie->Poster}}" class="card-img" alt="poster of {{$movie->Title}}">
                                    <div class="card-img-overlay" onclick="window.location.href ='/movies/{{$movie->imdbID}}'">
                                        <h5 class="card-title">{{$movie->Title}}</h5>
                                        <p class="card-text">{{$movie->Year}}</p>
                                    </div>
                                </div>
                            </div>
                            @if($i==4)
                                </div>
                                <div class="row p-0 m-0">
                            @endif
                            <?php $i++;?>
                        @endforeach
                    </div>
                    <form action="/movies" method="POST" class="row p-0 m-0 py-2 mx-auto">
                        @csrf
                        <input type="hidden" name="oldTitle" value="{{$oldTitle}}">
                        <input type="hidden" id="page" name="pageNumber" value="{{$currentpage}}">
                        <ul class="pagination justify-content-center">
                          <li class="page-item"><a class="page-link bg-light text-dark" onclick="document.getElementById('page').value = 1 ;this.parentElement.parentElement.parentElement.submit();">First</a></li>
                          @if($currentpage>=3)
                            <li class="page-item"><div class="page-link bg-light text-dark" onclick="document.getElementById('page').value = '{{$currentpage-2}}' ;this.parentElement.parentElement.parentElement.submit();" >{{$currentpage-2}}</div></li>
                          @endif
                          @if($currentpage>=2)
                            <li class="page-item"><a class="page-link bg-light text-dark" onclick="document.getElementById('page').value = '{{$currentpage-1}}' ;this.parentElement.parentElement.parentElement.submit();">{{$currentpage-1}}</a></li>
                          @endif
                          <li class="page-item"><a class="page-link bg-dark text-light">{{$currentpage}}</a></li>
                          @if($currentpage+1<=$maxpages)
                            <li class="page-item"><a class="page-link bg-light text-dark" onclick="document.getElementById('page').value = '{{$currentpage+1}}' ;this.parentElement.parentElement.parentElement.submit();">{{$currentpage+1}}</a></li>
                          @endif
                          @if($currentpage+2<=$maxpages)
                            <li class="page-item"><a class="page-link bg-light text-dark" onclick="document.getElementById('page').value = '{{$currentpage+2}}' ;this.parentElement.parentElement.parentElement.submit();">{{$currentpage+2}}</a></li>
                          @endif
                          <li class="page-item"><a class="page-link bg-light text-dark" onclick="document.getElementById('page').value = {{$maxpages}} ;this.parentElement.parentElement.parentElement.submit();">Last</a></li>
                        </ul>
                    </form>
                 @endif
             </div>
        </div>
    </div>
</x-app-layout>
