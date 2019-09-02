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
                "ingredients=$name&number=100&apiKey=3c12fdd3f3e441e6bfad202fff49de0e"
            );
        $fulllist = json_decode($response->getBody());
        foreach ($fulllist as $recipe) {
            $countMissedIngredients = 0;
            $countMissedAmount = 0;
            $missedIngredientsList = [];
            $missedAmounts = 0;
            $missedUnit = [];
            foreach ($recipe->usedIngredients as $ingredientRecipe) {
                if(!isset($userIngredients[$ingredientRecipe->name])) {
                    $countMissedIngredients++;
                    $missedIngredientsList [] = $ingredientRecipe->name;
                    $missedUnit []= $ingredientRecipe->unit;
                }
                if (isset($userIngredients[$ingredientRecipe->name]) && $userIngredients[$ingredientRecipe->name] < $ingredientRecipe->amount){
                    $countMissedAmount++;
                    $missedAmounts = $ingredientRecipe->amount;
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
                    'ingredients' => $recipe->usedIngredients,
                    'countMissedIngredients' => $countMissedIngredients,
                    'missedIngredients' => $missedIngredientsList,
                    'countMissedAmount' => $countMissedAmount,
                    'missedUnit' => $missedUnit,
                    'missedAmount' => $missedAmounts
                ];
            }
        }

        return view('recipes.recipes')->with('listingRecipes', $allRecipes);
    }

    public function show($recipe_id){
        $client = new Client();
        $response = $client
            ->request(
                'GET',
                "https://api.spoonacular.com/recipes/$recipe_id" .
                "/information?includeNutrition=false" .
                "&apiKey=3c12fdd3f3e441e6bfad202fff49de0e"
            );
        $recipeDetails = json_decode($response->getBody());
        $fullRecipeInformation = [
                'recipe_id' => $recipeDetails->id,
                'title' => $recipeDetails->title,
                'image' => $recipeDetails->image,
                'imageType' => $recipeDetails->imageType,
                'readyInMinutes' => $recipeDetails->readyInMinutes,
                'servings' => $recipeDetails->servings,
                'sourceUrl' => $recipeDetails->sourceUrl,
                'ingredients' => $recipeDetails->extendedIngredients
            ];

        return view('recipes.show')->with('fullRecipe', $fullRecipeInformation);
    }
}
