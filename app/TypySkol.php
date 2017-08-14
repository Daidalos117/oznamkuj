<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypySkol extends Model
{
    public $table = "typy_skol";
    
    /**
   * Get the post that owns the comment.
   */
  public function adresa()
  {
      //return $this->belongsTo('App\SkolaAdresa', 'typy_skoly_id', 'id');
  }
}
