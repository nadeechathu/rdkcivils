<style>
span.star-full::before {
    content: '\f005';
    font-family: FontAwesome;
    color: #e74c3c;
}
span.star::before {
    content: '\f006';
    font-family: FontAwesome;
    color: #7f8c8d;
}
</style>

<button type="button" class="btn btn-secondary text-white mt-1 w-100" data-bs-toggle="modal" data-bs-target="#view-testimonial">
    My Reviews
</button>

<div class="modal fade" id="view-testimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="max-height: 80vh;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My Reviews</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    @foreach($reviewList as $review)
                    <textarea name="description" id="description" class="form-control mt-2" rows="2" readonly>{{$review->description}}</textarea>
                    <div style="text-align: left;">
                        @if($review->rating != null)
                            @php
                            $rating = $review->rating; // Assuming $review->rating contains the rating value
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $rating)
                                    <span class="star-full"></span>
                                @else
                                    <span class="star"></span>
                                @endif
                            @endfor
                        @endif
                    </div>    
                    <hr>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>