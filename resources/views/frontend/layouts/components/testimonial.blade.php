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
  font-size: 30px;
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

<div class="container-fluid testimonial-section pb-5">
   <div class="container">
      <div class="row">
         <div class="col-12 text-center pt-3">
            <h2 class=" family-Nunito-sans fw-bolder font-40 text-uppercase light-black pt-5">What Clients Say
            </h2>

         </div>
      </div>
      <div class="row pt-5">
         <div class="col-lg-12">
            <div class="row  homeTestimonial owl-carousel ">
               @foreach($testimonials as $testimonial)
               <div class="col-lg-9 mx-auto ">
                  <div class="row">
                     <div class="col-lg-2 col-sm-2 col-6 pt-lg-0 pt-sm-3 mx-auto pb-lg-0 pb-sm-0 pb-3">
                        <img src="{{ asset('/images/avatar-2.png') }}" class="w-100"><br>
                        <center>
                           <p class="font-16 family-Nunito-sans fw-500 light-black font-weight-bold">{{$testimonial->name }} </p>
                        </center>
                     </div>
                     <div class="col-lg-10 col-sm-10" id="reviewDiv">
                        <p class="font-16 family-Nunito-sans fw-500 light-black pb-lg-0 pb-3 text-justify">{{$testimonial->description}}</p> <br>

                        @php
                        $rating = $testimonial->rating;
                        @endphp

                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$rating) <span class="star-full"></span>
                           @else
                           <span class="star"></span>
                           @endif
                           @endfor
                     </div>
                  </div>
               </div>
               @endforeach

            </div>
         </div>

      </div>

      <div class="row">
         <div class="col-md-12 text-center">
            <h2 class="family-Nunito-sans fw-bolder font-40 text-uppercase light-black my-4">Leave us a review!</h2>
         </div>
         <div class="col-lg-6">
         <div class="bts mx-3">

            <a href="https://www.google.com/maps/place/RDK+Civil+Engineering/@51.5012003,-2.6520327,17z/data=!3m1!4b1!4m6!3m5!1s0x487193e59e7fad01:0xa20d20f57002a627!8m2!3d51.5012003!4d-2.6520327!16s%2Fg%2F11kjpjd__c?entry=ttu" class="gplogin social my-4" target="_blank"><i class="fa fa-google fs-4"></i><span> &nbsp; Review us on Google</span></a>
            
              <a href="https://web.facebook.com/RDKCivilEngineering/reviews" target="_blank" class="fblogin social my-4"><i class="fa fa-facebook fs-4"></i><span>&nbsp; Review us on Facebook</span></a>
               <a href="https://twitter.com/RDKCivils" class="twlogin social my-4" target="_blank"><i class="fa fa-twitter fs-4"></i><span>&nbsp; Review us on Twitter</span></a>

            </div>
         </div>
         <div class="col-lg-6">
            @include('frontend.common.alerts')
            <form id="reviewForm">

               @csrf
               @method('POST')

               <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="" required>
                  <p class="text-danger"></p>
               </div><br>
               <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="" required>
                  <p class="text-danger"></p>
               </div><br>
               <div class="form-group">
                  <label for="">Message</label>
                  <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                  <p class="text-danger"></p>
               </div><br>

               <label for="">Rating</label>
               <div class="form-group required">
                  <div class="stars">
                     <input class="star star-5" value="5" id="star-5" type="radio" name="star" />
                     <label class="star star-5" for="star-5"></label>
                     <input class="star star-4" value="4" id="star-4" type="radio" name="star" />
                     <label class="star star-4" for="star-4"></label>
                     <input class="star star-3" value="3" id="star-3" type="radio" name="star" />
                     <label class="star star-3" for="star-3"></label>
                     <input class="star star-2" value="2" id="star-2" type="radio" name="star" />
                     <label class="star star-2" for="star-2"></label>
                     <input class="star star-1" value="1" id="star-1" type="radio" name="star" />
                     <label class="star star-1" for="star-1"></label>
                  </div>
               </div>

               <div class="form-group mt-2">
                  <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITEKEY')}}"></div>
               </div>
               <p class=" font-14  pt-5">
                  <button type="button" class="border-none family-Nunito-sans py-3 btn-view-details text-uppercase fw-bolder pe-3" onclick="submitReviewForm()">
                     <span class="bg-dark py-3 ps-3  btn-view font-14">Add</span>
                     <span class="text-black py-3 pe-3 font-14">Review</span>
                     {{-- <i class="fa fa-long-arrow-right pe-4" aria-hidden="true"></i> --}}
                     <img src="{{ asset('/images/arrow-right1.png') }}" class="">
                  </button>
               </p>
               </a>
               <!-- <button type="submit" class="btn btn-success">Add Review</button> -->


            </form>
         </div>
      </div>
   </div>

</div>
</div>
</div>

@section('scripts')
<script>

   function submitReviewForm() {

         // Verify reCAPTCHA
         var response = grecaptcha.getResponse();

         let name = document.getElementById("name").value;
         let email = document.getElementById("email").value;
         let description = document.getElementById("description").value;

         var selectedStar = document.querySelector('.stars input:checked');

         // Get the value of the selected star
         var star = selectedStar ? selectedStar.value : null;

         let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

         if(name === '') {

            Swal.fire({
               icon: 'error',
               title: 'Hello',
               text: "Your name is required"
            });
         } else if(email === '') {

            Swal.fire({
               icon: 'error',
               title: 'Hello',
               text: "Your email is required"
            });
         } else if(!pattern.test(email)) {

            Swal.fire({
               icon: 'error',
               title: 'Hello',
               text: "Invalid email entered"
            });

         } else if (response.length == 0) {
               // Handle if reCAPTCHA is not verified
               Swal.fire({
                  icon: 'error',
                  title: 'Hello',
                  text: "Please mark reCAPTCHA security checks and try again"
               });
               return false;
         } else {
            Swal.fire({
                    icon: 'info',
                    title: 'Please wait....',
                    text: 'We are processing your details ..',
                    allowOutsideClick: false
                })
                Swal.showLoading();


               $.ajax({
                  type: 'POST',
                  url: '/review/submit',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data: {
                     name: name,
                     email: email,
                     description: description,
                     star: star
                  },
                  success: function(response) {


                     if(response.status == true) {

                        $('#reviewForm')[0].reset();
                        grecaptcha.reset();

                        Swal.fire({
                              icon: 'success',
                              title: 'Success',
                              text: response.message
                        });

                     } else {

                        Swal.fire({
                              icon: 'error',
                              title: 'Error',
                              text: response.message
                        });

                     }

                  },
                  error: function(error) {

                     Swal.fire({
                        icon: 'info',
                        title: 'Something went wrong',
                        customClass: "danger",
                        text: "Please contact support"
                     });
                  }
            });
         }

   }

</script>
@endsection
