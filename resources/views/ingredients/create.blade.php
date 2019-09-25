@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-info">Upload a New Ingredient</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <form method="POST" action="/ingredients/create" enctype="multipart/form-data">
                        @csrf
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
                            <div class="form-group col-sm-6">
                                <label for="price">Quantity:</label>
                                <input class="form-control" type="number" name="quantity">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="price">Price:</label>
                                <input class="form-control" type="number" name="price">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success btn-circle m-1">
        <i class="fas fa-pencil-alt"></i>
    </button>
</form>
@endsection
