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

class AvailableIngredients extends Model
{
    public $timestamps = true;

    public function ingredients()
    {
        return $this->hasMany('App\Ingredients');
    }

}
