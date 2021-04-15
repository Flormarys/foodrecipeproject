<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 * PHP 7.3.27
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;
use App\User;
use App\AvailableIngredients;

class Ingredients extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function available_ingredient()
    {
        return $this->belongsTo('App\AvailableIngredients');
    }

    public function assignFromRequest(Request $request)
    {
        $this->price = $request->input('price');
        $this->quantity = $request->input('quantity');
        $this->available_ingredient_id = $request->input('available_ingredient_id');
    }

}
