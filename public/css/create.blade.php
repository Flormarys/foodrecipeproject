@extends('layouts.app')

@section('content')
  <div class="jumbotron">
      <h2>Creating a Property</h2>
  {!! Form::open(['action' => 'PropertyController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  <form>
    <div class="form-row">
      <div class="form-group col-md-6">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'] )}}
      </div>
      <div class="form-group col-md-6">
        {{Form::label('title', 'Address')}}
        {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => '1234 Main St'] )}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('title', 'Description')}}
      {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'description about the properties'] )}}
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        {{Form::label('title', 'Dimensions')}}
        {{Form::number('dimension', '', ['class' => 'form-control', 'placeholder' => 'Total m²'] )}}
      </div>
      <div class="form-group col-md-4">
        {{Form::label('title', 'Number of Rooms')}}
        {{Form::number('room', '', ['class' => 'form-control', 'placeholder' => 'How many rooms'] )}}
      </div>
      <div class="form-group col-md-2">
        {{Form::label('title', 'Floor')}}
        {{Form::number('floor', '', ['class' => 'form-control', 'placeholder' => 'Floor number'] )}}
      </div>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          {{Form::label('title', 'Province')}}
          {{Form::text('province', '', ['class' => 'form-control', 'placeholder' => 'Province'] )}}
        </div>
        <div class="form-group col-md-4">
          {{Form::label('title', 'Price')}}
          {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price to real state'] )}}
        </div>
        <div class="form-group col-md-2">
          {{Form::label('title', 'Charge')}}
          {{Form::text('charge', '', ['class' => 'form-control', 'placeholder' => 'Price to public'] )}}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          {{Form::label('title', 'Commercial Status')}}
          {{Form::select('commercial_status', array('1' => 'For Sale', '0' => 'For Rent'))}}
        </div>
        <div class="form-group col-md-6">
          {{Form::label('title', 'Status')}}
          {{Form::select('status', array('1' => 'Active', '0' => 'Inactive'))}}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          {{Form::label('title', 'First photo')}}
          {{Form::file('photo_one')}}
        </div>
        <div class="form-group col-md-4">
          {{Form::label('title', 'Second photo')}}
          {{Form::file('photo_two')}}
        </div>
        <div class="form-group col-md-4">
          {{Form::label('title', 'Third photo')}}
          {{Form::file('photo_three')}}
        </div>
      </div>
      <div class="form-group">
        {{Form::submit('Submit', ['class'=>"btn btn-outline-primary"])}}
      {!!Form::close() !!}
      </div>
  </form>
@endsection
