<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypSkola extends Model
{
    public $table = "typy_skoly";
    
    
    public function typ()
    {
        return $this->hasOne('App\TypySkol', 'id', 'typ_skoly_id');
    }
    
    public function skola()
    {
        return $this->hasOne('App\Skola', 'id', 'skola_id');
    }
}
