@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Username" value="{{$user->name}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="test@mail.com" value="{{$user->email}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="*********" disabled>
                  </div>

                  <label for="exampleInputEmail1">Roles</label>
                  @foreach($roles as $role)
                  <div class="form-check">
                    <input class="form-check-input" value="{{ $role }}" type="checkbox" name="roleUser[]" id="flexCheckDefault" checked disabled>
                    <label>
                      {{ $role }}
                    </label>
                  </div>
                  @endforeach
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('user.index')}}" class="btn btn-secondary">Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
