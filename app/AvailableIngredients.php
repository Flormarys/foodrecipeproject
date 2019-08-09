<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingredients;
use App\Http\Controllers\DB;

class AvailableIngredients extends Model
{
    public $timestamps = true;

    public function ingredients()
    {
        return $this->hasMany('App\Ingredients');
    }

}
