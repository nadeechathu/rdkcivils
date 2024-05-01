<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editPropertyDesign-{{ $propertyDesign->id }}">
    Edit Property Design
</button>

<!-- Modal -->
<div class="modal fade" id="editPropertyDesign-{{ $propertyDesign->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Property Design</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('property.design.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                 <input type="hidden" name="id" value="{{ $propertyDesign->id }}">
            <div class="modal-body">
                <div class="form-group">
                    <label>Property Design Name *</label>
                    <input type="text" name="design_name"  class="form-control @error('title') is-invalid @enderror"  placeholder="Design name" value="{{ $propertyDesign->design_name }}" id="" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description"  class="form-control @error('title') is-invalid @enderror"  placeholder="Design Description" >{{ $propertyDesign->description }}</textarea>
                </div>

                <div class="form-group">
                            <label for="src"> Icon 1 *</label>
                            <input type="file"  accept="image/x-png,image/gif,image/jpeg"
                                   class="form-control" name="icon_1" id="iocn_1"/>
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                    jpeg,png,jpg,gif,svg | Image ratio shuold be 1:1</b></p>
                            <p id="file-size-warning2" style="color: red; display: none;">File size exceeds 2MB.</p>
                </div>

                <div class="form-group">
                            <label for="src"> Icon 2 *</label>
                            <input type="file"  accept="image/x-png,image/gif,image/jpeg"
                                   class="form-control" name="icon_2" id="iocn_2"/>
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                    jpeg,png,jpg,gif,svg | Image ratio shuold be 1:1</b></p>
                            <p id="file-size-warning2" style="color: red; display: none;">File size exceeds 2MB.</p>
                </div>

                <div class="form-group">
                            <label for="src"> Image *</label>
                            <input type="file"  accept="image/x-png,image/gif,image/jpeg"
                                   class="form-control" name="image" id="image"/>
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                    jpeg,png,jpg,gif,svg | Image ratio shuold be 1:1 | Image Size 300px * 300px</b></p>
                            <p id="file-size-warning2" style="color: red; display: none;">File size exceeds 2MB.</p>
                </div>

                <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="is_active" required>
                            <option  value="1" {{ $propertyDesign['is-active'] == 1 ? 'select' : ''}}>Active</option>
                            <option  value="0" {{ $propertyDesign['is-active'] == 0 ? 'select' : '' }}>Inactive</option>
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
