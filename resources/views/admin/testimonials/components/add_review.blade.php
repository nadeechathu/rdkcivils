
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add-testimonial">
<i class="ri-add-circle-line align-bottom"></i> Add Review
</button>

<div class="modal fade" id="add-testimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-height: 80vh;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <form action="{{route('testimonials.add')}}" method="post">
            @csrf
            @method('POST')
        <div class="modal-body"> 
          <div class="form-group">
            <label for="">Name</label>
            <input type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name')}}"
            placeholder="Name"
            id="name"  required />
                   
        </div> 
            <div class="form-group">
                <label for="">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                 
            </div>
            
            <label for="">Rating</label>
            <div>
            <div class="stars">
                <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                <label class="star star-1" for="star-1"></label>
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn">Add Review</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
    </div>
    </div>