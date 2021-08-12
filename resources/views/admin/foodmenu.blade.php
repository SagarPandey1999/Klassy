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
                                    <form name="myForm" method="post" action="{{url('/uploadfood')}}"  enctype="multipart/form-data">
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
                                                            <label for="inputEventTitle">Title</label>
                                                            <input  name="title" type="text" class="form-control" id="inputEventTitle"
                                                                   placeholder="Title" required>
                                                        </div>
                                                        <div class="form-group db-form-group">
                                                            <label for="inputEventSlug">Price</label>
                                                            <input  id="event_slug" name="price" type="number" class="form-control"
                                                                      placeholder="Price" required>
                                                        </div>
                                                        <div class="form-group db-form-group">
                                                            <label for="inputtype">Image</label>
                                                            <input  id="event_type" name="image" type="file" class="form-control"
                                                                   placeholder="Image" required>
                                                        </div>
                                                        <div class="form-group db-form-group">
                                                            <label for="inputtype">Description</label>
                                                            <input  id="event_type" name="description" type="text" class="form-control"
                                                                   placeholder="Description" required>
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
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($foods) < 1)
                                        <tr class="text-center">
                                            <td colspan="8">Data not found!!</td>
                                        </tr>
                                    @endif
                                    @foreach($foods as $food)
                                    <tr>
                                        <td class="text-center">
                                            <div class="client-img-wrap" >
                                            <img style="width: auto;
                                            max-width: 238%;  class="img-fluid" src="/foodimage/{{$food->image}}">
                                            </div>
                                        </td>
                                        <td>{{ $food->title }}</td>
                                        <td>{{ $food->price }}</td>
                                        <td>{{ $food->description }}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure!!')" href="{{url('/deletefoodmenu',$food->id)}}">
                                                Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/updateview',$food->id) }}">Update</a>
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