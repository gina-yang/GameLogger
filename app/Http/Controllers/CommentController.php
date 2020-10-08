<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function show($id){
        $game = DB::table('games')
            ->where('games.gameId' , '=', $id)
            ->first();

        $comments = Comment::where('gameId', '=', $id)->orderBy('created_at', 'desc')->get();
        $numcomments = $comments->count();
        return view('comments.show', [
            'game' => $game,
            'comments' => $comments,
            'numcomments' => $numcomments
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'comment' => 'required|min:5'
        ]);

        $newComment = new Comment();
        $newComment->body = $request->input('comment');
        $newComment->gameId = $request->input('gameId');
        $newComment->id = Auth::user()->id;
        $newComment->save(); // insert

        return redirect()->back()->with(
            'success',
            "Success! Comment added."
        );
    }
}
