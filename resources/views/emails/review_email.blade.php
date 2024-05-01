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
    background-color: #FFFFFF;
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
      <img src="{{$reviewData['logo']}}" alt="logo" style="width:100px;padding:20px;"></td>
      <td style="padding-right: 5%;">
      <h5 style="text-align:right;"><a href="{{URL::to('/')}}" target="_blank" style="color:#000000; text-decoration:none;">{{ strtoupper(config('app.name')) }}</a> </h5>
      </td>
    </tr>
  </table>


</div>



<div class="card">
  <div class="container">
<br>
    <h3>{{$reviewData['introduction']}}</h3>

    @if($reviewData['is_admin'])
        <p>New customer review received ! </p>
        <br>
        <p><label for="">Name</label> - {{$reviewData['name'] ?? ""}}</p>
        <p><label for="">Email</label> - {{$reviewData['email'] ?? ""}}</p>
        <p><label for="">Comment</label> - {{$reviewData['message'] ?? ""}}</p>
        <p><label for="">Rating</label> - {{$reviewData['rating'] ?? ""}}</p>



    @else
    <br>
    <p>Thank you so much for taking the time to share your feedback with us! Your review is invaluable to us, and we're thrilled to hear about your positive experience. We truly appreciate your support and look forward to serving you again soon. Have a fantastic day! </p>

    <p>Thank you.</p>


    @endif


<br/>



        <br>
        <p>Best Regards,</p>
    <p>The RDK Team </p>
  </div>
</div>

</body>
</html>






