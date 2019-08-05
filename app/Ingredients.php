<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DB;

class Ingredients extends Model
{
    public function assignFromRequest(Request $request){
        $this->name = $request->input('name');
        $this->price = $request->input('price');
        $this->quantity = $request->input('quantity');
        $this->measure = $request->input('measure');
    }

}
