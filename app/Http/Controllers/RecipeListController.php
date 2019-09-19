<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredients;
use App\User;
use App\AvailableIngredients;
use App\HistoricRecipes;
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
                "ingredients=$name&number=50&apiKey=9cd222b498f14197a9fa66d9e3c08722"
            );

        $fulllist = json_decode($response->getBody());

        foreach ($fulllist as $recipe) {
            $countMissedIngredients = 0;
            $countMissedQuantity = 0;
            $missedIngredientsList = [];
            $missedQuantity = [];
            $fullIngredients = [];
            foreach ($recipe->usedIngredients as $ingredientRecipe){
                $fullIngredients[] =
                    $ingredientRecipe->name . ", " .
                    $ingredientRecipe->amount . ", " .
                    $ingredientRecipe->unit;

                if(!isset($userIngredients[$ingredientRecipe->name])) {
                    $countMissedIngredients++;
                    $missedIngredientsList [] =
                        "Name: " . $ingredientRecipe->name . ", " .
                        "Quantity: " . $ingredientRecipe->amount . ", " .
                        "Unit: ". $ingredientRecipe->unit;

                }
                if (
                    isset($userIngredients[$ingredientRecipe->name]) &&
                    $userIngredients[$ingredientRecipe->name] < $ingredientRecipe->amount
                ){
                    $countMissedQuantity++;
                    $missedQuantity []=
                        $ingredientRecipe->name . ", " .
                        $ingredientRecipe->amount . ", " .
                        $ingredientRecipe->unit;
                }
            }
            if(
                ($countMissedIngredients == 0 && $countMissedQuantity == 0) ||
                ($countMissedIngredients == 0 && $countMissedQuantity < 3) ||
                ($countMissedIngredients < 3 && $countMissedQuantity == 0)
            ) {
                $allRecipes[] =[
                    'recipe_id' => $recipe->id,
                    'title' => $recipe->title,
                    'recipeImage' => $recipe->image,
                    'imageType' => $recipe->imageType,
                    'ingredients' => $fullIngredients,
                    'countMissedIngredients' => $countMissedIngredients,
                    'missedIngredients' => $missedIngredientsList,
                    'countMissedQuantity' => $countMissedQuantity,
                    'missedQuantity' => $missedQuantity,
                ];
            }
        }

        return view('recipes.recipes')->with('listingRecipes', $allRecipes);
    }

    public function show(Request $request, $recipe_id){
            $recipeFromView = [
                'recipe_id' =>$request->input('recipe_id'),
                'title' => $request->input('title'),
                'recipeImage' => $request->input('recipeImage'),
                'imageType' => $request->input('imageType'),
                'ingredients' => $request->input('ingredients'),
                'countMissedIngredients' => $request->input('countMissedIngredients'),
                'missedIngredients' => $request->input('missedIngredients'),
                'countMissedQuantity' => $request->input('countMissedQuantity'),
                'missedQuantity' => $request->input('missedQuantity')
                ];

            $client = new Client();
            $response = $client
                ->request(
                    'GET',
                    "https://api.spoonacular.com/recipes/$recipe_id" .
                    "/information?includeNutrition=false" .
                    "&apiKey=9cd222b498f14197a9fa66d9e3c08722"
                );
            $recipeDetails = json_decode($response->getBody());
            $fullIngredient = [];
            foreach ($recipeDetails->extendedIngredients as $extendedIngredients) {
                $fullIngredient []=
                "Name: " . $extendedIngredients->name . ", " .
                "Quantity: " . $extendedIngredients->amount . ", " .
                "Unit: ". $extendedIngredients->unit;
            }
            $fullRecipeInformation = [
                    'recipe_id' => $recipeDetails->id,
                    'title' => $recipeDetails->title,
                    'image' => $recipeDetails->image,
                    'imageType' => $recipeDetails->imageType,
                    'readyInMinutes' => $recipeDetails->readyInMinutes,
                    'servings' => $recipeDetails->servings,
                    'sourceUrl' => $recipeDetails->sourceUrl,
                    'ingredients' => $fullIngredient,
                    'dishTypes' => $recipeDetails->dishTypes,
                ];
            $bothRecipeInformation = [$recipeFromView, $fullRecipeInformation];
    return view('recipes.show')->with('fullRecipe', $bothRecipeInformation);
    }

    public function store(Request $request, $recipe_id)
    {
        $client = new Client();
        $response = $client
            ->request(
                'GET',
                "https://api.spoonacular.com/recipes/$recipe_id" .
                "/information?includeNutrition=false" .
                "&apiKey=9cd222b498f14197a9fa66d9e3c08722"
            );
        $recipeDetails = json_decode($response->getBody());
        $ingredientRecipeId = [];
        $ingredientQuantity = [];

        foreach ($recipeDetails->extendedIngredients as $extendedIngredients) {
            $ingredientRecipeId []= $extendedIngredients->id;
            $ingredientQuantity [$extendedIngredients->id]= $extendedIngredients->amount;
        }
        $userIngredients = Ingredients::whereHas('available_ingredient',
            function($q) use($ingredientRecipeId)
            {
                $q->whereIn('api_id', $ingredientRecipeId);
            })
            ->with('available_ingredient')
            ->where('user_id', '=', Auth::id())
            ->get();

        $total_cost = 0;
        foreach ($userIngredients as $userIngredient) {
            if($userIngredient->quantity != 0){
                $previousQuantity = $userIngredient->quantity;
            }

            $userIngredient->quantity = $userIngredient->quantity
                - $ingredientQuantity[$userIngredient->available_ingredient->api_id];

            $usedQuantity = $ingredientQuantity
            [$userIngredient->available_ingredient->api_id];

            $total_cost = $total_cost + $usedQuantity * $userIngredient->price / $previousQuantity;
            $userIngredient->save();

        }

        $historicRecipe = new HistoricRecipes;
        $historicRecipe->user_id = Auth::id();
        $historicRecipe->total_cost = $total_cost;
        $historicRecipe->recipe_link = $recipeDetails->sourceUrl;
        $historicRecipe->recipe_id = $recipeDetails->id;
        $historicRecipe->recipe_name = $recipeDetails->title;
        $historicRecipe->save();

        return redirect('recipes')->with('Have a nice meal');
    }

}
