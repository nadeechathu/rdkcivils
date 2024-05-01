@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">All Inquiries</h3>
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Inquiries</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->


        <section class="container-fluid">
              @include('admin.common.alerts')
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Client Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Subject</th>
                      <th style="width:20%;">
                          Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($inquiries as $inquiry)
                        <tr>
                            <td>{{$inquiry->first_name}} {{$inquiry->last_name}} <br> <span class="badge bg-info">Received on - {{$inquiry->created_at}}</span></td>
                            <td>{{$inquiry->email}}</td>
                            <td>{{$inquiry->phone}}</td>
                            <td>{{$inquiry->subject}}</td>
                            <td>
                               @include('admin.inquiries.components.view_message')
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                     {!! $inquiries->links() !!}
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
