@extends('layouts.app')

@section('content')
        <table class="table table-hover">
            <br>
            <h4><div class="card-header">Recipe List</div></h4>
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Missed Ingredients</th>
                        <th scope="col">Misse Quantities</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
            <tbody>
                @if(count($listingRecipes) > 0)
                @foreach ($listingRecipes as $recipes)
                <tr>
                    <td>{!!$recipes["title"]!!}</td>
                    <td>{!!$recipes["countMissedIngredients"]!!}</td>
                    <td>{!!$recipes["countMissedQuantity"]!!}</td>
                    <td>
                        <form action="/recipes/show/{!!$recipes["recipe_id"]!!}" method="POST">
                            @csrf
                            <input type="hidden" name="recipe_id" value={!!$recipes["recipe_id"]!!}>
                            <input type="hidden" name="title" value={!!$recipes["title"]!!}>
                            <input type="hidden" name="recipeImage" value={!!$recipes["recipeImage"]!!}>
                            <input type="hidden" name="imageType" value={!!$recipes["imageType"]!!}>
                            <input type="hidden" name="countMissedIngredients" value={!!$recipes["countMissedIngredients"]!!}>
                            <input type="hidden" name="countMissedQuantity" value={!!$recipes["countMissedQuantity"]!!}>
                            <div style="display:none" >
                                <select  name="ingredients[]" multiple>
                                    @foreach ($recipes["ingredients"] as $ingredient)
                                        <option selected="selected" type="hidden" value="{!!$ingredient!!}"></option>
                                    @endforeach
                                </select>
                                <select  name="missedIngredients[]" multiple>
                                    @foreach ($recipes["missedIngredients"] as $missedIngredient)
                                        <option selected="selected" type="hidden" value="{!!$missedIngredient!!}"></option>
                                    @endforeach
                                </select>
                                <select  name="missedQuantity[]" multiple>
                                    @foreach ($recipes["missedQuantity"] as $missedQuantity)
                                        <option selected="selected" type="hidden" value="{!!$missedQuantity!!}"></option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">View</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        @else
            <p>No Recipes found</p>
        @endif

@endsection
