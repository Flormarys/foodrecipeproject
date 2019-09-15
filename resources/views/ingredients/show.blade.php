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
                <form action="/recipes" method="GET">
                    <button type="submit" class="btn btn-outline-primary">Go Back</button>
                </form>
                <form method="GET" action="/ingredients/edit/{!!$ingredient_info->id!!}"
                enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-success">Edit</button>
                    @csrf
                </form>
                <form method="POST" action="/ingredients/{!!$ingredient_info->id!!}"
                enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                    @csrf
                </form>
            </div>
    </div>
@endsection
