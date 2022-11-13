<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table='requirements';

    protected $fillable=['id','description','offer_id','deleted'];
}
