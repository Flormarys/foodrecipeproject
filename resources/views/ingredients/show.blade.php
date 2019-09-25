@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-info">Ingredient</h4>
                </div>
                <div class="card-body">
                    <p><b>Product Name:</b> {!!$ingredient_info->available_ingredient->name!!}</p>
                    <p><b>Price:</b> {!!$ingredient_info->price!!}</p>
                    <p><b>Quantity:</b> {!!$ingredient_info->quantity!!}</p>
                    <p><b>Unit:</b> {!!$ingredient_info->available_ingredient->unit!!}</p>
                </div>
    </div>

            <hr>
                <small>Last update {{$ingredient_info->updated_at}}</small>
            <hr>
            <div class="row">
                <div class="col-1">
                    <a href="/" class="btn btn-info btn-circle m-1">
                        <i class="fas fa-undo-alt"></i>
                    </a>
                </div>
                <div class="col-1">
                    <form method="GET" action="/ingredients/edit/{!!$ingredient_info->id!!}" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-success btn-circle m-1">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        @csrf
                    </form>
                </div>
                <div class="col-1">
                    <form method="POST" action="/ingredients/{!!$ingredient_info->id!!}" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-danger btn-circle m-1">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        @csrf
                    </form>
                </div>
            </div>
@endsection
