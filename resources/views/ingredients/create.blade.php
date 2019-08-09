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
                    @foreach($ingredients_info as $ingredient)
                        <option value="{{$ingredient->id}}">{{$ingredient->name}} - ({{$ingredient->unit}})</option>
                    @endforeach
                   </select>
            </div>
          </div>
          <br>
          <div class="form-row">
             <div class="form-group col-md-6">
                 <label for="price">Quantity:</label>
                 <input type="number" name="quantity">
            </div>
            <div class="form-group col-md-6">
                <label for="price">Price:</label>
                <input type="number" name="price">
           </div>
          </div>
          <button type="submit" class="btn btn-outline-success">Send</button>
      </form>
@endsection
