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
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <a href="/" class="btn btn-outline-primary">Go Back</a>
                    <button type="submit" class="btn btn-outline-success">Edit</button>
            </form>
                <form method="POST" action="/ingredients/{{$ingredients->id}}" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                    @csrf
                </form>
            </div>
@endsection
