@extends('admin.admin')
@section('content')

<div class="content-wrapper">
    <div class="content-header">

    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="event-details-wrapper">
                                <div class="event-detail-form-wrap">
                                    <form name="myForm" method="post" action="{{url('/uploadchef')}}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="general-info-wrap">
                                                    <!-- Heading -->
                                                    <div class="section-heading-wrap clearfix">
                                                        <div class="heading-wrappper">
                                                            <div class="heading-wrap">
                                                                <h1 class="heading-title">
                                                              <span class="bg-icon">
                                                                <i class="fa fa-info" aria-hidden="true"></i>
                                                              </span>General Info
                                                                </h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Heading -->
                                                    <div class="event-details">
                                                        <div class="form-group db-form-group">
                                                            <label for="inputEventTitle">Name</label>
                                                            <input  name="name" type="text" class="form-control" id="inputEventTitle"
                                                                   placeholder="Name" required>
                                                        </div>
                                                        <div class="form-group db-form-group">
                                                            <label for="inputEventSlug">Speciality</label>
                                                            <input  id="event_slug" name="speciality" type="text" class="form-control"
                                                                      placeholder="Speciality" required>
                                                        </div>
                                                        <div class="form-group db-form-group">
                                                            <label for="inputtype">Image</label>
                                                            <input  id="event_type" name="image" type="file" class="form-control"
                                                                   placeholder="Image" required>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"></div>
                                            <div class="col-6">
                                                <button type="submit" class="float-right btn btn-lg bg-black db-button my-4 py-2">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class="table events-table">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Chef Name</th>
                                    <th>Speciality</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($foodchefs) < 1)
                                        <tr class="text-center">
                                            <td colspan="8">Data not found!!</td>
                                        </tr>
                                    @endif
                                    @foreach($foodchefs as $foodchef)
                                    <tr>
                                        <td class="text-center">
                                            <div class="client-img-wrap" >
                                            <img style="width: auto;
                                            max-width: 238%;  class="img-fluid" src="/chefimage/{{$foodchef->image}}">
                                            </div>
                                        </td>
                                        <td>{{ $foodchef->name }}</td>
                                        <td>{{ $foodchef->speciality }}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure!!')" href="{{url('/deletechef',$foodchef->id)}}">
                                                Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{url('/updatechefview',$foodchef->id)}}">Update</a>
                                        </td>
                                        
                                    </tr>
                                   @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection