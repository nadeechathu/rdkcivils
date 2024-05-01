<div class="container">

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
             <p>  <label>Reference No -</label> {{ $details['quotationDetails']->reference_id }}</p>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <p>  <label>Design Name -</label> {{ $details['quotationDetails']->design != null ? $details['quotationDetails']->design->design_name: '' }}</p>

        </div>
    </div>
</div>




<div class="form-group">
    <p> <label>Extension Parts - </label>
    @foreach($details['quotationDetails']->parts as $part)
   {{ $part->part_name }}  ,
    @endforeach
    </p>
</div>

<div class="form-group">
<p ><label>Extension Part Items - </label>
    @foreach($details['quotationDetails']->extensions as $extension)
    {{ $extension->part_item_name }}  ,
    @endforeach
    </p>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">

           <p> <label>Bed Room Count -  </label> {{ $details['quotationDetails']->bed_rooms }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
           <p>  <label>Design Process Start - </label>
            {{ $details['quotationDetails']->design_process_start }}</p>
        </div>
    </div>
</div>





<div class="form-group">
<p><label>Other Requested Services - </label>
    @foreach($details['quotationDetails']->services as $service)
       {{ $service->property_service_name }} ,
    @endforeach
    </p>

</div>
@if(sizeof($details['quotationDetails']->professionals) > 0)
<div class="form-group">
<p><label>Professionals - </label>
    @foreach($details['quotationDetails']->professionals as $professional)
     {{ $professional->property_service_item_name }}  ,
    @endforeach
    </p>
</div>
@endif


<div class="form-group">

    <p> <label>Any Other Service - </label>  {{ $details['quotationDetails']->expecting_service != "Null" ? $details['quotationDetails']->expecting_service  : "n/a" }}</p>
</div>



<div class="row">
    <div class="col-md-6">
        <div class="form-group">

            <p>  <label>First Name - </label>  {{ $details['quotationDetails']->first_name }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <p> <label>Last Name - </label>
               {{ $details['quotationDetails']->last_name !== "Null" ? $details['quotationDetails']->last_name : "n/a" }}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">

            <p> <label>Address - </label> {{ $details['quotationDetails']->address !== "Null" ? $details['quotationDetails']->address : "n/a" }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">

            <p> <label>Post Code -</label> {{ $details['quotationDetails']->post_code }}</p>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">

        <div class="form-group">
        <p><label>Email - </label>
           {{ $details['quotationDetails']->email }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">

            <p>  <label>Contact - </label> {{ $details['quotationDetails']->contact }}</p>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">

            <p> <label>Customer Prefers RDK Updates - </label> {{ $details['quotationDetails']->keep_me_update == 1 ? 'Yes':'No' }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">

             <p> <label>Customer heard about us via - </label> {{ $details['quotationDetails']->hear_about_us }}</p>
        </div>
    </div>
</div>


<div class="row">
    @if($details['quotationDetails']->date != null)
    <div class="col-md-6">
        <div class="form-group">

            <p> <label>Appointment Requested Date - </label> {{ date('d-m-Y',strtotime($details['quotationDetails']->date)) }}</p>
        </div>
    </div>
    @endif
    @if($details['quotationDetails']->time != null)
    <div class="col-md-6">
        <div class="form-group">

            <p> <label>Appointment Requested Time -</label> {{date('h:i A', strtotime($details['quotationDetails']->time))}}</p>
        </div>
    </div>
    @endif
</div>


<div class="row">

    <div class="col-md-12">
        <div class="form-group">

           <p> <label>Message - </label>  {{ $details['quotationDetails']->message !== "Null" ? $details['quotationDetails']->message  : "" }}</p>
        </div>
    </div>
</div>


</div>
