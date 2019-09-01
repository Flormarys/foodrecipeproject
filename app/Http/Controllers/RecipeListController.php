<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredients;
use App\User;
use App\AvailableIngredients;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class RecipeListController extends Controller
{
    public function index()
    {
        $client = new Client();
        $ingredients = Ingredients::select(['available_ingredients.name',
            DB::raw('SUM(ingredients.quantity) as totalquantity')])
            ->where('user_id', '=', Auth::id())
            ->leftJoin(
                'available_ingredients',
                'available_ingredients.id',
                '=',
                'ingredients.available_ingredient_id'
            )
            ->groupBy('available_ingredients.name')
            ->get();
        $name = "";
        $userIngredients = [];
        foreach ($ingredients as $ingredient) {
            $name = $name . $ingredient->name . ",+";
            $userIngredients[$ingredient->name] = $ingredient->totalquantity;
        }
        $name = substr_replace($name, "", -2);
        $allRecipes = [];
        $now = date('Y-m-d H:i:s');

        $response = $client
            ->request(
                'GET',
                "https://api.spoonacular.com/recipes/findByIngredients?" .
                "ingredients=$name&number=10&apiKey=3c12fdd3f3e441e6bfad202fff49de0e"
            );
        $fulllist = json_decode($response->getBody());

        foreach ($fulllist as $recipe) {
            $countMissedIngredients = 0;
            $countMissedAmount = 0;
            foreach ($recipe->usedIngredients as $ingredientRecipe) {
                if(!isset($userIngredients[$ingredientRecipe->name])) {
                    $countMissedIngredients++;
                }
                if (isset($userIngredients[$ingredientRecipe->name]) && $userIngredients[$ingredientRecipe->name] < $ingredientRecipe->amount){
                    $countMissedAmount++;
                }
            }
            if(
                ($countMissedIngredients == 0 && $countMissedAmount == 0) ||
                ($countMissedIngredients == 0 && $countMissedAmount < 3) ||
                ($countMissedIngredients < 3 && $countMissedAmount == 0)
            ) {
                $allRecipes[] =[
                    'recipe_id' => $recipe->id,
                    'title' => $recipe->title,
                    'recipeImage' => $recipe->image,
                    'imageType' => $recipe->imageType,
                    'ingredients' => $recipe->usedIngredients
                ];
            }
        }
        return view('recipes')->with('listingRecipes', $allRecipes);
    }
}
