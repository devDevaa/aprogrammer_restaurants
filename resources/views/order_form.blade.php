<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>apro_res | order panal</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
</head>

<body>
    <div class="row">
        <div class="col-12 my-3 ">
            <h4 class="text-center ">
                Order Panal
            </h4>
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <p class="text-success">{{ session('success') }}</p>
        @endif
    </div>

    <div class=" container ">
        <div class="col-12 ">
            <div class="card card-dark border-1  border  card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs mx-3 " id="custom-tabs-two-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill"
                                href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home"
                                aria-selected="true">New Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill"
                                href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile"
                                aria-selected="false">Order List</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel"
                            aria-labelledby="custom-tabs-two-home-tab">

                            <form action="{{ route('order.submit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @foreach ($dishes as $dish)

                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img class="img-thumbnail w-75 " src="{{ url('/images/' . $dish->dish_image) }}" alt="" >
                                                    <p class="card-text pt-2"> Dish : {{ $dish->name }}</p>
                                                    <p class="card-text"> Category : {{ $dish->category->name }}</p>
                                                    <input type="number" class="form-control " name="{{ $dish->id }}" value="" >
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label for="table">Select table number</label>
                                    <select name="table" id="table" class="form-control">
                                        @foreach ($tables as $table)
                                            <option value="{{ $table->id }}">{{ $table->number }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="submit" value="Submit" class="btn btn-dark ">

                            </form>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-two-profile-tab">

                            <table class="table table-bordered table-striped">
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
                                            <a href="/order/{{ $order->id }}/serve" class="btn btn-dark" >Serve</a>
                                        </div>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="/plugin/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
</body>

</html>
