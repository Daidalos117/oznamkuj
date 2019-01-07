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
	    $input = Input::all();
	    if(!empty($input['_token']) ) {
		    $schools = Skola::getSchoolsFilter($input)->paginate(15);
	    } else {
		    $schools = Skola::search($input["dotaz"])->paginate(15);
	    }
        //dd($schools);
        $schoolController = new SchoolsController();
        return view("search.index", ["schools" => $schools, 'query' => $input["dotaz"],
            'filters' => $schoolController->getFilters()]);
    }
}
