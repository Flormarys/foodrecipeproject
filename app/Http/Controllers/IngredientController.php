<?php

namespace App\Http\Controllers;

use App\Ingredients;
use Illuminate\Http\Request;
use App\AvailableIngredients;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allIngredients = AvailableIngredients::all();
        $unitMeasure = DB::table('available_ingredients')
                     ->select(DB::raw('distinct unit as unity'))
                     ->whereNotNull('unit')
                     ->get();
        $dbInformation = array($allIngredients, $unitMeasure);
        return view('ingr.create')->with('dbInfo', $dbInformation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'name' => 'required',
          'price' => 'required',
          'quantity' => 'required',
          'measure' => 'required'
        ]);

        $ingredients = new Ingredients;
        $ingredients->assignFromRequest($request);
        $ingredients->save();
        return redirect('/home')->with('success', 'Added Ingredient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredients $ingredients)
    {
        return view('ingr.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredients $ingredients)
    {
        return view('ingr.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredients $ingredients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredients $ingredients)
    {
        //
    }
}
