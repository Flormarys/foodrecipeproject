@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-info">Editing an Ingredient</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/ingredients/edit/{{$ingredients->id}}" enctype="multipart/form-data">
                @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Product Name:   <b>{{$ingredients->available_ingredient->name}} - ({{$ingredients->available_ingredient->unit}}).</b></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="price">Quantity:</label>
                    <input class="form-control" type="number" name="quantity" value="{{$ingredients->quantity}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="price">Price:</label>
                    <input class="form-control" type="number" name="price" value="{{$ingredients->price}}">
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-1">
            <a href="/" class="btn btn-info btn-circle m-1">
                <i class="fas fa-undo-alt"></i>
            </a>
        </div>
        <div class="col-1">
            <button type="submit" class="btn btn-success btn-circle m-1">
                <i class="fas fa-pencil-alt"></i>
            </button>
        </div>
        </form>
    <div class="col-1">
        <form method="POST" action="/ingredients/{!!$ingredients->id!!}" enctype="multipart/form-data">
            <button type="submit" class="btn btn-danger btn-circle m-1">
                <i class="far fa-trash-alt"></i>
            </button>
            @csrf
        </form>
    </div>
</div>
@endsection
