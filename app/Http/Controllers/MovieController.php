<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Favorites;

class MovieController extends Controller
{
    public function index(){
        return view('movies.index');
    }

    public function show(Request $request,$id){
        $movie = json_decode(Http::get('https://www.omdbapi.com/?i='.$id.'&apikey='.env('API_KEY')));
        $favorite = Favorites::where('user_id','=',auth()->user()->id)->where('movie_id','=',$id)->first();
        $favorite = isset($favorite)?$favorite = true: $favorite = false;
        return view('movies.show',['movie' => $movie,'favorite'=>$favorite]);
    }

    public function random(){
        $movie = json_decode(Http::get('https://www.omdbapi.com/?i=tt'.rand(1000000,2999998).'&apikey='.env('API_KEY')));
        return view('movies.show',['movie' => $movie]);
    }

    public function search(Request $request){
        isset($request->pageNumber)?$pagenumber = intval($request->pageNumber):$pagenumber = 1;
        isset($request->oldTitle)?$request->title = $request->oldTitle:$request->title = $request->title;
        $results = intval(json_decode(Http::get('https://www.omdbapi.com/?s='.$request->title.'&apikey='.env('API_KEY')))->totalResults);
        $max= ceil($results/10);
        if($pagenumber>$max){
            $movies = json_decode(Http::get('https://www.omdbapi.com/?s='.$request->title.'&apikey='.env('API_KEY').'&page='.$max));
        }else{
            $movies = json_decode(Http::get('https://www.omdbapi.com/?s='.$request->title.'&apikey='.env('API_KEY').'&page='.$pagenumber));
        }
        return view('movies.index',['movies' => $movies->Search,'results'=> $movies->totalResults,'currentpage'=>$pagenumber,'maxpages'=>$max,'oldTitle'=> $request->title]);
    }

}
