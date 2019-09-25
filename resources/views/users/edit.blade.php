@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-info">Edit User</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <form method="POST" action="/users/update" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">User Name</label>
                                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">User Email</label>
                                    <input class="form-control" type="email" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Password</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="title">New Password</label>
                                <input class="form-control" type="password" name="newpassword">
                            </div>
                            <div class="form-group">
                                <label for="title">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1">
            <button type="submit" class="btn btn-success btn-circle m-1">
                <i class="fas fa-pencil-alt"></i>
            </button>
        </div>
        <div class="col-1">
            <a href="/" class="btn btn-info btn-circle m-1">
                <i class="fas fa-undo-alt"></i>
            </a>
        </div>
    </div>
</form>
<br>
<br>
@endsection
