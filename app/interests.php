<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Postings;

class interests extends Model
{
    // Each interest is associated to one specific posting id
    public function posting()
      {
          return $this->belongsTo('App\Postings', 'id', 'posting_id');
      }

}
