@extends('layouts.app')

@section('content')
    <br>
    <a href="/ingredients/create" class="btn btn-outline-primary">Upload a New Ingredient</a>
    <br>
    <br>
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
                    @if(count($ingredient_list) >0)
                        @foreach ($ingredient_list as $ingredient)
                            <tr>
                                <td>{!!$ingredient->available_ingredient->name!!}</td>
                                <td>{!!$ingredient->quantity!!}</td>
                                <td>
                                   <div class="btn-group btn-group-sm">
                                       <form action="/ingredients/show/{!!$ingredient->id!!}" method="GET">
                                           <button type="submit" class="btn btn-outline-primary">View</button>
                                       </form>
                                       <form method="GET" action="/ingredients/edit/{!!$ingredient->id!!}"
                                       enctype="multipart/form-data">
                                           <button type="submit" class="btn btn-outline-success">Edit</button>
                                           @csrf
                                       </form>
                                       <form method="POST" action="/ingredients/{!!$ingredient->id!!}"
                                       enctype="multipart/form-data">
                                           <button type="submit" class="btn btn-outline-danger">Delete</button>
                                           @csrf
                                       </form>
                                     </div>
                                 </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
                {{ $ingredient_list->links() }}
          <br>
        @else
            <p>No Ingredients found</p>
        @endif
@endsection
