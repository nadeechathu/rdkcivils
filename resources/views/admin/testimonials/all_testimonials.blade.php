@extends('admin.layouts.app')

@section('content')
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

<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">All Customer Reviews</h3>
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Customer Reviews</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->
        <div class="card">
              <div class="card-header">
                @include('admin.common.alerts')
               <div class="row">
                <div class="col-md-6">
                  @include('admin.testimonials.components.add_review')
                </div>

                </div>
              </div>
               </div>

        <section class="container-fluid">
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th style="width:20%;">Client Name</th>
                      <th>Review</th>
                      <th style="width:10%;">Rating</th>
                      <th>Is_approved</th>
                      <th>Status</th>
                      <th style="width:20%;">
                          Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                         @foreach($testimonials as $testimonial)
                           <tr>
                            <td>{{$testimonial->user->first_name ?? $testimonial->name ?? 'Guest' }} {{$testimonial->user->last_name ?? ''}}</td>
                            <td>{{$testimonial->description}}</td>
                            <td>
                              @php
                              $rating = $testimonial->rating; // Assuming $review->rating contains the rating value
                              @endphp

                              @for ($i = 1; $i <= 5; $i++)
                                  @if ($i <= $rating)
                                      <span class="star-full"></span>
                                  @else
                                      <span class="star"></span>
                                  @endif
                              @endfor
                            </td>
                            <td>
                                @if($testimonial->is_approved == 1)
                                <span class="badge bg-success">Approved</span>
                                @else
                                <span class="badge bg-danger"> Not Approved</span>
                                @endif
                            </td>
                            <td>
                                @if($testimonial->status == 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @if($testimonial->is_approved == 0)
                                @include('admin.testimonials.components.approve_review')
                                @endif

                                @include('admin.testimonials.components.change_status')
                                @include('admin.testimonials.components.edit_review')
                                @include('admin.testimonials.components.deleted_review')
                            </td>
                           </tr>
                         @endforeach
                  </tbody>
                </table>
                     {!! $testimonials->links() !!}
                  </div>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              <div class="d-felx justify-content-center">
              </div>
              </div>
              <!-- /.card-footer-->
        </section>
</div>

@endsection

@section('scripts')
<script>
  function reviewStarCheck(id,count){

   
    let ratingCount = document.getElementsByClassName('checked-star'+id);
    
    for(let j = 0 ; j < ratingCount.length ; j++){
    
      if(j < count){

        ratingCount[j].classList.remove('star');
        ratingCount[j].classList.add('star-full');
      }else{

        ratingCount[j].classList.remove('star-full');
        ratingCount[j].classList.add('star');

      }

    }

    document.getElementById('rating-count'+id).value = count;



  }
</script>
@endsection
