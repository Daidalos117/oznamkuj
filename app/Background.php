<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{

    static function getPattern() {
        $dir = 'pattern/';
        $patterns = array(
            'lined_paper.png',
            'school.png',
            'sports.png',
            'square_bg_@2X.png',
            'wood_pattern.png'
        );
        return $dir . $patterns[ rand(0, count($patterns) - 1) ];
    }
}
