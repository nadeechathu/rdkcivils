@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Customer Quotations</h3>
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Customer Quotations</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->


        <section class="container-fluid">

              <div class="col-md-6">

                </div>
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Reference Id</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>email</th>
                      <th>contact</th>
                      <th>Type</th>
                      <th>Date</th>
                      <th>Time</th>


                      <th style="width:10%;">
                          Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($loadQuotations as $quotation)
                        <tr>
                            <td>
                              {{$quotation->reference_id}}
                              <br>
                              <span class="badge bg-danger">{{$quotation->created_at}}</span>
                            </td>
                            <td>{{$quotation->first_name}}</td>
                            <td>{{$quotation->last_name}}</td>
                            <td>{{$quotation->email}}</td>
                            <td>{{$quotation->contact}}</td>
                            <td>{{$quotation->quotation_type !== 1 ? 'Booking' : 'Quotation'}}</td>
                            <td>{{$quotation->date ?? 'N/A'}}</td>
                            <td>{{$quotation->time ?? 'N/A'}}</td>


                            <td>
                                @include('admin.quotations.all_quotations.components.quotation_preview')

                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                     {!! $loadQuotations->links() !!}
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
