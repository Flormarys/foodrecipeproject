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
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
            </a>
        </div>
        <div class="col-1">
            <button type="submit" class="btn btn-success btn-circle ">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
            </button>
        </div>
        </form>
    <div class="col-1">
        <form method="POST" action="/ingredients/{!!$ingredients->id!!}" enctype="multipart/form-data">
            <button type="submit" class="btn btn-danger btn-circle">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
            </button>
            @csrf
        </form>
    </div>
</div>
@endsection
