<button type="button" class="btn btn-dark btn-sm text-white mt-1" data-bs-toggle="modal" data-bs-target="{{'#status-testimonial'.$testimonial->id}}">
 Change Status
</button>

<div class="modal fade" id="{{'status-testimonial'.$testimonial->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-height: 80vh;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Testimonial Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <form action="{{route('testimonial.status')}}" method="post">
            @csrf
            @method('POST')
        <div class="modal-body"> 
            <div class="form-group">
                <label for="type">Change Status</label>
                <select class="form-control" name="status" id="status">
                    @if($testimonial->status == 1)
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                    @else
                    <option value="0" selected>Inactive</option>
                    <option value="1">Active</option>
                    @endif
                </select>
            </div>
            <input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-dark text-white">Change</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
    </div>
</div>