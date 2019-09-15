@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h4><div class="card-header">Filter Table</div></h4>
            <form action="/historic" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dateFrom">From</label>
                        <input type="text" class="form-control" name="dateFrom" id="dateFrom" placeholder="1999-01-01">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dateTo">To</label>
                        <input type="text" class="form-control" name="dateTo" id="dateTo" placeholder="1999-01-01">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success">Send</button>
            </form>
    </div>
    <br>
        <table class="table table-hover">
            <h4><div class="card-header">Used Recipes</div></h4>
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Recipe</th>
                        <th scope="col">Cost</th>
                    </tr>
                </thead>
            <tbody>
                @if(count($historicRecipe[0]) > 0)
                    @foreach ($historicRecipe[0] as $historic)
                        <tr>
                        <td>{!!$historic->created_at->format('Y-m-d')!!}</td>
                        <td>{!!$historic->recipe_name!!}</td>
                        <td>{!!$historic->total_cost!!}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    <h4>Spent total so far: {!!$historicRecipe[1]!!}</h4>
    <br>
    {{ $historicRecipe[0]->links() }}
    <br>
    @else
    <p>No Recipes Found</p>
    @endif

@endsection
