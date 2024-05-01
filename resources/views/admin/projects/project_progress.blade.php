@extends('admin.layouts.app')

@section('content')
<div>
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <h3 class="m-0">Project Status Update - {{$project->title}}</h3>
            </nav>
            <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project Status Update</li>
                </ol>
            </div>
        </div>
    </div> <!-- / Breadcrumbs-->


    <section class="container-fluid">

        <div class="card">
            <div class="card-header">
                @include('admin.common.alerts')
                <div class="row">
                    <div class="col-md-6">
                        @include('admin.projects.components.new_progress_record')
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
                                <th style="width:50%">Task</th>
                                <th>Status</th>
                                <th style="width:13%;">Completed On</th>
                                <th style="width:12%;">Updated On</th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projectProgress as $progressData)
                            <tr>
                                <td>
                                    {{$progressData->task}}
                                </td>
                                <td>
                                    @if($progressData->progressStatus != null)
                                    <span class="badge bg-warning">{{$progressData->progressStatus->status_name}}</span>
                                    @endif

                                </td>
                                <td>
                                    @if($progressData->completed_on != null)
                                    {{explode(' ',$progressData->completed_on)[0]}}
                                    @else
                                    N/A
                                    @endif

                                </td>
                                <td>
                                    {{explode(' ',$progressData->created_at)[0]}}
                                </td>
                                <td>
                                    @include('admin.projects.components.edit_progress_record')
                                    @include('admin.projects.components.remove_progress_record')
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $projectProgress->links() !!}
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