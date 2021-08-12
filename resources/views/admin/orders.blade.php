@extends('admin.admin')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="db-btn-wrap">
                        <div class="db-btn-group">
                            {{-- <a href="{{ route('organization_create') }}" class="btn btn-sm db-btn-red db-button">Create Organization</a> --}}
                            <div class="col-6">
                            <form action="{{url('/search')}}" method="get" >
                                @csrf
                            <input type="text" class="form-control" placeholder="Search" name="search" style="color:blue">
                            <button class="btn btn-success" type="submit">Search</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body px-0">
                            {{--                                @include('layouts.flash')--}}
                            <table class="table events-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>FoodName</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->foodname }}</td>
                                        <td>{{ $order->price }}$</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{$order->price * $order->quantity}}$</td>
                                        
                                        
                                    </tr>
                                   @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection