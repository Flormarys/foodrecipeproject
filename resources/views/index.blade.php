@extends('layouts.app')

@section('content')

    <table class="table table-hover">
            <h4><div class="card-header">Ingredients</div></h4>
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($ingredient_info) >0)
                        @foreach ($ingredient_info as $ingredient)
                            <tr>
                                <td>{!!$ingredient->available_ingredient->name!!}</td>
                                <td>{!!$ingredient->quantity!!}</td>
                                <td></td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
          <br>
        @else
            <p>No Ingredients found</p>
        @endif

@endsection
