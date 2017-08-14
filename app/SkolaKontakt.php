<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkolaKontakt extends Model
{
    public $table = "skoly_kontakty";
    
    public function user()
    {
        return $this->belongsTo('App\Skola', 'id');
    }
}
