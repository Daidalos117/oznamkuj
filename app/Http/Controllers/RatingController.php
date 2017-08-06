<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use App\Rating;

class RatingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        //dd($request->all());
    
        $this->validate($request,[
           'rating' => 'required|numeric',
           'school_id' => 'required|numeric'
        ]);

        //Comment::create($request->all());
        $schoolId = $request->input('school_id');
        $rating = $request->input('rating');
        $data = [
            'rating' => $rating,
            'user_id' => Auth::id(),
            'school_id' => $schoolId
        ];
        
        $ratingExists = Rating::userRating($schoolId);
        if($ratingExists) {
            $ratingObj = Rating::find($ratingExists->id);
            $ratingObj->rating = $rating;
            $ratingObj->save();
        }else {
            Rating::create($data);
        }
        $newSchoolRating = Rating::schoolRating($schoolId);
        return json_encode(['rating' => $newSchoolRating]);
        
    }
}
