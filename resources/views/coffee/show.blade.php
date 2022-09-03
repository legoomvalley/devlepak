@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Coffee Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('coffee.update',  $coffee)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coffee Name</label>
                    <input type="text" name="name" class="form-control" value="{{$coffee->name}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coffee Bean</label>
                    <input type="text" name="bean" class="form-control" value="{{$coffee->bean}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <input class="form-control" value="{{$coffee->types->name}}" disabled>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brew Type</label>
                    <input class="form-control" value="{{$coffee->brews->name}}" disabled>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price (RM)</label>
                    <input type="number" name="price" step="any" value="{{$coffee->price}}" class="form-control" disabled>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('coffee.index')}}" class="btn btn-secondary">Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
