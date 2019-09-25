@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-info">Loaded ingredients</h4>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                                <div class="col-sm">
                                    <a href="/ingredients/create" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                          <i class="far fa-edit"></i>
                                        </span>
                                        <span class="text">Upload a New Ingredient</span>
                                    </a>
                                </div>
                            <div class="col-sm">
                                <form action="/" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div id="dataTable_filter" class="dataTables_filter">
                                        <label>Search:
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="ingredient_name" aria-controls="dataTable">
                                        </label>
                                    </div>
                                </form>
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
                                                        <button type="submit" class="btn btn-info btn-circle">
                                                            <i class="fas fa-info"></i>
                                                        </button>
                                                    </form>
                                                    <form method="GET" action="/ingredients/edit/{!!$ingredient->id!!}" enctype="multipart/form-data">
                                                        <button type="submit" class="btn btn-success btn-circle">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                    <form method="POST" action="/ingredients/{!!$ingredient->id!!}" enctype="multipart/form-data">
                                                        <button type="submit" class="btn btn-danger btn-circle">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
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
