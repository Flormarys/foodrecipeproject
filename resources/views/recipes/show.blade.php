@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-info">Recipe</h4>
        </div>
            <div class="card-body">
                @if ($fullRecipe[0]["countMissedIngredients"] != "0" && $fullRecipe[0]["missedIngredients"] != NULL)
                    <div class="row">
                        <div class="form-group col-md-4">
                            <p><b>Recipe: </b> {!!$fullRecipe[0]["title"]!!}</p>
                            <p><b>Missed Ingredients: </b> {!!$fullRecipe[0]["countMissedIngredients"]!!}</p>
                            <p><b>Missing Ingredients: </b></p>
                            @foreach ($fullRecipe[0]["missedIngredients"] as $missedIngredientsList)
                                <p>{!!$missedIngredientsList!!}</p>
                            @endforeach
                        </div>
                        <div class="form-group col-md-8">
                            <img style="width:80%" src="{!!$fullRecipe[1]["image"]!!}">
                        </div>
                    </div>
                @endif
                @if ($fullRecipe[0]["countMissedQuantity"] != "0" && $fullRecipe[0]["missedQuantity"] != NULL)
                    <div class="row">
                        <div class="form-group col-md-4">
                            <p><b>Recipe: </b> {!!$fullRecipe[0]["title"]!!}</p>
                            <p><b>Missed Quantity: </b> {!!$fullRecipe[0]["countMissedQuantity"]!!}</p>
                            <p><b>Missing Ingredients: </b></p>
                            @foreach ($fullRecipe[0]["missedQuantity"] as $missedQuantity)
                                <p>{!!$missedQuantity!!}</p>
                            @endforeach
                        </div>
                        <div class="form-group col-md-8">
                            <img style="width:80%" src="{!!$fullRecipe[1]["image"]!!}">
                        </div>
                    </div>
                @endif
                @if ($fullRecipe[0]["countMissedIngredients"] == "0" &&
                $fullRecipe[0]["countMissedQuantity"] == "0")
                    <div class="row">
                        <div class="form-group col-md-4">
                            <p><b>Recipe: </b> {!!$fullRecipe[1]["title"]!!}</p>
                            <p><b>Ready In Minutes: </b> {!!$fullRecipe[1]["readyInMinutes"]!!}</p>
                            <p><b>Servings: </b> {!!$fullRecipe[1]["servings"]!!}</p>
                            <p><b>Dish Tipes: </b></p>
                            @foreach ($fullRecipe[1]["dishTypes"] as $dishType)
                                <p>{!!$dishType!!}</p>
                            @endforeach
                        </div>
                        <div class="form-group col-md-8">
                            <img style="width:30%" src="{!!$fullRecipe[1]["image"]!!}">
                        </div>
                    </div>
            </div>
    </div>
    <div class="row">
        <div class="col-1">
            <a href="{!!$fullRecipe[1]["sourceUrl"]!!}" target="_blank" class="btn btn-warning btn-circle m-1">
                <i class="fas fa-external-link-alt"></i>
            </a>
        </div>
        <div class="col-1">
            <form method="POST" action="/recipes/select{!!$fullRecipe[0]["recipe_id"]!!}"
                enctype="multipart/form-data">
                <button type="submit" class="btn btn-success btn-circle m-1">
                    <i class="fas fa-thumbtack"></i>
                </button>
                @csrf
            </form>
        </div>
    @endif
    <br>
    <br>
        <div class="col-1">
            <a href="/recipes" class="btn btn-info btn-circle m-1">
                <i class="fas fa-undo-alt"></i>
            </a>
        </div>
    </div>
<br>
<br>
@endsection
