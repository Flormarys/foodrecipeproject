<?php

namespace App\Http\Controllers;

use App\Ingredients;
use App\User;
use Illuminate\Http\Request;
use App\AvailableIngredients;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class IngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredients::where('user_id', '=', Auth::id())
                                    ->with('available_ingredient')
                                    ->paginate(10);

        // if ($request->has('ingredient_name')) {
        //   $ingredients = $ingredients->where('title', 'like', '%'. $request->input('title').'%');
        // }

        return view('index')->with('ingredient_list', $ingredients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $available_ingredients = AvailableIngredients::orderBy('name', 'asc')->get();
        return view('ingredients.create')->with('ingredients_info', $available_ingredients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request,[
          'price' => 'required',
          'quantity' => 'required',
        ]);

        $ingredients = new Ingredients;
        $ingredients->assignFromRequest($request);
        $ingredients->user_id = Auth::id();
        $ingredients->save();
        return redirect('/')->with('success', 'Added Ingredient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredients = Ingredients::where('user_id', '=', Auth::id())
            ->where('id', '=', $id)
            ->with('available_ingredient')
            ->get()
            ->first();
        return view('ingredients.show')->with('ingredient_info', $ingredients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredients = Ingredients::where('user_id', '=', Auth::id())
            ->where('id', '=', $id)
            ->with('available_ingredient')
            ->get()
            ->first();
        return view('ingredients.edit')->with('ingredients', $ingredients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'price' => 'required',
          'quantity' => 'required',
        ]);

        $ingredients = Ingredients::find($id);
        $ingredients->price = $request->input('price');
        $ingredients->quantity = $request->input('quantity');
        $ingredients->save();
        return redirect('/')->with('success', 'Edited Ingredient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredients = Ingredients::find($id);
        $ingredients->delete();
        return redirect('/')->with('success', 'Deleted Ingredient');
    }
}
