<button type="button" class="btn btn-primary btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#delete-modal-'.$quotation->id}}">
    <i class="fa fa-eye"></i> Preview
</button>

<div class="modal fade" id="{{'delete-modal-'.$quotation->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quotation Details - {{$quotation->reference_id}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Reference No *</label>
                            <input type="text" name="reference_no" class="form-control " value="{{ $quotation->reference_id }}" id="reference_no" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Design Name*</label>
                            <input type="text" name="design_name" class="form-control " value="{{ $quotation->design != null ? $quotation->design->design_name : ''}}" id="design_name" disabled>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label>Extension Parts *</label>
                    @foreach($quotation->parts as $part)
                    <input type="text" name="part_name" class="form-control " value="{{ $part->part_name }}" disabled>
                    @endforeach

                </div>

                <div class="form-group">
                    <label>Extension Part Items *</label>
                    @foreach($quotation->extensions as $extension)
                    <input type="text" name="part_name" class="form-control " value="{{ $extension->part_item_name }}" disabled>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bed Room Count *</label>
                            <input type="text" name="bed_rooms" class="form-control " value="{{ $quotation->bed_rooms }}" id="bed_rooms" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Design Process Start *</label>
                            <input type="text" name="design_process_start" class="form-control " value="{{ $quotation->design_process_start }}" id="design_process_start" disabled>
                        </div>
                    </div>
                </div>





                <div class="form-group">
                    <label>Other Requested Services</label>
                    @foreach($quotation->services as $service)
                    <input type="text" name="service_name" class="form-control " value="{{ $service->property_service_name }}" disabled>
                    @endforeach

                </div>
                <div class="form-group">
                    <label>Professionals</label>
                    @foreach($quotation->professionals as $professional)
                    <input type="text" name="professional_name" class="form-control " value="{{ $professional->property_service_item_name }}" disabled>
                    @endforeach
                </div>


                <div class="form-group">
                    <label>Any Other Service</label>
                    <input type="text" name="expecting_service" class="form-control " value="{{ $quotation->expecting_service }}" id="expecting_service" disabled>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control " value="{{ $quotation->first_name }}" id="first_name" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control " value="{{ $quotation->last_name }}" id="last_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" name="address" class="form-control " value="{{ $quotation->address }}" id="address" disabled>{{ $quotation->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Post Code</label>
                            <input type="text" name="post_code" class="form-control " value="{{ $quotation->post_code }}" id="post_code" disabled>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control " value="{{ $quotation->email }}" id="email" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" name="contact" class="form-control " value="{{ $quotation->contact }}" id="contact" disabled>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Customer Prefers RDK Updates</label>
                            <input type="text" name="message" class="form-control " value="{{ $quotation->keep_me_update == 1 ? 'Yes':'No' }}" id="message" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Customer heard about us via</label>
                            <input type="text" name="hear_about_us" class="form-control " value="{{ $quotation->hear_about_us }}" id="hear_about_us" disabled>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Message</label>
                            <textarea disabled cols="30" class="form-control" rows="4">{{ $quotation->message }}</textarea>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <a href="{{route('quotation.print',['id' => $quotation->id])}}" target="_blank"><button class="btn btn-primary" type="button"><i class="fa fa-print"></i> Print</button></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>