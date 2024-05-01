@extends('frontend.layouts.app')

@section('content')
                <!-- header -->
                <div class="container-fluid slider-section mt-5">
                    <div class="container">
                        <div class="row mb-5">
                            <div class="col-md-12 px-0 my-5 pt-10 text-center">

                                @if($booking == 2)
                                <h1 class="font-50 family-Nunito-sans fw-700 light-black pt-10 quotation-heading">Book a free consultation with an expert for your architectural, planning and structural engineering needs</h1>
                                <p class="font-20 family-Nunito-sans fw-500 light-black py-3 pb-10" >If you have your dream in your head or are simply exploring various options, feel free to consult with our architectural and structural engineering experts at no cost.</p>
                                @else
                                <h1 class="font-50 family-Nunito-sans fw-700 light-black pt-10 quotation-heading">Find out the costs associated with design and planning</h1>
                                <p class="font-20 family-Nunito-sans fw-500 light-black py-3 pb-10" >Domestic extension quotes do not require an architect visiting all the time. Obtain an instant estimate of the potential costs for your dream designs. Let us help make your dream construction needs into a reality.</p>
                                @endif

                                </div>
                        </div>
                    </div>
                </div>

            <div id="quotation-section">
               <div class="container">

                    <div id="print-error-msg" class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                    </div>
                        <!-- property type-->
                        <div class="my-1">
                        @include('frontend.quotation.components.property_design')
                        </div>

                        <!--Extend part-->
                        <div class="my-3">
                        @include('frontend.quotation.components.which_part_extend')
                        </div>

                        <!-- bedrooms section-->
                        <div class="my-3">
                        @include('frontend.quotation.components.bed_rooms')
                        </div>

                        <!--Designing process period section-->
                        <div class="my-3">
                        @include('frontend.quotation.components.designing_process')
                        </div>

                        <!--Other services section-->
                        <div class="my-3">
                        @include('frontend.quotation.components.other_services')
                        </div>

                        <!--MOre info form-->
                        <div class="my-3">
                        @include('frontend.quotation.components.tell_us_more')
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
