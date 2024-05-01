<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-property-service-{{ $service->id }}">
    Edit Pro
</button>

<!-- Modal -->
<div class="modal fade" id="edit-property-service-{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Property Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('property.service.update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $service->id }}">
                <div class="form-group">
                    <label>Property Service Name *</label>
                    <input type="text" name="property_service_name"  class="form-control @error('title') is-invalid @enderror"  placeholder="Property service name" value="{{ $service->property_service_name }}" id="" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description"  class="form-control @error('title') is-invalid @enderror"  placeholder=" Description" value="{{ $service->description }}" id="" >{{ $service->description }}</textarea>
                </div>



                <div class="form-group">
                        <label>Allow Comments</label>
                        <select class="form-control" name="allow_comments" required>
                            <option  value="1" {{ $service->allow_comments == 1 ? 'selected' : ''}}>Yes</option>
                            <option  value="0"  {{ $service->allow_comments == 0 ? 'selected' : ''}}>No</option>
                        </select>
                </div>

                <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="is_active" required>
                            <option  value="1" {{ $service->is_active == 1 ? 'selected' : ''}}>Active</option>
                            <option  value="0" {{ $service->is_active == 0 ? 'selected' : ''}}>Inactive</option>
                        </select>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
