@extends('layouts.app')

@section('content')

    <br>
    <table class="table table-hover">
            <h4><div class="card-header">Ingredients</div></h4>
                  <thead>
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Recipe</th>
                      <th scope="col">Cost</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($historicRecipe) >0)
                        @foreach ($historicRecipe as $historic)
                            <tr>
                                <td>{!!$historic->created_at!!}</td>
                                <td>{!!$historic->recipe_name!!}</td>
                                <td>{!!$historic->total_cost!!}</td>
                                <td>
                                   <div class="btn-group btn-group-sm">

                                     </div>
                                 </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
                {{-- {{ $ingredient_list->links() }} --}}
          <br>
        @else
            <p>No Recipes Found</p>
        @endif

@endsection
