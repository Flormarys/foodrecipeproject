@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h3>Recipe</h3>
            <br>
            @if ($fullRecipe[0]["countMissedIngredients"] != "0" &&
            $fullRecipe[0]["missedIngredients"] != NULL)
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
                @foreach ($fullRecipe[0]["missedIngredients"] as $missedIngredientsList)
                    <p>{!!$missedIngredientsList!!}</p>
                @endforeach
            @endif
            @if ($fullRecipe[0]["countMissedIngredients"] == "0" &&
            $fullRecipe[0]["countMissedQuantity"] == "0")
                <p><b>Recipe: </b> {!!$fullRecipe[1]["title"]!!}</p>
                <p><b>Ready In Minutes: </b> {!!$fullRecipe[1]["readyInMinutes"]!!}</p>
                <p><b>Servings: </b> {!!$fullRecipe[1]["servings"]!!}</p>
                <p><b>Ingredients: </b></p>
                @foreach ($fullRecipe[1]["ingredients"] as $missedIngredientsList)
                    <p>{!!$missedIngredientsList!!}</p>
                @endforeach
                <a href="{!!$fullRecipe[1]["sourceUrl"]!!}" target="_blank"
                class="btn btn-outline-secondary">View Recipe</a>
                <form method="POST" action="/recipes/select{!!$fullRecipe[0]["recipe_id"]!!}"
                enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-success">Use Recipe</button>
                    @csrf
                </form>
            @endif
            <form action="/recipes" method="GET">
                <button type="submit" class="btn btn-outline-primary">Go Back</button>
            </form>
        <br>
    </div>
@endsection
