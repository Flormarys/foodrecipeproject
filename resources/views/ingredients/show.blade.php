@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h3>Ingredient</h3>
            <br>
                <p><b>Product Name:</b> {!!$ingredient_info->available_ingredient->name!!}</p>
                <p><b>Price:</b> {!!$ingredient_info->price!!}</p>
                <p><b>Quantity:</b> {!!$ingredient_info->quantity!!}</p>
                <p><b>Unit:</b> {!!$ingredient_info->available_ingredient->unit!!}</p>
            <br>
            <hr>
                <small>Last update {{$ingredient_info->updated_at}}</small>
            <hr>
            <div class="btn-group btn-group-sm">
                {!!Form::open(['action' =>['IngredientController@index'], 'method' => 'GET'])!!}
                {{Form::submit('Go Back', ['class' =>'btn btn-outline-primary'])}}
                {!!Form::close()!!}
                {!!Form::open(['action' =>['IngredientController@edit', $ingredient_info->id], 'method' => 'GET'])!!}
                {{Form::submit('Edit', ['class' =>'btn btn-outline-success'])}}
                {!!Form::close()!!}
                {!!Form::open(['action' =>['IngredientController@destroy', $ingredient_info->id], 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'POST')}}
                {{Form::submit('Delete', ['class' =>'btn btn-outline-danger'])}}
                {!!Form::close()!!}
            </div>
    </div>
@endsection
