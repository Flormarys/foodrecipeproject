<?php

namespace App\Http\Controllers;

use App\HistoricRecipes;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HistoricRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historic = HistoricRecipes::where('user_id', '=', Auth::id())
                                    ->paginate(10);

        return view('recipes.historic')->with('historicRecipe', $historic);
    }

}
