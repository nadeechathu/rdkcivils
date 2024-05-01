<!DOCTYPE html>
<html>
<head>
<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }
    h1{
        text-align : center;
    }
    #orders {

  border-collapse: collapse;
  width: 100%;
}

#orders td, #orders th {
  border: 1px solid #ddd;
  padding: 8px;
}

#orders tr:nth-child(even){background-color: #f2f2f2;}

#orders tr:hover {background-color: #ddd;}

#orders th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #060819;
  color: white;
}

.card {
  /* box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); */
  transition: 0.3s;
  width: 80%;
  margin:0 auto;
}


.container {
  padding: 2px 16px;
}

.order-details {
    width:100%;
    margin:15px 0 15px 0;
}
.prices {
    width:20%;
    float:left;
}
.amount {
    width:50%;
    display:inline;
}
.mail-button {
    background-color: #060819;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}
.button-div {
    width:100%;
    text-align:center;
}
.heading-div {
    background-color: #ffffff;
    color: white !important;
    width: 80%;
  margin:0 auto;
  padding:1px;
}
</style>
</head>
<body>



<div class="heading-div">
<table style="width:100%;">
    <tr>
      <td style="width:100px;">
      <img src="{{$details['logo']}}" alt="logo" style="width:100px;padding:20px;"></td>
      <td style="padding-right: 5%;">
      <h5 style="text-align:right;"><a href="{{URL::to('/')}}" target="_blank" style="color:#000000; text-decoration:none;">{{ strtoupper(config('app.name')) }}</a> </h5>
      </td>
    </tr>
  </table>


</div>



<div class="card">
  <div class="container">

    <h3>{{$details['introduction']}}</h3>
    <br>
    @if($details['is_quotation'])
    <br>
    <h4>New Quotation Request has been received ! </h4>
    <br>
            @include('emails.quotation_details')

    @else
    <p>New Free Call Appointment Request has been received ! </p>

              @include('emails.quotation_details')

    @endif

    <!-- <p>Reference Id : {{$details['reference_id']}} </p> -->

<br/>



        <br>
        Note : This is an auto generated email from {{ config('app.name') }}
  </div>
</div>

</body>
</html>






