<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;
use App\User;

class Ingredients extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function assignFromRequest(Request $request){
        $this->price = $request->input('price');
        $this->quantity = $request->input('quantity');
        $this->measure = $request->input('measure');
        $this->available_ingredient_id = $request->input('available_ingredient_id');
    }

}
