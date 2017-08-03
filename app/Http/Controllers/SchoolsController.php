<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Skola;

class SchoolsController extends Controller
{

    public function index()
    {
        $schools = Skola::all();
        return view("schools.index", ["schools" => $schools]);
    }


    public function show(Skola $skola)
    {
       // $school = Skola::find($school);
       //dd($skola->adresy[1]->typJmeno());
        return view('schools.show', ["skola" => $skola]);
    }
}
