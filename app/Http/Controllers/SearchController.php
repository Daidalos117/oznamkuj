<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Skola;

class SearchController extends Controller
{
    //br
    
    public function index() {
        $input = Input::all();
        //dd($input);
        $schools = Skola::search($input["dotaz"])->paginate(15);
        //dd($schools);
        
        return view("search.index", ["schools" => $schools, 'query' => $input["dotaz"]]);
    }
}
