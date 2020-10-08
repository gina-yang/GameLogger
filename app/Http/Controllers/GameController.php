<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class GameController extends Controller
{
    public function index(){
        $games = DB::table('games')
            ->select('gameId as GameId', 'name as GameName', 'developer as GameDeveloper')
            ->orderBy('GameName')
            ->get();
        return view('games.index', [
            'games' => $games
        ]);
    }

    public function show($id){
        $game = DB::table('games')
            ->select('games.gameId as GameId', 'games.name as GameName', 'games.developer as Developer', 'genres.name as GenreName', 'consoles.name as ConsoleName')
            ->join('genres', 'genres.genreId', '=', 'games.genreId')
            ->join('consoles', 'consoles.consoleId', '=', 'games.consoleId')
            ->where('gameId', '=', $id)
            ->first();
        $lists = null;
        if( Auth::user() ){
            $lists = DB::table('lists')
                ->select('lists.listId as ListId', 'lists.name as ListName')
                ->where('lists.id', '=', Auth::user()->id)
                ->get();
        }
        return view('games.show', [
            'game' => $game,
            'lists' => $lists
        ]);
    }

    public function addgame(){
        $genres = DB::table('genres')->orderBy('name')->get();
        $consoles = DB::table('consoles')->orderBy('name')->get();
        return view('games.addgame', [
            'genres' => $genres,
            'consoles' => $consoles
        ]);
    }

    public function addgamestore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'developer' => 'required|max:60',
            'genre' => 'required|exists:genres,genreId',
            'console' => 'required|exists:consoles,consoleId'
        ]);

        DB::table('games')->insert([
            'name' => $request->input('name'),
            'developer' => $request->input('developer'),
            'genreId' => $request->input('genre'),
            'consoleId' => $request->input('console')
        ]);
        
        return redirect()->route('games')->with(
            'success',
            "Success! Added \"{$request->input('name')}\""
        );
    }

    public function addtoliststore(Request $request){
        $validatedData = $request->validate([
            'list' => 'required|exists:lists,listId'
        ]);

        DB::table('list_game')->insert([
            'gameId' => $request->input('gameId'),
            'listId' => $request->input('list')
        ]);

        $game = DB::table('games')
            ->where('gameId', '=', $request->input('gameId'))
            ->first();
        $list = DB::table('lists')
            ->where('listId', '=', $request->input('list'))
            ->first();

        return redirect()->back()->with(
            'success',
            "Success! Added \"{$game->name}\" to \"{$list->name}\""
        );
    }
}
