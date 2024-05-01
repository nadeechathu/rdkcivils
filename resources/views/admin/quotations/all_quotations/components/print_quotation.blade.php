<html>
    <head>
        <title>Quotation - {{$quotation->reference_id}}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    </head>

    <body>

                <div class="row">
                    <div class="col-md-4 mx-auto">
                    <img class="w-25" src="{{ asset($commonContent['siteLogo']['description']) }}" alt="RDK Civil Engineering">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Reference No </label>
                            <input type="text" name="reference_no" class="form-control " value="{{ $quotation->reference_id }}" id="reference_no" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Design Name</label>
                            <input type="text" name="design_name" class="form-control " value="{{ $quotation->design->design_name }}" id="design_name" disabled>
                        </div>
                    </div>
                </div>




                <div class="form-group mt-3">
                    <label>Extension Parts </label>
                    @foreach($quotation->parts as $part)
                    <input type="text" name="part_name" class="form-control " value="{{ $part->part_name }}" disabled>
                    @endforeach

                </div>

                <div class="form-group mt-3">
                    <label>Extension Part Items </label>
                    @foreach($quotation->extensions as $extension)
                    <input type="text" name="part_name" class="form-control " value="{{ $extension->part_item_name }}" disabled>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Bed Room Count </label>
                            <input type="text" name="bed_rooms" class="form-control " value="{{ $quotation->bed_rooms }}" id="bed_rooms" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Design Process Start </label>
                            <input type="text" name="design_process_start" class="form-control " value="{{ $quotation->design_process_start }}" id="design_process_start" disabled>
                        </div>
                    </div>
                </div>





                <div class="form-group mt-3">
                    <label>Other Requested Services</label>
                    @foreach($quotation->services as $service)
                    <input type="text" name="service_name" class="form-control " value="{{ $service->property_service_name }}" disabled>
                    @endforeach

                </div>
                <div class="form-group mt-3">
                    <label>Professionals</label>
                    @foreach($quotation->professionals as $professional)
                    <input type="text" name="professional_name" class="form-control " value="{{ $professional->property_service_item_name }}" disabled>
                    @endforeach
                </div>


                <div class="form-group mt-3">
                    <label>Any Other Service</label>
                    <input type="text" name="expecting_service" class="form-control " value="{{ $quotation->expecting_service }}" id="expecting_service" disabled>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control " value="{{ $quotation->first_name }}" id="first_name" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control " value="{{ $quotation->last_name }}" id="last_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Address</label>
                            <textarea type="text" name="address" class="form-control " value="{{ $quotation->address }}" id="address" disabled>{{ $quotation->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Post Code</label>
                            <input type="text" name="post_code" class="form-control " value="{{ $quotation->post_code }}" id="post_code" disabled>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group mt-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control " value="{{ $quotation->email }}" id="email" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Contact</label>
                            <input type="text" name="contact" class="form-control " value="{{ $quotation->contact }}" id="contact" disabled>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Customer Prefers RDK Updates</label>
                            <input type="text" name="message" class="form-control " value="{{ $quotation->keep_me_update == 1 ? 'Yes':'No' }}" id="message" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label>Customer heard about us via</label>
                            <input type="text" name="hear_about_us" class="form-control " value="{{ $quotation->hear_about_us }}" id="hear_about_us" disabled>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Message</label>
                            <textarea disabled cols="30" class="form-control" rows="4">{{ $quotation->message }}</textarea>
                        </div>
                    </div>
                </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    window.print();
</script>
    </body>
</html>