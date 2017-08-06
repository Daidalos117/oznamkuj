<?php

namespace App\Http\Controllers;

use App\Sidebar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Skola;
use App\Rating;
use App\Comment;
use App\TypySkol;
use Input;

class SchoolsController extends Controller
{

    public function index()
    {
        $input = Input::all();
        if(!empty($input['_token']) ) {

            $schools = Skola::getSchoolsFilter($input)->paginate(15);
        } else {
            $schools = Skola::paginate(15);
        }

        return view("schools.index", [
            "schools" => $schools,
            'filters' => $this->getFilters(),
            'filtersSelected' => $input,
            'sidebar' =>    Sidebar::getSidebar(),
            'breadCumbersTarget' => 'schools'
        ]);
    }
    public function getFilters() {
        $filter['type'] = TypySkol::all();
        return $filter;
    }


    public function show($skolaUrl)
    {

        $skola = Skola::where('url', $skolaUrl)->first();
       //dd($skola->adresy[1]->typJmeno());
       //dd(Rating::userRating($skola->id));

        return view('schools.show', [
            "skola" => $skola,
            'noSidebar' => 1,
            'userRating' => Rating::userRating($skola->id),
            'rating' => Rating::schoolRating($skola->id),
            'comments' => Comment::schoolComments($skola->id),
            'breadCumbersTarget' => 'school',
            'breadCumbersTargetParams' => $skola
        ]);
    }


}
