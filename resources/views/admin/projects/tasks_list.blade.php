@extends('admin.layouts.app')

@section('content')
<div>
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <h3 class="m-0">Project Tasks List</h3>
            </nav>
            <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project Tasks List</li>
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
                        @include('admin.projects.components.new_task')
                    </div>
                    <div class="col-md-6" style="float:right;">
                        <form action="{{route('project.tasks')}}" method="get">
                            <div class="input-group">
                                <input type="search" class="form-control" name="searchKey" placeholder="Search Task" value="{{$searchKey}}" required>
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
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $taskRec)
                            <tr>
                                <td>
                                    {{$taskRec->task}}
                                </td>
                                <td>
                                    @if($taskRec->status == 0)

                                    <span class="badge bg-danger">Inactive</span>

                                    @else
                                    <span class="badge bg-success">Active</span>
                                    @endif

                                </td>
                               
                                <td>
                                    @include('admin.projects.components.edit_task')
                                    @include('admin.projects.components.remove_task')
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $tasks->links() !!}
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