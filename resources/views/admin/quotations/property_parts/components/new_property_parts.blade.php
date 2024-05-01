<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#new-part">
<i class="ri-add-circle-line align-bottom"></i> New Property Part
</button>

<!-- Modal -->
<div class="modal fade" id="new-part" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Property Part</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('property.parts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Property Part Name *</label>
                    <input type="text" name="part_name"  class="form-control @error('title') is-invalid @enderror"  placeholder="Part Name" value="{{ old('part_name') }}" id="" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description"  class="form-control @error('title') is-invalid @enderror"  placeholder=" Description" value="{{ old('description') }}" id="" >{{ old('design_name') }}</textarea>
                </div>



                <div class="form-group">
                            <label for="src"> Image *</label>
                            <input type="file"  accept="image/x-png,image/gif,image/jpeg"
                                   class="form-control" name="image" id="image"/>
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                    jpeg,png,jpg,gif,svg | Image ratio shuold be 1:1 | Image Size 300px * 300px</b></p>
                            <p id="file-size-warning2" style="color: red; display: none;">Max file size is 2MB.</p>
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
