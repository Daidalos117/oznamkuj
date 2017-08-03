<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Skola extends Model
{
    use Searchable;
    public $table = "skoly";


    //static wrapper for standart query
    public static function skoly() {
        return static::all();
    }

    public function scopeSkoly2($query, $value) {
        return $query->where("","")->get();
    }
    
    
    public function kontakt()
    {
        return $this->hasOne('App\SkolaKontakt', "skola_id");
    }
    
    
    public function adresy()
    {
        return $this->hasMany('App\SkolaAdresa', 'skola_id');
    }
    
    
    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'FullText';
    }


    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
