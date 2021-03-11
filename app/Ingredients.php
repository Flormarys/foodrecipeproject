<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;
use App\User;
use App\AvailableIngredients;

/*
*   The Ingredients class establishes the attributes and relationship with other models
*/
class Ingredients extends Model
{
    /*
    *   The users function establish that the Ingredients belongs to a user.
    */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /*
    *   The available_ingredient function establish that the Ingredients belongs to a available ingredient.
    */
    public function available_ingredient()
    {
        return $this->belongsTo('App\AvailableIngredients');
    }

    /*
    *   The available_ingredient function establish that the Ingredients belongs to a available ingredient.
    */
    public function assignFromRequest(Request $request)
    {
        $this->price = $request->input('price');
        $this->quantity = $request->input('quantity');
        $this->available_ingredient_id = $request->input('available_ingredient_id');
    }

}
