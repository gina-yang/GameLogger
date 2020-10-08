<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ConsoleController extends Controller
{
    public function index(){
        $consoles = DB::table('consoles')
            ->select('consoleId as ConsoleId', 'name as ConsoleName', 'company as ConsoleCompany')
            ->orderBy('name')
            ->get();
        return view('consoles.index', [
            'consoles' => $consoles
        ]);
    }

    public function show($id){
        $games = DB::table('games')
            ->select('games.name as GameName', 'games.developer as GameDeveloper', 'games.gameId as GameId', 'consoles.name as ConsoleName', 'genres.name as GenreName')
            ->join('consoles', 'consoles.consoleId', '=', 'games.consoleId')
            ->join('genres', 'genres.genreId', '=', 'games.genreId')
            ->where('games.consoleId', '=', $id)
            ->orderBy('GameName')
            ->get();
        $console = DB::table('consoles')
            ->select('name as ConsoleName')
            ->where('consoleId', '=', $id)
            ->first();
        return view('consoles.showgames', [
            'games' => $games,
            'console' => $console
        ]);
        
    }
}
