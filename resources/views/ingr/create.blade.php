
@extends('layouts.app')

@section('content')
  <div class="jumbotron">
      <h2>Uploading a Ingredient</h2>
      <form method="POST" action="/create" enctype="multipart/form-data">
          @csrf

          <br>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="title">Product Title</label>
              <select name="available_ingredient_id" class="form-control">
                @foreach($ingred_info[0] as $ingreds)
                    <option value="{{$ingreds->id}}">{{$ingreds->name}}</option>
                @endforeach
               </select>
            </div>
             <div class="form-group col-md-6">
                 <label for="price">Product Price:</label>
                 <input type="number" name="price">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">Measure</label>
              <select name="measure" class="form-control">
                @foreach($ingred_info[1] as $unitInfo)
                    <option value="{{$unitInfo->unity}}">{{$unitInfo->unity}}</option>
                @endforeach
               </select>
            </div>
             <div class="form-group col-md-6">
                 <label for="price">Quantity:</label>
                 <input type="number" name="quantity">
            </div>
          </div>
          <button type="submit" class="btn btn-outline-success">Send</button>
      </form>
@endsection
