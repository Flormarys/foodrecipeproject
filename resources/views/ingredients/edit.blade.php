@extends('layouts.app')

@section('content')
  <div class="jumbotron">
      <h2>Editing an Ingredient</h2>
      <form method="POST" action="/ingredients/edit/{{$ingredients->id}}" enctype="multipart/form-data">
          @csrf

          <br>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">Product Name:   <b>{{$ingredients->available_ingredient->name}} - ({{$ingredients->available_ingredient->unit}}).</b></label>

            </div>
          </div>
          <br>
          <div class="form-row">
             <div class="form-group col-md-6">
                 <label for="price">Quantity:</label>
                 <input type="number" name="quantity" value="{{$ingredients->quantity}}">
            </div>
            <div class="form-group col-md-6">
                <label for="price">Price:</label>
                <input type="number" name="price" value="{{$ingredients->price}}">
           </div>
          </div>
          <div class="btn-group btn-group">
            {!!Form::open(['action' =>['IngredientController@edit', $ingredients->id], 'method' => 'GET'])!!}
            {{Form::submit('Edit', ['class' =>'btn btn-outline-success'])}}
            {!!Form::close()!!}
            {!!Form::open(['action' =>['IngredientController@index'], 'method' => 'GET'])!!}
            {{Form::submit('Go Back', ['class' =>'btn btn-outline-primary'])}}
            {!!Form::close()!!}
            {!!Form::open(['action' =>['IngredientController@destroy', $ingredients->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'POST')}}
            {{Form::submit('Delete', ['class' =>'btn btn-outline-danger'])}}
            {!!Form::close()!!}
            </div>
    </form>
@endsection
