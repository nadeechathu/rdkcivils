



<div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="font-20 family-Nunito-sans fw-800 light-black py-3">Tell us more about you...</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">

            @csrf
            <input type="hidden" name="propertyDesignId"  id="propertyDesignId" value="">
            <input type="hidden" name="extendPart" id="extendPart" value="">
            <input type="hidden" name="extendSubPart" id="extendSubPart" value="">
            <input type="hidden" name="bedRoomCount" id="bedRoomCount" value="" >
            <input type="hidden" name="designingProcess" id="designingProcess" value="" >
            <input type="hidden" name="otherService" id="otherService" value="" >
            <input type="hidden" name="professional" id="professional" value="" >
            <input type="hidden" name="serviceYouNeed" id="serviceYouNeed" value="" >

                <div class="row">
                    <div class="col-md-6 mt-1">
                        <div class="mb-3">
                            <label for="fname" class="form-label family-Nunito-sans fw-600 fs-14 text-black">Name *</label>
                            <input type="text" name="first_name" id="first_name" required class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center quotation-border py-3" onkeypress="removeClassFromDiv()" placeholder="Enter your name" required>
                            <small><span id="first-name-error" class="form-errors text-danger fw-bold"></span></small>
                        </div>
                    </div>
                    {{--<div class="col-md-6 mt-1">
                        <div class="mb-3">
                            <label for="lname" class="form-label family-Nunito-sans fw-600 fs-14 text-black">Last name </label>
                            <input type="text" id='last_name' name="last_name" class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center quotation-border py-3 " onkeypress="removeClassFromDiv()" placeholder="Enter your last name" required>
                            <small><span id="last-name-error" class="form-errors text-danger fw-bold"></span></small>
                        </div>
                    </div>--}}
                    {{--<div class="col-md-6 mt-1">
                        <div class="mb-3">
                            <label for="projectAddress" class="form-label family-Nunito-sans fw-600 fs-14 text-black">First line of project address </label>
                            <input type="text" name="project_address"  required class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center quotation-border py-3 " onkeypress="removeClassFromDiv()" placeholder="Enter your address" id="projectAddress" required>
                            <small><span id="address-error" class="form-errors text-danger fw-bold"></span></small>
                        </div>
                    </div>--}}
                    <div class="col-md-6 mt-1">
                        <div class="mb-3">
                            <label for="postcode" class="form-label family-Nunito-sans fw-600 fs-14 text-black">Project postcode @if($booking == 1)*@endif</label>
                            <input type="text"  name="project_postcode" required class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center quotation-border py-3 " onkeypress="removeClassFromDiv()" placeholder="Enter postcode of the project site" id="postcode" required>
                            <small><span id="postcode-error" class="form-errors text-danger fw-bold"></span></small>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1">
                        <div class="mb-3">
                            <label for="email" class="form-label family-Nunito-sans fw-600 fs-14 text-black">E mail @if($booking == 1)*@endif</label>
                            <input type="text" name="email"  required class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center quotation-border py-3 " id="email" onkeypress="removeClassFromDiv()" placeholder="Enter your email address" aria-describedby="emailHelp" required>
                            <small><span id="email-error" class="form-errors text-danger fw-bold"></span></small>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1">
                        <div class="mb-3">
                            <label for="contact" class="form-label family-Nunito-sans fw-600 fs-14 text-black">Contact number *</label>
                            <input type="tel"  name="contact" required class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center quotation-border py-3 " onkeypress="removeClassFromDiv()" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter your contact number" id="contact" required>
                            <small><span id="contact-error" class="form-errors text-danger fw-bold"></span></small>
                        </div>
                    </div>
                    @if($booking == 2)
                        <div class="col-md-6 mt-1">
                            <div class="mb-3">
                                <label for="contact" class="form-label family-Nunito-sans fw-600 fs-14 text-black">Date</label>
                                <input type="date"  name="date" id="booking-date" min="<?php echo date('Y-m-d'); ?>" class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center quotation-border py-3 " onkeypress="removeClassFromDiv()"  required>
                                <small><span id="contact-error" class="form-errors text-danger fw-bold"></span></small>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <div class="mb-3">
                                <label for="contact" class="form-label family-Nunito-sans fw-600 fs-14 text-black">Time </label>
                                <input type="time"  name="time" id="booking-time"  required class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center quotation-border py-3 " onkeypress="removeClassFromDiv()" required>
                                <small><span id="contact-error" class="form-errors text-danger fw-bold"></span></small>
                            </div>
                        </div>
                    @endif
                    <input type="hidden" id="quotation_type" name="quotation_type" value="{{ $booking }}">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="message" class="form-label family-Nunito-sans fw-600 fs-14 text-black">Enter your message </label>
                            <textarea id="message" name="message" class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center quotation-border py-3" onkeypress="removeClassFromDiv()" name="message" placeholder="Type your message" rows="5" cols="50"></textarea>
                            <small><span id="message-error" class="form-errors text-danger fw-bold"></span></small>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="formDropdown" class="form-label family-Nunito-sans fw-600 fs-14 text-black" >Where did you hear about us?</label>
                        <select name="country" id="hear_about_us" class="form-control quotation-fields bg-light-yellow family-Nunito-sans fs-16 align-items-center quotation-border py-3">
                            <option value="Select">Select</option>
                            <option value="Houzz">Houzz</option>
                            <option value="Google">Google</option>
                            <option value="Facebook / Instagram">Facebook / Instagram </option>
                            <option value="Recommended by a friend / colleague">Recommended by a friend / colleague </option>
                            <option value="Press">Press</option>
                            <option value="Radio">Radio</option>
                            <option value="Magazine">Magazine</option>
                            <option value="ITV - television ad">ITV - television ad</option>
                            <option value="Blog">Blog</option>
                            <option value="Pinterest">Pinterest</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="Trade show">Trade show</option>
                            <option value="News letter / Muddy Trowel">News letter / Muddy Trowel</option>
                            <option value="Sita Hoarding">Sita Hoarding</option>
                        </select>
                        <small><span id="about-us-error" class="form-errors text-danger fw-bold"></span></small>
                    </div>
                    <div class="mb-3 pt-3">
                        <input type="checkbox" class="form-check-input mx-2" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I accept the <a href="{{ route('web.terms.conditions') }}" target="_blank">terms and conditions</a></label>
                    </div>
                    <div class="mb-3 pt-3">
                        <input type="checkbox" class="form-check-input mx-2" name="keep_me_update" value="yes" id="keep_me_update">
                        <label class="form-check-label" for="exampleCheck1">Keep me updated on RDK</label>
                    </div>
                    <!-- <div class="form-group mt-2">
                        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITEKEY')}}"></div>
                    </div> -->
                </div>
                <div class="row mt-3 mb-5 justify-content-center">
                    <div class="col-md-4 text-center">
                        <p class=" font-18  pt-5 " id="formSubmitBtn">
                            {{-- <a class="get-my-quote family-Nunito-sans py-3 get-my-quote text-uppercase fw-bolder pe-3 mx-auto" onclick="submitGetQuoteForm()" >
                                @if($booking == 2)
                                <span class="bg-dark py-3 ps-3  btn-view">Request</span>
                                <span class="text-black py-3 pe-3">Appointment</span>
                                @else
                                <span class="bg-dark py-3 ps-3  btn-view">Request</span>
                                <span class="text-black py-3 pe-3">Quotation</span>
                                @endif
                                <img src="{{asset('../images/arrow-right1.png')}}" class="">
                            </a> --}}

                        <a class="get-my-quote get-my-quote font-15 text-uppercase family-Nunito-sans fw-bolder py-3   pt-10 light-black"><button class="btn fw-bold text-dark mx-2 mb-2 btn-quote-quo" type="button" onclick="submitGetQuoteForm()">
                            @if($booking == 2)
                                Request Appointment
                            @else
                                Request Quotation
                            @endif
                         </button>
                        </a>


                        </p>
                    </div>
                </div>

