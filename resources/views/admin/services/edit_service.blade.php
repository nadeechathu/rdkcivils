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
                    <h3 class="m-0">Edit Service </h3>

                </nav>
                <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Service</li>
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
                <form action="{{route('services.update',$service->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text"
                                   name="meta_title"
                                   class="form-control @error('meta_title') is-invalid @enderror"
                                   value="{{$service->meta_title}}"
                                   placeholder="Meta Title"
                                   id="meta_title" required/>


                            @if ($errors->has('meta_title'))
                                <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                  
            <textarea  class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3"
            required>{{ $service->meta_description }}</textarea>


                            @if ($errors->has('meta_description'))
                                <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                            @endif

                        </div>








                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text"
                                   name="name"
                                   maxlength="255"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{$service->name}}"
                                   placeholder="Name"
                                   id="title" required/>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="title">Slug</label>
                            <input type="text"
                                   name="slug"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   value="{{$service->slug}}"
                                   placeholder="Slug"
                                   id="title" required/>


                            @if ($errors->has('slug'))
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="title">Service Type</label>
                            <select class="form-select" id="service_type" name="service_type" required>

                                <option {{$service->service_type == 1 ? 'selected':''}} value="1">Structural Engineering and Building Control Services</option>
                                <option {{$service->service_type == 2 ? 'selected':''}} value="2">Planning Permissions and Architectural Services</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <div class="form-group">
                                <label for="body">Description</label>
                                <textarea class="ckeditor form-control" name="description" value="{{ old('body')}}">{{$service->description}}</textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="src"> images *</label>
                            <input type="file" multiple accept="image/x-png,image/gif,image/jpeg"
                                   class="form-control" name="image" id="src" />
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                    jpeg,png,jpg,gif,svg / Image size - width 355 pixels and height 200 pixels</b></p>
                            <img width="200px" src="{{asset($service->image)}}" alt="">
                        </div>


                        <div class="form-group">
                            <label for="featured">Status </label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="0" @if($service->status = 0) selected @endif>Unpublished</option>
                                <option value="1" @if($service->status = 1) selected @endif>Published</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary text-white">
                            Update Service
                        </button>
                    </div>
                </form>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
    </div>


@endsection


<script type="module">
    import Tags from "https://cdn.jsdelivr.net/npm/bootstrap5-tags@1.3.1/tags.min.js";
    Tags.init();
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
        // $('.js-example-basic-single').select2();
    });
</script>


