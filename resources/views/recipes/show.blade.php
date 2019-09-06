@extends('layouts.app')

@section('content')
    <div class="jumbotron">
      <h3>Recipe</h3>
          <br>
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
              @foreach ($fullRecipe[0]["missedIngredients"] as $missedIngredientsList)
                  <p>{!!$missedIngredientsList!!}</p>
              @endforeach
          @endif

          @if ($fullRecipe[0]["countMissedIngredients"] == "0" && $fullRecipe[0]["countMissedQuantity"] == "0")
              <p><b>Recipe: </b> {!!$fullRecipe[1]["title"]!!}</p>
              <p><b>Ready In Minutes: </b> {!!$fullRecipe[1]["readyInMinutes"]!!}</p>
              <p><b>Servings: </b> {!!$fullRecipe[1]["servings"]!!}</p>
              <p><b>Full Recipe Details: </b> {!!$fullRecipe[1]["sourceUrl"]!!}</p>
              <p><b>Ingredients: </b></p>
              @foreach ($fullRecipe[1]["ingredients"] as $missedIngredientsList)
                  <p>{!!$missedIngredientsList!!}</p>
              @endforeach
              {!!Form::open(['action' =>['RecipeListController@store', $fullRecipe[1]["recipe_id"]], 'method' => 'POST'])!!}
              {{Form::submit('Use Recipe', ['class' =>'btn btn-outline-success'])}}
              {!!Form::close()!!}
          @endif
          {!!Form::open(['action' =>['RecipeListController@index'], 'method' => 'GET'])!!}
          {{Form::submit('Go Back', ['class' =>'btn btn-outline-primary'])}}
          {!!Form::close()!!}

        <br>
    </div>
@endsection
