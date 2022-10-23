@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{route('user.create')}}" style="background-color: #6F4E37;" class="btn btn-success btn-sm mb-2">+ Add User</a>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Roles</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        @foreach ($user->roles->pluck('name') as $role)
                        {{$role}}@if(!$loop->last),@endif
                        @endforeach
                        </td>
                        <td>
                          <form action="{{route('user.destroy', $user)}}" method="POST">
                            @method('DELETE')
                            @csrf
                              <a href="{{route('user.edit', $user)}}" class="btn btn-sm btn-primary">Edit</a>
                              <a href="{{route('user.show', $user)}}" class="btn btn-sm btn-secondary">Show</a>
                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="7" class="text-center">No data</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
