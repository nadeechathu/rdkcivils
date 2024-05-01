
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#new-property-service-item-{{ $serviceItem->id}}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="new-property-service-item-{{ $serviceItem->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Property Service Items</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('property.service.item.update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
            <input type="hidden" name="id" value="{{ $serviceItem->id }}">
                <div class="form-group">
                    <label>Property Service Name *</label>

                     <select class="form-control" name="property_service_id" id="">
                       @if(count($getActiveServices) > 0)
                            @foreach($getActiveServices as $item)
                                <option value="{{ $item->id }}" {{ $serviceItem->property_service_id ==  $item->id ? 'selected' : ''}}>{{ $item->property_service_name }}</option>
                            @endforeach
                        @endif
                     </select>
                </div>

                <div class="form-group">
                    <label>Property Service Item Name *</label>
                    <input type="text" name="property_service_item_name"  class="form-control @error('title') is-invalid @enderror"  placeholder="Property service name" value="{{ $serviceItem->property_service_item_name }}" id="" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description"  class="form-control @error('title') is-invalid @enderror"  placeholder=" Description" value="{{ old('description') }}" id="" >{{ $serviceItem->description }}</textarea>
                </div>





                <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="is_active" required>
                            <option  value="1" {{ $serviceItem->is_active == 1 ? 'selected' : ''}}>Active</option>
                            <option  value="0" {{ $serviceItem->is_active == 0 ? 'selected' : ''}}>Inactive</option>
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
