@extends('layouts.app')

@section('content')
    <br>
    <a href="/ingredients/create" class="btn btn-outline-primary">Upload a New Ingredient</a>
    <br>
    <br>
    <table class="table table-hover">
            <h4><div class="card-header">Ingredients</div></h4>
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($ingredient_list) >0)
                        @foreach ($ingredient_list as $ingredient)
                            <tr>
                                <td>{!!$ingredient->available_ingredient->name!!}</td>
                                <td>{!!$ingredient->quantity!!}</td>
                                <td>
                                   <div class="btn-group btn-group-sm">
                                     {!!Form::open(['action' =>['IngredientController@show', $ingredient->id], 'method' => 'GET'])!!}
                                     {{Form::submit('View', ['class' =>'btn btn-outline-primary'])}}
                                     {!!Form::close()!!}
                                     {!!Form::open(['action' =>['IngredientController@edit', $ingredient->id], 'method' => 'GET'])!!}
                                     {{Form::submit('Edit', ['class' =>'btn btn-outline-success'])}}
                                     {!!Form::close()!!}
                                     {!!Form::open(['action' =>['IngredientController@destroy', $ingredient->id], 'method' => 'POST'])!!}
                                     {{Form::hidden('_method', 'POST')}}
                                     {{Form::submit('Delete', ['class' =>'btn btn-outline-danger'])}}
                                     {!!Form::close()!!}
                                     </div>
                                 </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
                {{ $ingredient_list->links() }}
          <br>
        @else
            <p>No Ingredients found</p>
        @endif
@endsection
