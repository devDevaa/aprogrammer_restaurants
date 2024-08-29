@extends('layouts.master')

@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dishes Page</h1>
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

        @if (session('success'))
            <p class="text-success">{{ session('success') }}</p>
        @endif

        <div class="row">
            <div class="col-12">
                {{-- card --}}
            <div class="card">
                <div class="card-header d-flex row align-items-center ">
                  <h3 class="card-title col-2 ">Dishes</h3>
                  <a href="dish/create" class="btn btn-dark col-2 offset-8 ">Create Dish</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="dishes" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Dish name</th>
                      <th>Category</th>
                      <th>Created_at</th>
                      <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($dishes as $dish)
                      <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->category->name }}</td>
                        <td>{{ $dish->created_at }}</td>
                        <td>
                            <div class="form-row">
                                <a href="/dish/{{ $dish->id }}/edit" class="btn btn-dark" style="height: 40px; margin-right: 10px;">Edit</a>
                                <form action="/dish/{{ $dish->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this dish?');">Delete</button>
                                </form>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
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

<script src="/plugins/jquery/jquery.min.js"></script>

<script>
    $(function () {
        $('#dishes').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        // "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
