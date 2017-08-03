<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkolaAdresa extends Model
{
    public $table = "skoly_adresy";
    
    /**
   * Get the post that owns the comment.
   */
  public function skola()
  {
      return $this->belongsTo('App\Skola', 'id');
  }
  
  public function typ()
  {
      return $this->hasOne('App\TypSkola', 'id', 'typy_skoly_id');
  }
  
  
  public function typJmeno() 
  {
      //dd($this->typ);
      if(isset($this->typ->typ->typ_jmeno))
        return $this->typ->typ->typ_jmeno;
      
  }
}
