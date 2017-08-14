<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Skola;
use App\Rating;
use Cache;
class Sidebar extends Model
{

    static $limit = 3;

    static function getSidebar() {
        $bestSchools = self::getBestSchool();
        $sidebar = [
            'Nejlepší školy' => [
                'class' => 'panel-primary',
                'data' => $bestSchools
            ]
        ];

        return $sidebar;
    }

    static function getBestSchool() {

        $counts = Rating::selectRaw('count(*) as "custom", school_id')->groupBy('school_id')->orderBy('custom')
            ->get();
        $sums = Rating::selectRaw('sum(rating) as "custom", school_id')->groupBy('school_id')->orderBy('custom')->get();

        $data = array();
        foreach ($counts as $key => $count) {
            $data[$count->school_id] = $sums[$key]->custom / $count->custom;
        }
        arsort($data);
        $data = array_slice($data,0,self::$limit, true);
        $newData = array();
        foreach ($data as $choolId => $rating) {
            $new = Skola::find($choolId);
            $new->rating = $rating;
            $newData[] = $new;
        }
        //dd($data);
        return $newData;
    }

}
