<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 * PHP 7.3.27
 */

use Illuminate\Database\Seeder;
use App\User;
use App\AvailableIngredients;
use App\Ingredients;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::where('email', '=', 'test@user.com')->first();

        $availables = AvailableIngredients::all();
        $available_id =[];
        foreach ($availables as $available) {
            $available_id [] = $available->id;
        }
        factory(Ingredients::class, 50)->make()->each(function($ingredients) use ($user_id, $available_id){
            $ingredients->user_id = $user_id->id;
            $ingredients->available_ingredient_id = $available_id[array_rand($available_id)];
            $ingredients->save();
        });

    }
}
