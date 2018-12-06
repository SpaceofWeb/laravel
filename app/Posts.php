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


    static public function exists($id)
    {
      $p = Posts::find($id);

      if ($p)
        return true;
      else
        return false;
    }
}
