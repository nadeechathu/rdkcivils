<style>
    /** rating **/
div.stars {
    display: inline-block;
    text-align: left; /* Align stars to the left */
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 20px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: 
#e74c3c;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #e74c3c;
  text-shadow: 0 0 5px 
#7f8c8d;
}

input.star-1:checked ~ label.star:before { color: 
#F62; }

label.star:before {
  content: '\f006'; /* Note the backslash and quotes */
  font-family: FontAwesome;
}


.horline > li:not(:last-child):after {
    content: " |";
}
.horline > li {
  font-weight: bold;
  color: 
#ff7e1a;

}
/** end rating **/
</style>

<button type="button" class="btn btn-info btn-sm text-white mt-1" data-bs-toggle="modal" data-bs-target="#add-testimonial">
 Add Review
</button>

<div class="modal fade" id="add-testimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-height: 80vh;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <form action="{{route('client.add.review')}}" method="post">
            @csrf
            @method('POST')
        <div class="modal-body"> 
            <div class="form-group">
                <label for="">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        <p class="text-danger"></p>
            </div><br>
            
            <label for="">Rating</label>
            <div class="form-group required">
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
            <button type="submit" class="btn btn-success">Add Review</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
    </div>
    </div>