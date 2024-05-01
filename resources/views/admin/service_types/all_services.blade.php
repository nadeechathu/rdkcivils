@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Services Type</h3>

          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
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
                  <div class="col-md-12 text-start">
                    @include('admin.service_types.components.new_service_type')
                  </div>
                </div>
               </div>


              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="w-25">Image</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>


                  @isset($serviceTypes)
                    @if($serviceTypes->count() > 0)

                       @foreach($serviceTypes as $data)

                           <tr>
                              <td>
                                    <img src="{{asset($data->image)}}" class="w-100" alt="{{$data->name}}">
                               </td>
                               <td>{{$data->name}}</td>

                               <td>
                                   @if($data->status == 1)
                                       <span class="badge bg-success">Published</span>
                                   @else
                                       <span class="badge bg-danger">Not Published</span>
                                   @endif
                               </td>
                               <td>
                                   {!! $data->description !!}
                               </td>
                               <td>
                               @include('admin.service_types.components.edit_service_type')
                               @include('admin.service_types.components.service_type_delete')
                               </td>

                           </tr>

                       @endforeach

                    @endif
                  @endisset




                  </tbody>
                </table>

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



