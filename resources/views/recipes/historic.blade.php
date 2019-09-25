@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-info">History of Recipes Made</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <form action="/historic" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-between">
                                    <div class="col-4 col-md-4">
                                            <input type="text" class="form-control" name="dateFrom" id="dateFrom" placeholder="From: 1999-01-01">
                                    </div>
                                    <div class="col-4 col-md-4">
                                            <input type="text" class="form-control" name="dateTo" id="dateTo" placeholder="To: 1999-01-01">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <span class="text">Filter By Date</span>
                                    </button>
                                </div>
                        </form>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 247px;">Recipe</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 116px;">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($historicRecipe[0]) > 0)
                                        @foreach ($historicRecipe[0] as $historic)
                                        <tr role="row" class="odd">
                                            <td>{!!$historic->created_at->format('Y-m-d')!!}</td>
                                            <td>{!!$historic->recipe_name!!}</td>
                                            <td>{!!$historic->total_cost!!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                <h4>Spent total so far: {!!$historicRecipe[1]!!}</h4>
                            </div>
                        </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                    {{ $historicRecipe[0]->links() }}
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
        <p>No Recipes Found</p>
    @endif
@endsection
