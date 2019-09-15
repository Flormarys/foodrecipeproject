<?php

namespace App\Http\Controllers;

use App\HistoricRecipes;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class HistoricRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $historic = new HistoricRecipes;

        if($request->has('dateFrom') && $request->has('dateTo')){
            $historic = $historic->dateFilter($request->dateFrom, $request->dateTo);
        }
        $historics = $historic->get();
        $totalPrice = 0;
        foreach ($historics as $historic_price) {
            $totalPrice = $totalPrice + $historic_price->total_cost;
        }
        $historic = $historic->orderBy('created_at', 'asc')->paginate(10);
        $historicRecipe = [$historic, $totalPrice];
        return view('recipes.historic')->with('historicRecipe', $historicRecipe);
    }

}
