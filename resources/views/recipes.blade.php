@extends('layouts.app')

@section('content')

    <table class="table table-hover">
            <h4><div class="card-header">Ingredients</div></h4>
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($listingRecipes) > 0)
                        @foreach ($listingRecipes as $recipes)
                            <tr>
                                <td>{!!$recipes->title!!}</td>
                                <td></td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
          <br>
        @else
            <p>No Recipes found</p>
        @endif

@endsection
