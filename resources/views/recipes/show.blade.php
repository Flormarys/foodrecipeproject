@extends('layouts.app')

@section('content')
<div class="jumbotron">
      <h3>Recipe</h3>
          <br>
          <p><b>Title:</b> {!!$fullRecipe["title"]!!}</p>
          <p><b>Preparation Time:</b> {!!$fullRecipe["readyInMinutes"]!!}  minutes</p>
          <p><b>Servings:</b> {!!$fullRecipe["servings"]!!}</p>
          <p><b>Ingredients:</b>
              @foreach ($fullRecipe["ingredients"] as $ingredient)
                 {!!$ingredient->name!!},
              @endforeach
          </p>
          <p><b>Full Recipe:</b> {!!$fullRecipe["sourceUrl"]!!}</p>
          {!!Form::open(['action' =>['RecipeListController@index'], 'method' => 'GET'])!!}
          {{Form::submit('Go Back', ['class' =>'btn btn-outline-primary'])}}
          {!!Form::close()!!}
        <br>

  </div>
@endsection
