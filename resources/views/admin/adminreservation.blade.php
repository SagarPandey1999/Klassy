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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Guest</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Message</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->email }}</td>
                                        <td>{{ $reservation->phone }}</td>
                                        <td>{{ $reservation->guest }}</td>
                                        <td>{{ $reservation->date }}</td>
                                        <td>{{ $reservation->time }}</td>
                                        <td>{{ $reservation->message }}</td>
                                        
                                        
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