<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-part-{{ $item->id }}">
    Edit 
</button>

<!-- Modal -->
<div class="modal fade" id="edit-part-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Property Part Items</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('property.parts.item.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
            <div class="modal-body">

            <div class="form-group">
                    <label>Property Part Name *</label>
                     <select class="form-control" name="property_parts_id" id="">
                       @if(count($propertyPartList) > 0)
                            @foreach($propertyPartList as $part)
                                <option value="{{ $part->id }}" {{ $item->property_parts_id == $part->id ? 'selected' : ''}}>{{ $part->part_name }}</option>
                            @endforeach
                        @endif
                     </select>
                </div>

                <div class="form-group">
                    <label>Part Name *</label>
                    <input type="text" name="part_item_name"  class="form-control @error('title') is-invalid @enderror"  placeholder="Part Name" value="{{ $item->part_item_name }}" id="" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description"  class="form-control @error('title') is-invalid @enderror"  placeholder=" Description" value="{{ $item->description }}" id="" >{{ $item->description }}</textarea>
                </div>



                <div class="form-group">
                            <label for="src"> Image *</label>
                            <input type="file"  accept="image/x-png,image/gif,image/jpeg"
                                   class="form-control" name="image" id="image" />
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                    jpeg,png,jpg,gif,svg | Image ratio shuold be 1:1 | Image Size 300px * 300px</b></p>
                            <p id="file-size-warning2" style="color: red; display: none;">Max file size is 2MB.</p>
                </div>

                <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="is_active" required>

                            <option  value="1" {{ $item->is_active  == '1' ? 'selected' : ''}} >Active</option>
                            <option  value="0" {{ $item->is_active  == '0' ?  'selected' : ''}} >Inactive</option>
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
