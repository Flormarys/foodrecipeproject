{{-- @extends('layouts.app')

@section('content')
<div class="jumbotron">
      <h3>Ingredient</h3>
          <br>
          <p><b>Name:</b> {{$ingred->name}}</p>

          <p><b>Price:</b> {!!$ingred->price!!}</p>

          <p><b>Quantity:</b> {!!$ingred->quantity!!}</p>

          <p><b>Measure:</b>

        <br>

      <hr>
      <small>Written on {{$ingred->created_at}}</small>
      <small>Last update {{$ingred->updated_at}}</small>
      <hr>
      <div class="btn-group btn-group-sm">
        {!!Form::open(['action' =>['IngredientController@index'], 'method' => 'GET'])!!}
        {{Form::submit('Go Back', ['class' =>'btn btn-outline-primary'])}}
        {!!Form::close()!!}
        {!!Form::open(['action' =>['IngredientController@edit', $ingred->id], 'method' => 'GET'])!!}
        {{Form::submit('Edit', ['class' =>'btn btn-outline-success'])}}
        {!!Form::close()!!}
        {!!Form::open(['action' =>['IngredientController@destroy', $ingred->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'POST')}}
        {{Form::submit('Delete', ['class' =>'btn btn-outline-danger'])}}
        {!!Form::close()!!}
        </div>
  </div>
@endsection --}}
