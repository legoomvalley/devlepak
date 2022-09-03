@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Brew Method Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('brew.update', $brew)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coffee Name</label>
                    <input type="text" name="name" class="form-control" value="{{$brew->name}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Temperature (Celcius)</label>
                    <input type="number" name="temperature" step="any" class="form-control" value="{{$brew->temperature}}" disabled>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('brew.index')}}" class="btn btn-secondary">Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
