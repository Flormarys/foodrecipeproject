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

/**
 * The Ingredients class establishes the attributes and relationship 
 * with other models
 */
class Ingredients extends Model
{
    /**
     * The users function establish that the Ingredients belongs to a user.
     *
     * @return Response
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The availableIngredient function establish that the Ingredients belongs to a 
     * available ingredient.
     *
     * @return Response
     */
    public function availableIngredient()
    {
        return $this->belongsTo('App\AvailableIngredients');
    }

    /**
     * Tne assignFromRequest function save data comming from request in 
     * database.Ingredients
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function assignFromRequest( Request $request )
    {
        $this->price = $request->input('price');
        $this->quantity = $request->input('quantity');
        $this->available_ingredient_id = $request->input('available_ingredient_id');
    }

}
