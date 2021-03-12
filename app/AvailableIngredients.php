<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 * PHP 7.3.27 
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingredients;
use App\Http\Controllers\DB;

/**
 * AvailableIngredients class use to retrieve and store information from ingredients.    
 */
class AvailableIngredients extends Model
{
    public $timestamps = true;

    /**
     * The ingredients function establish that the AvailableIngredients has many Ingredients.
     */
    public function ingredients()
    {
        return $this->hasMany('App\Ingredients');
    }

}
