@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Property Parts</h3>
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Property Parts</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->


        <section class="container-fluid">
              @include('admin.common.alerts')
              <div class="col-md-6">
                @include('admin.quotations.property_parts.components.new_property_parts')
                </div>
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Design Name</th>
                      <th>Status</th>
                      <th>Description</th>

                      <th style="width:20%;">
                          Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($allPropertyParts as $propertyParts)
                        <tr>
                            <td>{{$propertyParts->part_name}}</td>
                            <td><span class="text-white {{$propertyParts->is_active == 1 ? 'bg-success':'bg-danger'}}">{{$propertyParts->is_active == 1 ? 'Active':'Deactive'}}</span></td>
                            <td>{{ $propertyParts->description }}</td>

                            <td>
                            @include('admin.quotations.property_parts.components.edit_property_parts')
                            @include('admin.quotations.property_parts.components.delete_property_parts')
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                     {!! $allPropertyParts->links() !!}
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
