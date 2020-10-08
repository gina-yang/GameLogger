<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class ListController extends Controller
{
    public function index(){
        $user = Auth::user();
        $lists = DB::table('lists')
            ->select('lists.listId as ListId', 'lists.name as ListName')
            ->where('lists.id', '=', $user->id)
            ->get();
        return view('lists.index', [
            'user' => $user,
            'lists' => $lists
        ]);
    }

    public function show($id){
        $list = DB::table('lists')
            ->where('listId', '=', $id)
            ->first();
        
        $games = DB::table('games')
            ->select(
                'games.gameId as GameId',
                'games.name as GameName',
                'games.developer as GameDeveloper',
                'genres.name as GenreName',
                'consoles.name as ConsoleName'
            )
            ->where('list_game.listId', '=', $id)
            ->join('list_game', 'games.gameId', '=', 'list_game.gameId')
            ->join('genres', 'games.genreID', '=', 'genres.genreId')
            ->join('consoles', 'consoles.consoleId', '=', 'games.consoleId')
            ->get();
        return view('lists.show', [
            'list' => $list,
            'games' => $games,
            'user' => Auth::user()
        ]);
    }

    public function create(){
        $user = Auth::user();
        return view('lists.create', [
            'user' => $user
        ]);
    }

    public function createstore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'description' => 'required|max:100'
        ]);
        
        $user = Auth::user();
        DB::table('lists')->insert([
            'name' => $request->input('name'),
            'id' => $user->id,
            'description' => $request->input('description')
        ]);

        return redirect()->route('lists', ['username' => $user->username])->with(
            'success',
            "Success! Created list \"{$request->input('name')}\""
        );

    }

    public function edit($id){
        return view('lists.edit', [
            'list' => DB::table('lists')
                ->where('lists.listId', '=', $id)
                ->first(),
            'user' => Auth::user()
        ]);
    }

    public function editstore(Request $request){
        $validatedData = $request->validate([
            'description' => 'required|max:100'
        ]);
        $listname = DB::table('lists')
            ->where('listId', '=', $request->input('listId'))
            ->first()
            ->name;

        DB::table('lists')
            ->where('listId', '=', $request->input('listId'))
            ->update(['description' => $request->input('description')]);

        return redirect()
            ->route('speclist', ['id' => $request->input('listId')])
            ->with(
                'success',
                "Success! Updated {$listname}'s description."
            );
    }

    public function delete($id){
        $user = Auth::user();
        $list = DB::table('lists')
            ->where('listId', '=', $id)
            ->first();
        return view('lists.delete', [
            'list' => $list,
            'user' => $user
        ]);
    }

    public function destroy(Request $request){
        $user = Auth::user();
        $deleted = DB::table('lists')->where('listId', '=', $request->input('listId'))->first();
        DB::table('list_game')->where('listId', '=', $request->input('listId'))->delete();
        DB::table('lists')->where('listId', '=', $request->input('listId'))->delete();

        return redirect()
            ->route('lists', ['username' => $user->username])
            ->with(
                'success',
                "Success! Deleted \"{$deleted->name}\""
            );
    }
}
