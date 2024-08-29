@extends('layouts.master')

@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders Page</h1>
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
                  <h3 class="card-title col-2 ">Order Listing</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="dishes" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Dish name</th>
                      <th>Table number</th>
                      <th>Order Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($orders as $order)
                      <tr>
                        <td>{{ $order->dishes->name }}</td>
                        <td>{{ $order->table_id }}</td>
                        <td>{{ $status[$order->status] }}</td>
                        <td>
                            <div class="form-row">
                                <a href="/order/{{ $order->id }}/approve" class="btn btn-warning" >Approve</a>
                                <a href="/order/{{ $order->id }}/cancel" class="btn btn-danger mx-3 " >Cancel</a>
                                <a href="/order/{{ $order->id }}/ready" class="btn btn-dark" >Ready</a>
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
