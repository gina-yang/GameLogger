<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function search(Request $request){
        $params = $request->input('name');
        $results = DB::table('games')
            ->where('games.name', 'LIKE', '%'.$params.'%')
            ->get();

        return view('search', [
            'results' => $results
        ]);
    }


}
