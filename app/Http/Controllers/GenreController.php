<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GenreController extends Controller
{
    public function index(){
        $genres = DB::table('genres')
            ->select('genreId as GenreId', 'name as GenreName', 'description as GenreDesc')
            ->orderBy('name')
            ->get();
        return view('genres.index', [
            'genres' => $genres
        ]);
    }

    public function show($id){
        $games = DB::table('games')
            ->select('games.gameId as GameId', 'games.name as GameName', 'games.developer as GameDeveloper', 'consoles.name as ConsoleName', 'genres.name as GenreName')
            ->join('consoles', 'consoles.consoleId', '=', 'games.consoleId')
            ->join('genres', 'genres.genreId', '=', 'games.genreId')
            ->where('games.genreId', '=', $id)
            ->orderBy('GameName')
            ->get();
        $genre = DB::table('genres')
            ->select('name as GenreName', 'genres.description as GenreDesc')
            ->where('genreId', '=', $id)
            ->first();
        return view('genres.showgames', [
            'games' => $games,
            'genre' => $genre
        ]);
        
    }
}
