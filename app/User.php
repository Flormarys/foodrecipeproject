<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 * PHP 7.3.27 
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Ingredients;
use App\HistoricRecipes;

/**
 * The User class establishes the attributes and relationship with other models
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The userIngredients function establish that the user has many ingredients.
     *
     * @return Response
     */
    public function userIngredients()
    {
        return $this->hasMany('App\Ingredients');
    }

    /**
     * The userHistoricRecipes function establish the use has many historic recipes.
     *
     * @return Response
     */
    public function userHistoricRecipes()
    {
        return $this->hasMany('App\HistoricRecipes');
    }

}
