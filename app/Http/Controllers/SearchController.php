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
        $schools = Skola::search($input["dotaz"])->get();
        //dd($schools);
        
        return view("schools.index", ["schools" => $schools]);
    }
}
