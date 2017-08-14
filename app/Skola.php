<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Rating;
use App\TypSkola;

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
    
    public function rating() {
        return Rating::schoolRating($this->id);
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
     * @return mixed
     */
    public function getUrl() {
       // return $this->id;
        return $this->url;
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'url';
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

    /**
     * @param $filters
     * @return mixaed
     */
    static function getSchoolsFilter($filters) {
        if(isset($filters['types'])) {
            $schoolIds = TypSkola::select('skola_id')->where('typ_skoly_id', $filters['types'])->groupBy('skola_id')->get();
            return self::whereIn('id', $schoolIds);
        }
        return self::all();
    }

    public function getTypesNames() {
        $typy = TypSkola::where('skola_id', $this->id)->get();
        $names = array();
        foreach($typy as $typ) {
            $names[] = $typ->getTypName();
        }
        $names = array_unique($names);
        return $names;
    }


}
