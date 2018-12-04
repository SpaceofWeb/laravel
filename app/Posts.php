<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $timestamps = false;

    public function comments()
    {
      return $this->hasMany('App\Comments');
    }
}
