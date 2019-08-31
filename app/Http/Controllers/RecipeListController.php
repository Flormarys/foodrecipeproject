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
                "ingredients=$name&number=10&apiKey=c5c136ed8d36442a8ece991083b4bd20"
            );
        $fulllist = json_decode($response->getBody());

        foreach ($fulllist as $recipe) {
            if($recipe->missedIngredientCount == 0) {
                foreach ($recipe->usedIngredients as $ingredientRecipe) {
                    if ($userIngredients[$ingredientRecipe->name] >= $ingredientRecipe->amount) {
                        $allRecipes[] =[
                             'recipe_id' => $recipe->id,
                             'title' => $recipe->title,
                             'recipeImage' => $recipe->image,
                             'imageType' => $recipe->imageType,
                             'ingredients' => $recipe->usedIngredients
                         ];
                    }
                }
            }
        }

        return view('recipes')->with('listingRecipes', $allRecipes);
    }
}
