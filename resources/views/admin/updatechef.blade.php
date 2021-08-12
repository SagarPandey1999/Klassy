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
                                    <form name="myForm" method="post" action="{{url('/updatefoodchef',$foodchef->id)}}"  enctype="multipart/form-data">
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
                                                              </span>Edit General Info
                                                                </h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Heading -->
                                                    <div class="event-details">
                                                        <div class="form-group db-form-group">
                                                            <label for="inputEventTitle">Name</label>
                                                            <input  name="name" type="text" class="form-control" id="inputEventTitle"
                                                                   placeholder="Name" value="{{$foodchef->name}}" required>
                                                        </div>
                                                        <div class="form-group db-form-group">
                                                            <label for="inputEventSlug">Speciality</label>
                                                            <input  id="event_slug" name="speciality" type="text" class="form-control"
                                                                      placeholder="Speciality" value="{{$foodchef->speciality}}" required>
                                                        </div>
                                                        <div class="form-group db-form-group">
                                                            <label for="inputtype">New Image</label>
                                                            <input  id="event_type" name="image" type="file" class="form-control"
                                                                   placeholder="Image">
                                                        </div>
                                                        <div class="form-group db-form-group">
                                                            <label for="inputtype">Old Image</label>
                                                            <img height="200" width="200" src="/chefimage/{{$foodchef->image}}"> 
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection