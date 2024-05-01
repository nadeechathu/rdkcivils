@extends('client_portal.layouts.app')
@section('content')

<style>
@media print {
    .btn {
        display: none;
    }
    .doc-title {
        display: none;
    }
    .doc-table {
        display: none;
    }
}

.progress {
    width: 200px;
}
</style>

<div class="container-flluid my-5">
    <div class="container client-portal-drop-shadow">    
        <div class="row">
            <div class="col-md-12">
                @include('client_portal.common.alerts')
            </div>
        </div>
        <div class="row">

          <div class="col-md-6 text-start">
          <h3>{{$project->title}}</h3>
          <div class="row py-3">
                <div class="col-3">
                    Project Completion
                </div>
                <div class="col-4 progress" style="margin: 0; padding: 0;">
                    <div class="progress-bar" role="progressbar" style="width: {{ $completePercentage }}%;" aria-valuenow="{{ $completePercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="col-5">
                    {{ $completePercentage ?? '' }}%
                </div>
            </div>
          
          @include('client_portal.projects.components.project_description_view')
          </div>
          <div class="col-md-6 text-lg-end">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('clients.dashboard')}}"><button class="btn btn-dark mb-3 my-2" type="button"><i class="fa fa-arrow-left"></i> Back To Dashboard</button></a>
                </div>
            </div>
            <h6>Location - {{$project->location}}</h6>
            <h6 class="mt-2">Budget - £ {{$project->budget}}</h6><br>
            <button id="printButton" class="btn btn-primary">Print</button>
          </div>
           
           
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="mt-2">Project Start Date - {{$project->project_start_date}}</p>
                <p class="mt-2">Planned Project End Date - {{$project->project_end_date}}</p>
                @if($project->projectStatus != null)
                <p class="mt-2">Project Status - 
                    <span class="badge bg-warning">{{$project->projectStatus->status_name}}</span>
                </p>
                @endif
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Current Progress</h4><hr>
            </div>
          
        </div>

        <div class="row overflow-auto">
        <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:70%;">Workload</th>
                            <th>Status</th>
                            <th style="width:11%;">Completed On</th>
                            <th style="width:10%;">Updated On</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(sizeof($project->projectProgress) > 0)
                    @foreach($project->projectProgress as $projectProgressData)
                    <tr>
                        <td>{{$projectProgressData->task}}</td>
                        <td>
                            @if($projectProgressData->progressStatus != null)
                            @if($projectProgressData->progressStatus->status_name == 'Completed')
                            <span class="badge bg-success">{{$projectProgressData->progressStatus->status_name}}</span>
                            @else
                            <span class="badge bg-warning">{{$projectProgressData->progressStatus->status_name}}</span>
                            @endif
                            @endif
                        </td>
                        <td>
                            @if($projectProgressData->completed_on != null)
                            {{$projectProgressData->completed_on}}
                            @else
                            N/A
                            @endif
                        </td>
                        <td>
                            @if($projectProgressData->created_at != null)
                            {{explode(' ',$projectProgressData->created_at)[0]}}
                            @else
                            N/A
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5">
                            <h6 class="text-center">No Records Found</h6>
                        </td>
                    </tr>
                    @endif
                    
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h4 class="doc-title">Project Documents</h4><hr>
            </div>
        </div>
        <form action="{{route('clients.update.documents')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row overflow-auto">
            <div class="col-md-12 doc-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:20%;">Document Name</th>
                                <th style="width:50%;">Upload File</th>
                                <th style="width:20%;" class="text-center">Preview File</th>
                                <th style="width:20%;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(sizeof($projectDocuments) > 0)
                            @foreach($projectDocuments as $projectDocument)
                            <tr>
                                <td>{{$projectDocument->document->document_name}}</td>
                                <td>
                                    @if($projectDocument->locked != 1)
                                    <input type="file" accept="*/*" class="form-control file-chooser" name="documents[{{ $projectDocument->id }}]" id="src-{{ $projectDocument->id }}"/>
                                    @else 
                                    <center><span class="text-danger">This document is locked !</span></center>
                                    @endif
                                </td>
                                <td>
                                    <center>
                                    @if($projectDocument->document_src != null)
                                    <a href="{{ asset($projectDocument->document_src) }}" target="_blank"><button class="btn btn-dark btn-sm" type="button"> Preview</button></a>
                                    @else
                                    <span class="text-danger">This document is required!</span>
                                    @endif
                                    </center>  
                                </td>
                                <td>
                                    @if($projectDocument->documentHistories->count() > 0)
                                    @include('client_portal.projects.components.document_histories')
                                    @else
                                    <center>N/A</center>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4"><h6 class="text-center">No Documents Required For Now</h6></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
           

        <div class="row mt-4">
            <div class="col-md-12">
                <h4 class="doc-title">Customer Documents</h4><hr>
            </div>
        </div>
 
            <div class="row overflow-auto">
            <div class="col-md-12 doc-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:20%;">Document Name</th>
                                <th style="width:50%;">Upload File</th>
                                <th style="width:20%;" class="text-center">Preview File</th>
                                <th style="width:20%;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(sizeof($customerDocuments) > 0)
                            @foreach($customerDocuments as $projectDocument)
                            <tr>
                                <td>{{$projectDocument->document->document_name}}</td>
                                <td>
                                    @if($projectDocument->locked != 1)
                                    <input type="file" accept="*/*" class="form-control file-chooser" name="documents[{{ $projectDocument->id }}]" id="src-{{ $projectDocument->id }}"/>
                                    @else 
                                    <center><span class="text-danger">This document is locked !</span></center>
                                    @endif
                                </td>
                                <td>
                                    <center>
                                    @if($projectDocument->document_src != null)
                                    <a href="{{ asset($projectDocument->document_src) }}" target="_blank"><button class="btn btn-dark btn-sm" type="button"> Preview</button></a>
                                    @else
                                    <span class="text-danger">This document is required!</span>
                                    @endif
                                    </center>  
                                </td>
                                <td>
                                    @if($projectDocument->documentHistories->count() > 0)
                                    @include('client_portal.projects.components.document_histories')
                                    @else
                                    <center>N/A</center>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4"><h6 class="text-center">No Documents Required For Now</h6></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @if(sizeof($projectDocuments) > 0 && sizeof($customerDocuments))
            <button type="submit" class="btn btn-dark" id="uploadButton" style="display: none;"><i class="fa fa-upload"></i> Upload</button>
            @endif
        </form>
      
    </div>
</div>

@endsection

@section('scripts')
<script>
    $( document ).ready(function() {
    console.log( "ready!" );
});

document.getElementById('printButton').addEventListener('click', function() {
    window.print();
});

let fileChooserId='';

$('.file-chooser').on('click',function(){
     fileChooserId = $(this).attr('id');
 
    const imageInput =  document.getElementById(fileChooserId);
    console.log(imageInput);
    const uploadButton = document.getElementById('uploadButton');

    // Add an event listener to the file input
    imageInput.addEventListener('change', function() {
        // Check if a file is selected
        if (imageInput.files.length > 0) {
            // If a file is selected, show the upload button
            uploadButton.style.display = 'block';
        } else {
            // If no file is selected, hide the upload button
            uploadButton.style.display = 'none';
        }
    });

});

</script>


@endsection