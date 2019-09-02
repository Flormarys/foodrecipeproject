@extends('layouts.app')

@section('content')

    <table class="table table-hover">
            <h4><div class="card-header">Ingredients</div></h4>
                  <thead>
                    <tr>
                      <th scope="col">Recipes</th>
                      <th scope="col">Missed Ingredients</th>
                      <th scope="col">Ingredients Needed</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Unit</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($listingRecipes) > 0)
                        @foreach ($listingRecipes as $recipes)
                            <tr>
                                <td>{!!$recipes["title"]!!}</td>
                                <td>{!!$recipes["countMissedIngredients"]!!}</td>
                                <td>
                                @foreach ($recipes["missedIngredients"] as $missed)
                                    {!!$missed!!}
                                @endforeach
                                </td>
                                <td>{!!$recipes["missedAmount"]!!}</td>
                                <td>
                                    @foreach ($recipes["missedUnit"] as $unit)
                                        {!!$unit!!}
                                    @endforeach
                                </td>
                                <td>
                                    {!!Form::open(['action' =>['RecipeListController@show', $recipes["recipe_id"]], 'method' => 'GET'])!!}
                                    {{Form::submit('View', ['class' =>'btn btn-outline-primary'])}}
                                    {!!Form::close()!!}
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
