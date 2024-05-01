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
    <br>
    <h3>{{$details['introduction']}}</h3>

        @if($details['is_admin'])
              
            <h5>A new user has been registered via the {{env("APP_URL")}}. Please find the details below.</h5>                                             

            <p>Customer Name : {{$details['user']['first_name']}} {{$details['user']['last_name']}}</p>
            <p>Email : {{$details['user']['email']}}</p>
            <p>Site Address : {{$details['user']['site_address']}}</p>
            <p>Correspondence Address : {{$details['user']['correspondence_address']}}</p>
            <p>Contact Number : {{$details['user']['phone']}}</p>

        @else

            <p>Welcome to <b>{{ strtoupper(config('app.name')) }}</b>. Thank you for joining with us.</p>

            

            @if($details['admin_created'])
            <p><b>We would like to confirm that your account was created successfully.</b> Following are the credentials to login to client portal of RDK Civil Engineering Limited</p>
            @else
            <p><b>We would like to confirm that your account was created successfully and submitted for the approval.</b> You will be notified via the registered email once your registration is approved.</p>
            @endif

            <hr>  

            @if($details['admin_created'])
            <p>Login email - {{$details['user']['email']}}</p>
            <p>Password - {{$details['password']}}</p>
            @endif

            @if($details['admin_created'])
            <div class="button-div">
                <a href="{{$details['link']}}" target="_blank"> <button class="mail-button">PROCEED TO LOGIN</button></a>
            </div>
            @endif

          

            <br>
            <p>If you experience any issues logging into your account, reach out to us at <a href="{{$details['contact_link']}}" target="_blank">Contact Us</a>.</p>
            <br>

        @endif
        <p>Best Regards,</p>
    <p>The RDK Team </p>
  </div>
</div>

</body>
</html>





