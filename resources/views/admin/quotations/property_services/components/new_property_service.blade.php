<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#new-property-service">
<i class="ri-add-circle-line align-bottom"></i> New Property Service
</button>

<!-- Modal -->
<div class="modal fade" id="new-property-service" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Property Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('property.service.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">

                <div class="form-group">
                    <label>Property Service Name *</label>
                    <input type="text" name="property_service_name"  class="form-control @error('title') is-invalid @enderror"  placeholder="Property service name" value="{{ old('property_service_name') }}" id="" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description"  class="form-control @error('title') is-invalid @enderror"  placeholder=" Description" value="{{ old('description') }}" id="" >{{ old('description') }}</textarea>
                </div>



                <div class="form-group">
                        <label>Allow Comments</label>
                        <select class="form-control" name="allow_comments" required>
                            <option  value="1" >Yes</option>
                            <option  value="0">No</option>
                        </select>
                </div>

                <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="is_active" required>
                            <option  value="1" >Active</option>
                            <option  value="0">Inactive</option>
                        </select>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
