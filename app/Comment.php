<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //fields that are ok to massive fill, white list
    protected  $fillable = ['comment'];

    //fields that are not ok to massive fill, black list
    protected $quarded = ['user_id'];
}
