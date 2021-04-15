<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 * PHP 7.3.27
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\DB;


class HistoricRecipes extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function dateFilter($from, $to)
    {
        return $this->whereBetween('created_at', array($from, $to));
    }


}
