<?php

namespace App;

use App\Users;

use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    //

    // Each profile is associated with one user
    public function users() {
      return $this->belongsTo('App\Users');
    }
}
