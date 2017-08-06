<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Rating extends Model
{
        //fields that are ok to massive fill, white list
        protected  $fillable = ['rating', 'user_id', 'school_id'];

        //fields that are not ok to massive fill, black list
        //protected $quarded = ['user_id', 'school_id'];
        
        
            /**
        	 *  User rated this school?
        	 *
        	 * @param type
        	 * @return void
         */
        static function userRating($schoolId) {
            $dbRating = self::where("school_id", $schoolId)->where('user_id', Auth::id())->first();
            return $dbRating;
        }
        
        //rating of school
        static function schoolRating($schoolId) {
            $ratings = self::where("school_id", $schoolId);
            $ratingCount = $ratings->count();
            if($ratingCount != 0)
                $rating = $ratings->sum('rating') / $ratingCount;
            else
                $rating = 0;
            return $rating;
        }
        
        public function skola()
        {
            return $this->hasOne('App\Skola', "id", "school_id");
        }
        public function user()
        {
            return $this->hasOne('App\User', "id", "user_id");
        }

        public function getRounded() {

        }
        
        
}
