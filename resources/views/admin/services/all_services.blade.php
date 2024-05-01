@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">All Services</h3>
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Services</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->


        <section class="container-fluid">

        <div class="card">
              <div class="card-header">
                @include('admin.common.alerts')
               <div class="row">
                <div class="col-md-6">
                 <a href="{{route('services.new')}}"><button type="button" class="btn btn-primary btn-sm"><i class="ri-add-circle-line align-bottom"></i> Add New Service</button></a>
                </div>
               <div class="col-md-6" style="float:right;">
                    <form action="{{route('services.all')}}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="searchKey" placeholder="Search Services" value="{{$search}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


              </div>
               </div>
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                        <th>Image</th>
                      <th>Service Type</th>
                      <th>Status</th>
                      <th style="width:10%;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($services as $data)
                       <tr>
                           <td>
                               {{$data->name}}
                           </td>
                           <td>
                               <img src="{{asset($data->image)}}" width="100px" alt="">
                           </td>
                           <td>
                               @if($data->service_type==1)
                                   <p>Structural Engineering and Building Control Services</p>
                                   @else
                                   <p>Planning Permissions and Architectural Services</p>
                               @endif
                           </td>


                           <td>
                               @if($data->status)
                                   <span class="badge bg-success">published</span>
                                   @else
                                   <span class="badge bg-warning">unpublished</span>
                               @endif
                           </td>
                           <td>

                              @include('admin.services.components.service_delete')

                              <a href="{{route('services.edit',$data->id)}}">
                                  <button class="btn btn-info btn-sm text-white">
                                      <i class="fa fa-edit"></i> Edit
                                  </button>
                              </a>

                           </td>
                       </tr>
                   @endforeach
                  </tbody>
                </table>

                      {!! $services->links() !!}

                  </div>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              <div class="d-felx justify-content-center">
              </div>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
  </div>

@endsection
