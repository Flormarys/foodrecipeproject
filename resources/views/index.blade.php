@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Loaded ingredients</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="/ingredients/create" class="btn btn-outline-info">Upload a New Ingredient</a>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div id="dataTable_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 247px;">Quantity</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 116px;">Actions</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @if(count($ingredient_list) >0)
                                        @foreach ($ingredient_list as $ingredient)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{!!$ingredient->available_ingredient->name!!}</td>
                                            <td>{!!$ingredient->quantity!!}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <form action="/ingredients/show/{!!$ingredient->id!!}" method="GET">
                                                        <button type="submit" class="btn btn-outline-info">View</button>
                                                    </form>
                                                    <form method="GET" action="/ingredients/edit/{!!$ingredient->id!!}" enctype="multipart/form-data">
                                                        <button type="submit" class="btn btn-outline-success">Edit</button>
                                                        @csrf
                                                    </form>
                                                    <form method="POST" action="/ingredients/{!!$ingredient->id!!}" enctype="multipart/form-data">
                                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination">
                                        {{ $ingredient_list->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <p>No Ingredients found</p>
    @endif
@endsection
