<button type="button" class="btn btn-dark btn-sm text-white mt-1" data-bs-toggle="modal" data-bs-target="{{'#view-message'.$inquiry->id}}">
 View Message
</button>

<div class="modal fade" id="{{'view-message'.$inquiry->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-height: 80vh;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Message</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <div class="modal-body"> 
             <div class="form-group">
                <textarea name="description" id="description" class="form-control mt-2" rows="2" readonly>{{$inquiry->message}}</textarea>
             </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
       
        </div>
    </div>
    </div>