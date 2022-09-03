@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Coffee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('coffee.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coffee Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Americano">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coffee Bean</label>
                    <input type="text" name="bean" class="form-control" id="exampleInputEmail1" placeholder="Arabica">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <select class="form-control" name="type" id="type">
                      @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brew Type</label>
                    <select class="form-control" name="brew" id="brew">
                      @foreach ($brews as $brew)
                        <option value="{{$brew->id}}">{{$brew->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price (RM)</label>
                    <input type="number" name="price" step="any" class="form-control" id="exampleInputEmail1" placeholder="RM 0.00">
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
