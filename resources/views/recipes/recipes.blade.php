@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-info">List of Recipes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Foto</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 247px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 116px;">Missed Ingredients</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 116px;">Missed Quantities</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($listingRecipes) > 0)
                                            @foreach ($listingRecipes as $recipes)
                                            <tr role="row" class="odd">
                                                <td><img src="{!!$recipes["recipeImage"]!!}" style="width:60px"></td>
                                                <td>{!!$recipes["title"]!!}</td>
                                                <td>{!!$recipes["countMissedIngredients"]!!}</td>
                                                <td>{!!$recipes["countMissedQuantity"]!!}</td>
                                                <td>
                                                    <form action="/recipes/show/{!!$recipes["recipe_id"]!!}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="recipe_id" value={!!$recipes["recipe_id"]!!}>
                                                        <input type="hidden" name="title" value={!!$recipes["title"]!!}>
                                                        <input type="hidden" name="recipeImage" value={!!$recipes["recipeImage"]!!}>
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
                                                        <button type="submit" class="btn btn-info btn-circle">
                                                            <i class="fas fa-info"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @else
            <p>No Recipes Found</p>
        @endif

@endsection
