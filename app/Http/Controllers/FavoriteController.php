<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Favorites;
use App\Models\User;

class FavoriteController extends Controller
{
    public function index(){
        $userid = auth()->user()->id;
        $favorites = Favorites::where('user_id','=',$userid)->get();
        $movies = [];
        foreach($favorites as $favorite){
            $movie = json_decode(Http::get('https://www.omdbapi.com/?i='.$favorite->movie_id.'&apikey='.env('API_KEY')));
            array_push($movies, $movie);
        }
        return view('favorites.index',['favorites'=>$movies]);
    }

    public function addToFavorites(Request $request,$movieId){
        $userid = User::where('uuid','=',$request->uuid)->first()->id;
        $favorite = Favorites::where('user_id','=',$userid)->where('movie_id','=',$movieId)->first();
        if(!isset($favorite))
        {
            $favorite = Favorites::create([
                'user_id'=> $userid,
                'movie_id'=> $movieId,
            ]);
        }
        return redirect()->back();
    }

    public function removeFromFavorites(Request $request,$movieId){
        $userid = User::where('uuid','=',$request->uuid)->first()->id;
        $favorite = Favorites::where('user_id','=',$userid)->where('movie_id','=',$movieId)->first();
        if(isset($favorite))
        {
            $favorite->delete();
        }
        return redirect()->back();
    }
}
