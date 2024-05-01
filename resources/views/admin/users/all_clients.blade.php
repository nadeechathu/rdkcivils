@extends('admin.layouts.app')

@section('content')

<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Registered Clients</h3>

          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Registered Clients</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->


        <section class="container-fluid">

        <div class="card">
              <div class="card-header">
                @include('admin.common.alerts')
               <div class="row">
                 <div class="col-md-6"></div>
               <div class="col-md-6" style="float:right;">
                <form action="{{route('clients.all')}}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="searchKey" placeholder="First Name / Last Name / Email / Phone" value="{{$searchKey}}">
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
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Role</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($clients as $user)
                    <tr>
                      <td>
                        {{$user->first_name}} <br>
                        <span class="badge bg-dark">Registered On - {{explode(' ',$user->created_at)[0]}}</span>
                      </td>
                      <td>{{$user->last_name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->phone}}</td>
                      <td>
                        @if ($user->status == 1)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-danger">Inactive</span>
                        @endif
                        <br>
                        @if ($user->is_approved == 1)
                        <span class="badge bg-success">Approved</span>
                        @else
                        <span class="badge bg-danger">Not Approved</span>
                        @endif
                      </td>
                      <td>{{$user->role->role_name}}</td>
                      <td>

                        @if (Auth::user()->hasPermission('edit_clients'))

                            @include('admin.users.components.edit_client_modal')

                            @include('admin.users.components.activate_deactivate')
                        
                        @endif 
                         
                        @if (Auth::user()->hasPermission('approve_clients'))

                            @if ($user->is_approved == 0)

                                @include('admin.users.components.client_approval')

                            @endif

                        
                        @endif                      

                      </td>


                    </tr>
                    @endforeach

                  </tbody>
                </table>

                  </div>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              <div class="d-felx justify-content-center">

              {{ $clients->links() }}

              </div>
                  </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
  </div>



@endsection
