@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">All Projects</h3>
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Projects</li>
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
                 <a href="{{route('project.create')}}"><button type="button" class="btn btn-primary btn-sm"><i class="ri-add-circle-line align-bottom"></i> Add New Project</button></a>
                </div>
               <div class="col-md-6" style="float:right;">
                   <form action="{{route('project.index')}}" method="get">
                       <div class="input-group">
                           <input type="search" class="form-control" name="searchKey" placeholder="Search Projects" value="" required>
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
               </div>
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Location</th>
                      <th>Budget</th>
                      <th>Status</th>
                      <th style="width:20%;">
                          Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                         @foreach($projects as $data)
                             <tr>
                                 <td>
                                     {{$data->title}}
                                 </td>
                                 <td>


                                     @if($data->location != null)
                                     {{$data->location}}
                                     @else
                                  -
                                 @endif
                                 </td>
                                 <td>
                                    @if($data->budget != null)
                                     {{$data->budget}}
                                     @else
                                  -
                                 @endif

                                 </td>
                                 <td>
                                     @if($data->status == 0)
                                     <span class="badge bg-danger">Inactive</span>
                                     @else
                                     <span class="badge bg-success">Active</span>
                                     @endif
                                 </td>
                                 <td>



                                     <a href="{{route('project.edit',$data)}}">
                                         <button class="btn btn-info btn-sm text-white">
                                             <i class="fa fa-edit"></i> Edit
                                         </button>
                                     </a>
                                     @include('admin.projects.components.project_delete')

                                     <a href="{{route('project.progress.get',['id' => $data->id])}}">
                                         <button class="btn btn-dark btn-sm text-white">
                                         <i class="fa fa-check"></i> Progress
                                         </button>
                                     </a>
                                     
                                 </td>
                             </tr>
                         @endforeach
                  </tbody>
                </table>
                      {!! $projects->links() !!}
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
