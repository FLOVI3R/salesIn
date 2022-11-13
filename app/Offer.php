<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table='offers';

    protected $fillable=['id','title','description','date_max','num_candidates','cicles_id','deleted'];
}
