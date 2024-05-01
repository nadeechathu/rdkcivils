<button type="button" class="btn btn-primary btn-sm mt-1" data-bs-toggle="modal" data-bs-target="{{'#edit-testimonial'.$testimonial->id}}">
    <i class="fa fa-edit"></i> Edit
    </button>
    
    <div class="modal fade" id="{{'edit-testimonial'.$testimonial->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-height: 80vh;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            </div>
            <form action="{{route('testimonials.edit')}}" method="post">
                @csrf
                @method('PUT')
            <div class="modal-body"> 
    
    
                <div class="form-group">
                    <label for="">Name</label>
                        <input name="name" id="name" type="text" class="form-control" required value="{{ $testimonial->name }}"  />
                         
                </div> 
                <div class="form-group">
                    <label for="">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" required>{{ $testimonial->description }}</textarea>
                          
                </div><br>
                <input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
                <input type="hidden" name="star" id="{{'rating-count'.$testimonial->id}}" value="{{$testimonial->rating}}">
                <label for="">Rating</label>
                <div>
               
                    @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $testimonial->rating)
                        <span class="{{'checked-star'.$testimonial->id}} star-full" id="{{$i.'review-star'.$testimonial->id}}" onClick="reviewStarCheck({{$testimonial->id}},{{$i}})"></span>
                    @else
                        <span class="{{'checked-star'.$testimonial->id}} star" id="{{$i.'review-star'.$testimonial->id}}" onClick="reviewStarCheck({{$testimonial->id}},{{$i}})"></span>
                    @endif
                @endfor
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn">Edit Review</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
        </div>
        </div>