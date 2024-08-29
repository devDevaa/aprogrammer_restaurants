@extends('layouts.master')

@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class="user-panel d-flex justify-content-end ">
                <div class="image">
                  <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block text-dark ">{{ Auth::user()->name }}</a>
                </div>
              </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- card --}}
            <div class="card">
                <div class="card-header row d-flex  row align-items-center ">
                  <h3 class="card-title col-2 ">Edit Dish</h3>
                  <a href="/dish" class="btn btn-dark offset-9 col-1">Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/dish/{{$dish->id}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="dish" class="form-label">Dish Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $dish->name) }}" id="dish" aria-describedby="emailHelp" placeholder="Enter dish name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cate" class="form-label">Choose Category</label>
                            <select class="form-select form-control @error('category_id') is-invalid @enderror" name="category_id" id="cate" aria-label="Default select example">
                                <option>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $dish->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Dish image</label> <br>
                            <img class="img-thumbnail w-50 " src="{{ url('/images/' . $dish->dish_image) }}" alt="" >
                            <input class="form-control @error('dish_image') is-invalid @enderror" type="file" name="dish_image" id="image">
                            @error('dish_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->







@endsection
