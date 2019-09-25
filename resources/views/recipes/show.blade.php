@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Recipe</h4>
        </div>
        <div class="card-body">
            @if ($fullRecipe[0]["countMissedIngredients"] != "0" && $fullRecipe[0]["missedIngredients"] != NULL)
                <p><b>Recipe: </b> {!!$fullRecipe[0]["title"]!!}</p>
                <p><b>Missed Ingredients: </b> {!!$fullRecipe[0]["countMissedIngredients"]!!}</p>
                <p><b>Missing Ingredients: </b></p>
                @foreach ($fullRecipe[0]["missedIngredients"] as $missedIngredientsList)
                    <p>{!!$missedIngredientsList!!}</p>
                @endforeach
            @endif
            @if ($fullRecipe[0]["countMissedQuantity"] != "0" && $fullRecipe[0]["missedQuantity"] != NULL)
                <p><b>Recipe: </b> {!!$fullRecipe[0]["title"]!!}</p>
                <p><b>Missed Quantity: </b> {!!$fullRecipe[0]["countMissedQuantity"]!!}</p>
                <p><b>Missing Ingredients: </b></p>
                @foreach ($fullRecipe[0]["missedQuantity"] as $missedQuantity)
                    <p>{!!$missedQuantity!!}</p>
                @endforeach
            @endif
            @if ($fullRecipe[0]["countMissedIngredients"] == "0" &&
            $fullRecipe[0]["countMissedQuantity"] == "0")
                <p><b>Recipe: </b> {!!$fullRecipe[1]["title"]!!}</p>
                <p><b>Ready In Minutes: </b> {!!$fullRecipe[1]["readyInMinutes"]!!}</p>
                <p><b>Servings: </b> {!!$fullRecipe[1]["servings"]!!}</p>
                <p><b>Dish Tipes: </b></p>
                @foreach ($fullRecipe[1]["dishTypes"] as $dishType)
                    <p>{!!$dishType!!}</p>
                @endforeach
                <p><b>Ingredients: </b></p>
                @foreach ($fullRecipe[1]["ingredients"] as $missedIngredientsList)
                    <p>{!!$missedIngredientsList!!}</p>
                @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-1">
            <a href="{!!$fullRecipe[1]["sourceUrl"]!!}" target="_blank" class="btn btn-warning btn-circle m-1">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                </svg>
            </a>
        </div>
        <div class="col-1">
            <form method="POST" action="/recipes/select{!!$fullRecipe[0]["recipe_id"]!!}"
                enctype="multipart/form-data">
                <button type="submit" class="btn btn-success btn-circle m-1">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </button>
                @csrf
            </form>
        </div>
            @endif
        <div class="col-1">
            <a href="/recipes" class="btn btn-info btn-circle m-1">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
            </a>
        </div>
    </div>
    <br>
    <br>
@endsection
