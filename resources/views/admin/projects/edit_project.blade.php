@extends('admin.layouts.app')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<style>
    .dropdown-menu {
        border-radius : 0 !important;
    }
</style>

@section('content')


    <div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
            <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <h3 class="m-0">Edit Project </h3>

                </nav>
                <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Project</li>
                    </ol>
                </div>
            </div>
        </div>        <!-- / Breadcrumbs-->


        <section class="container-fluid">

            <div class="card">
                <div class="row">
                    <div class="mb-12">
                        @include('admin.common.alerts')
                    </div>

                </div>
                <form action="{{route('project.update',$project->id)}}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="card-body">

                    <div class="form-group col-6">
                        <label for="title">Select Client</label>
                        <select id="user_id" name="user_id" class="form-control col-6 js-example-basic-single" required>
                            <option value="0">---Select Client---</option>
                            @foreach($allClients as $key => $client)
                                <option value="{{ $key }}" {{ $key == $project['user_id'] ? 'selected' : '' }}>{{ $client }}</option>
                            @endforeach
                        </select>
                    </div>


                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{$project->title}}"
                                   placeholder="Title"
                                   id="title" required/>

                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="title">Slug</label>
                            <input type="text"
                                   name="slug"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   value="{{$project->slug}}"
                                   placeholder="Slug"
                                   id="title" required/>


                            @if ($errors->has('slug'))
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif

                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="body">Location</label>
                                <input type="text"
                                       name="location"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{$project->location}}"
                                       placeholder="Location"
                                       id="title" />

                                @if ($errors->has('location'))
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                @endif

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-group">
                                <label for="body">Budget</label>
                                <input type="text"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       name="budget"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{$project->budget}}"
                                       placeholder="Budget"
                                       id="title" />

                                @if ($errors->has('budget'))
                                    <span class="text-danger">{{ $errors->first('budget') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-group">
                                <label for="body">Description</label>
                                <textarea class="ckeditor form-control" name="description" value="{{ old('description')}}" required>{{$project->description}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Service</label>
                            <select class="form-control" name="service_id" required>
                                @foreach($services as $service)
                                <option {{$project->service_id == $service->id ? 'selected':''}} value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach

                            </select>
                         </div>
                         <div class="form-group">
                            <label>Project Status</label>
                            <select class="form-control" name="project_status_id" required>
                                @foreach($projectStatuses as $projectStatus)
                                <option value="{{$projectStatus->id}}" {{$projectStatus->id == $project->project_status_id ? 'selected' : ''}}>{{$projectStatus->status_name}}</option>
                                @endforeach

                            </select>
                         </div>
                         <div class="form-group">
                            <div class="form-group">
                                <label for="project_start_date">Project Start Date</label>
                                <input type="date"
                                    name="project_start_date"
                                    class="form-control @error('project_start_date') is-invalid @enderror"
                                    value="{{ $project->project_start_date }}"
                                    placeholder="Project Start Date"
                                    id="project_start_date" />

                                @if ($errors->has('project_start_date'))
                                    <span class="text-danger">{{ $errors->first('project_start_date') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="estimated_end_date">Estimated End Date</label>
                                <input type="date"
                                    name="project_end_date"
                                    class="form-control @error('project_end_date') is-invalid @enderror"
                                    value="{{ $project->project_end_date }}"
                                    placeholder="Project End Date"
                                    id="project_end_date" />

                                @if ($errors->has('project_end_date'))
                                    <span class="text-danger">{{ $errors->first('project_end_date') }}</span>
                                @endif

                            </div>
                        </div>
                         <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                            <option {{$project->status == 1 ? 'selected':''}} value="1">Active</option>
                            <option {{$project->status == 0 ? 'selected':''}} value="0">Inactive</option>

                            </select>
                         </div>
                         <div class="form-group">
                            <label>Featured</label>
                            <select class="form-control" name="is_featured" required>
                            <option {{$project->is_featured == 0 ? 'selected':''}} value="0">No</option>
                            <option {{$project->is_featured == 1 ? 'selected':''}} value="1">Yes</option>

                            </select>
                         </div>
                         <div class="form-group">
                            <label for="src">Drawing *</label>
                            <input type="file" multiple accept="image/x-png,image/gif,image/jpeg" class="form-control" name="drawing[]" id="src1" />
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg, png, jpg, gif, svg / Image size - width 750 pixels and height 400 pixels</b></p>
                            <p id="file-size-warning1" style="color: red; display: none;">File size exceeds 2MB.</p>
                        </div>


                        <div>
                           <div class="container">
                                    <div class="row">


                                        @isset($drawing_images)
                                          @if($drawing_images->count() > 0)

                                             @foreach($drawing_images as $data_img)

                                                    <div class="col-md-2 col-4">
                                                        <img width="200px" height="200px" src="{{asset($data_img->src)}}" alt="no image">
                                                        <br>
                                                        <span>
                                                        <a href="{{route('project.destroy',$data_img->id)}}" class="btn btn-sm btn-danger text-white mt-2">
                                                            Delete
                                                        </a>
                                                       </span>
                                                    </div>

                                             @endforeach

                                          @endif
                                        @endisset


                                    </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="src"> Project *</label>
                            <input type="file" multiple accept="image/x-png,image/gif,image/jpeg"
                                   class="form-control" name="project[]" id="src2"/>
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                    jpeg,png,jpg,gif,svg / Image size - width 750 pixels and height 400 pixels</b></p>
                            <p id="file-size-warning2" style="color: red; display: none;">File size exceeds 2MB.</p>
                        </div>


                        <div>
                            <div class="container">
                                <div class="row">

                                    @isset($project_images)
                                        @if($project_images->count() > 0)

                                            @foreach($project_images as $data_img)

                                                <div class="col-md-4">
                                                    <img width="200px" height="200px" src="{{asset($data_img->src)}}" alt="no image">
                                                    <br>
                                                    <span>
                                                        <a href="{{route('project.destroy',$data_img->id)}}" class="btn btn-sm btn-danger text-white mt-2">
                                                            Delete
                                                        </a>
                                                    </span>
                                                </div>

                                            @endforeach

                                        @endif
                                    @endisset


                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="src"><h5>Project Documents*</h5></label>
                            <br>
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>Document Name</th>
                                <th>File Upload</th>
                                <th>Uploaded File</th>
                                <th>Locked</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projectDocuments as $projectDocument)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="document[]" onClick="enableUploadField({{$projectDocument->id}})" id="document-{{ $projectDocument->id }}" value="{{ $projectDocument->id }}" {{ $projectDocument->enabled == 1 ? 'checked' : '' }}>
                                            &nbsp; {{$projectDocument->document->document_name}}
                                        </td>
                                        <td>
                                            <input type="file" accept="*/*" id="{{'upload-field'.$projectDocument->id}}" {{$projectDocument->enabled == 0 ? 'disabled' : ''}} class="form-control" name="documents[{{ $projectDocument->id }}]" id="src"/>
                                        </td>
                                        <td>
                                            @if($projectDocument->document_src != null)
                                             <a href="{{ asset($projectDocument->document_src) }}" target="_blank"><button class="btn btn-dark btn-sm" type="button">Preview</button></a>
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="locked[]" id="locked-{{ $projectDocument->id }}" value="{{ $projectDocument->id }}" {{ $projectDocument->locked == 1 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @if($projectDocument->documentHistories->count() > 0)
                                            @include('admin.projects.components.document_histories')
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="src"><h5>Customer Documents*</h5></label>
                            <br>
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>Document Name</th>
                                <th>File Upload</th>
                                <th>Uploaded File</th>
                                <th>Locked</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customerDocuments as $projectDocument)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="document[]" onClick="enableUploadField({{$projectDocument->id}})" id="document-{{ $projectDocument->id }}" value="{{ $projectDocument->id }}" {{ $projectDocument->enabled == 1 ? 'checked' : '' }}>
                                            &nbsp; {{$projectDocument->document->document_name}}
                                        </td>
                                        <td>
                                            <input type="file" accept="*/*" id="{{'upload-field'.$projectDocument->id}}" {{$projectDocument->enabled == 0 ? 'disabled' : ''}} class="form-control" name="documents[{{ $projectDocument->id }}]" id="src"/>
                                        </td>
                                        <td>
                                            @if($projectDocument->document_src != null)
                                             <a href="{{ asset($projectDocument->document_src) }}" target="_blank"><button class="btn btn-dark btn-sm" type="button">Preview</button></a>
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="locked[]" id="locked-{{ $projectDocument->id }}" value="{{ $projectDocument->id }}" {{ $projectDocument->locked == 1 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @if($projectDocument->documentHistories->count() > 0)
                                            @include('admin.projects.components.document_histories')
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </div>

                </form>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
    </div>


@endsection

<script>
    function handleFileInput(inputId, warningId, maxFileSize) {
        const fileInput = document.getElementById(inputId);
        const fileSizeWarning = document.getElementById(warningId);

        fileInput.addEventListener('change', function() {
            const files = fileInput.files;

            for (let i = 0; i < files.length; i++) {
                if (files[i].size > maxFileSize) {
                    fileSizeWarning.style.display = 'block';
                    fileInput.value = ''; // Clear the file input
                    return;
                } else {
                    fileSizeWarning.style.display = 'none';
                }
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        handleFileInput('src1', 'file-size-warning1', 2 * 1024 * 1024); // Call for the first input
        handleFileInput('src2', 'file-size-warning2', 2 * 1024 * 1024); // Call for the second input
    });

    function enableUploadField(documentId){

        let documentChecked = document.getElementById('document-'+documentId);
        let uploadfield = document.getElementById('upload-field'+documentId);


        if(documentChecked.checked){
            if(uploadfield !== null){
                uploadfield.removeAttribute('disabled');
            }
        }else{
            if(uploadfield !== null){
                uploadfield.setAttribute('disabled','disabled');
                uploadfield.value = '';
            }
        }

      
    }
</script>

