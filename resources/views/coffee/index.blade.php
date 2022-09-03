@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Coffee List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{route('coffee.create')}}" style="background-color: #6F4E37;" class="btn btn-success btn-sm mb-2">+ Add Coffee</a>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Bean</th>
                      <th>Type</th>
                      <th>Brew Type</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($coffees as $coffee)
                      <tr>
                        <td>{{$coffee->id}}</td>
                        <td>{{$coffee->name}}</td>
                        <td>{{$coffee->bean}}</td>
                        <td>{{$coffee->types->name}}</td>
                        <td>{{$coffee->brews->name}}</td>
                        <td>{{$coffee->price}}</td>
                        <td>
                          <form action="{{route('coffee.destroy', $coffee)}}" method="POST">
                            @method('DELETE')
                            @csrf
                              <a href="{{route('coffee.edit', $coffee)}}" class="btn btn-sm btn-primary">Edit</a>
                              <a href="{{route('coffee.show', $coffee)}}" class="btn btn-sm btn-secondary">Show</a>
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
