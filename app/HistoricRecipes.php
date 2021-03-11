<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\DB;

/*
*	HistoricRecipes class it is an intermediate class since there is a many-to-many relationship
*/
class HistoricRecipes extends Model
{
	/*
	*	The user function establish that the historic recipes belongs to a user.
	*/
    public function user()
    {
        return $this->belongsTo('App\User');
    }

	/*
	*	The dateFilter function filter the historic recipe with a given date.
	*/
    public function dateFilter($from, $to)
    {
        return $this->whereBetween('created_at', array($from, $to));
    }
    
}
