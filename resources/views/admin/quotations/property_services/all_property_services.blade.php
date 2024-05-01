@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Property Services</h3>
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Property Services</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->


        <section class="container-fluid">
              @include('admin.common.alerts')
              <div class="col-md-6">
              @include('admin.quotations.property_services.components.new_property_service')
                </div>
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Service Name</th>
                      <th>Status</th>
                      <th>Description</th>

                      <th style="width:20%;">
                          Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($allServices) > 0)
                      @foreach($allServices as $service)
                        <tr>
                            <td>{{$service->property_service_name}}</td>
                            <td><span class="text-white {{$service->is_active == 1 ? 'bg-success':'bg-danger'}}">{{$service->is_active == 1 ? 'Active':'Deactive'}}</span></td>
                            <td>{{ $service->description }}</td>

                            <td>
                            @include('admin.quotations.property_services.components.edit_property_service')
                            @include('admin.quotations.property_services.components.delete_property_service')
                            </td>
                        </tr>
                      @endforeach
                     @endif
                  </tbody>
                </table>
                     {!! $allServices->links() !!}
                  </div>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              <div class="d-felx justify-content-center">
              </div>
              </div>
              <!-- /.card-footer-->
        </section>
</div>

@endsection
