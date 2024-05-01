<button type="button" class="btn btn-dark btn-sm text-white mt-1" data-bs-toggle="modal" data-bs-target="{{'#approve-testimonial'.$testimonial->id}}">
 Approve
</button>

<div class="modal fade" id="{{'approve-testimonial'.$testimonial->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-height: 80vh;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Approve Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <form action="{{route('testimonial.approve')}}" method="post">
            @csrf
            @method('POST')
        <div class="modal-body"> 
             Are you sure you want to approve this review ? <br/><br/>
            <input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-dark text-white">Approve</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
    </div>
    </div>