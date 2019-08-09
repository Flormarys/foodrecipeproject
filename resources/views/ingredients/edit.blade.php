@extends('layouts.app')

@section('content')
  <div class="jumbotron">
      <h2>Uploading a Ingredient</h2>
      <form method="POST" action="/ingredients/create" enctype="multipart/form-data">
          @csrf

          <br>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">Product Name</label>
                  <select name="available_ingredient_id" class="form-control">
                    @foreach($ingredients[0] as $ingredient)
                        <option value="{{$ingredient->id}}">{{$ingredient->name}} - ({{$ingredient->unit}})</option>
                    @endforeach
                   </select>
            </div>
          </div>
          <br>
          <div class="form-row">
             <div class="form-group col-md-6">
                 <label for="price">Quantity:</label>
                 <input type="number" name="quantity" value="{{$ingredients[1]->quantity}}">
            </div>
            <div class="form-group col-md-6">
                <label for="price">Price:</label>
                <input type="number" name="price" value="{{$ingredients[1]->price}}">
           </div>
          </div>
          <div class="btn-group btn-group">
            {!!Form::open(['action' =>['IngredientController@edit', $ingredients[1]->id], 'method' => 'GET'])!!}
            {{Form::submit('Edit Ingredient', ['class' =>'btn btn-outline-success'])}}
            {!!Form::close()!!}
            {!!Form::open(['action' =>['IngredientController@index'], 'method' => 'GET'])!!}
            {{Form::submit('Go Back', ['class' =>'btn btn-outline-primary'])}}
            {!!Form::close()!!}
            {{-- {!!Form::open(['action' =>['IngredientController@destroy', $ingredient_info->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'POST')}}
            {{Form::submit('Delete', ['class' =>'btn btn-outline-danger'])}}
            {!!Form::close()!!} --}}
            </div>
    </form>
@endsection
