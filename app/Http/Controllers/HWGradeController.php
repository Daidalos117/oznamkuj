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
use App\Background;
use Input;

class HWGradeController extends Controller
{

    public function index()
    {


        return view("how_we_grade", []);
    }

}
