@extends('layouts.app')

@section('content')

  <div class="jumbotron">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">Edit user</div>
                <div class="card-body">

                {!! Form::open(['action' => ['UserController@update'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group row">
                  <div class="col-md-4 col-form-label text-md-right">
                    {{Form::label('title', 'User Name')}}
                  </div>
                  <div class="col-md-6">
                    {{Form::text('name', $user->name, ['type' => 'text','class' => 'form-control'] )}}
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-4 col-form-label text-md-right">
                    {{Form::label('title', 'User Email')}}
                  </div>
                  <div class="col-md-6">
                    {{Form::text('email', $user->email, ['type' => 'email', 'class' => 'form-control'] )}}
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-4 col-form-label text-md-right" for="password">
                    {{Form::label('title', 'Password')}}
                  </div>
                  <div class="col-md-6" for="password">
                    {{Form::text('password', '', ['type' =>'password', 'for' =>'password', 'class' => 'form-control'] )}}
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-4 col-form-label text-md-right" for="password">
                    {{Form::label('title', 'New Password')}}
                  </div>
                  <div class="col-md-6" for="password">
                    {{Form::text('newpassword', '', ['type' =>'password', 'for' =>'password', 'class' => 'form-control'] )}}
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-4 col-form-label text-md-right">
                    {{Form::label('title', 'Confirm Password')}}
                  </div>
                  <div class="col-md-6">
                    {{Form::text('password_confirmation', '', ['type' =>'password', 'class' => 'form-control'] )}}
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-4 col-form-label text-md-left">
                    <a href="/" class="btn btn-outline-primary">Go Back</a>
                  </div>
                  <div class="col-md-4 col-form-label text-md-right">
                    {{Form::submit('Submit', ['class'=>"btn btn-outline-success"])}}
                    {!!Form::close() !!}
                  </div>
                </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
