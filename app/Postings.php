<?php

namespace App;

use App\Interests;

use Illuminate\Database\Eloquent\Model;

class Postings extends Model
{
    //Each posting can have many interests by different people
    public function interests()
      {
          return $this->hasMany('App\Interests', 'posting_id', 'id');
      }
}
