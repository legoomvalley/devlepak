@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Brew Method</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('brew.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coffee Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Cold Brew">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Temperature (Celcius)</label>
                    <input type="number" name="temperature" class="form-control" id="exampleInputEmail1" placeholder="0">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
