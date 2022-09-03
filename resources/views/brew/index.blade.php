@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Brew List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{route('brew.create')}}" style="background-color: #6F4E37;" class="btn btn-success btn-sm mb-2">+ Add Brew Method</a>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Temperature</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($brews as $brew)
                      <tr>
                        <td>{{$brew->id}}</td>
                        <td>{{$brew->name}}</td>
                        <td>{{$brew->temperature}}</td>
                        <td>
                        <form action="{{route('brew.destroy', $brew)}}" method="POST">
                            @method('DELETE')
                            @csrf
                              <a href="{{route('brew.edit', $brew)}}" class="btn btn-sm btn-primary">Edit</a>
                              <a href="{{route('brew.show', $brew)}}" class="btn btn-sm btn-secondary">Show</a>
                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="3" class="text-center">No data</td>
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
