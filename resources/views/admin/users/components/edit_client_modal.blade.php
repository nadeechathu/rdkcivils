
<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#edit-modal-'.$user->id}}">
  <i class="fas fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-modal-'.$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:500px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Client - {{$user->email}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
      </div>
      <form action="{{route('clients.edit')}}" method="post">
        {{csrf_field()}}
      <div class="modal-body">
                <div class="form-group">
                    <label for="{{'edit-user-fname'.$user->id}}">First Name</label>
                    <input type="text" class="form-control" id="{{'edit-user-fname'.$user->id}}" name="first_name" value="{{$user->first_name}}" placeholder="First Name" required>
                    <input type="text" hidden name="user_id" value="{{$user->id}}"/>
                </div>
                <div class="form-group">
                    <label for="{{'edit-user-lname'.$user->id}}">Last Name</label>
                    <input type="text" class="form-control" id="{{'edit-user-lname'.$user->id}}" name="last_name" value="{{$user->last_name}}" placeholder="Last Name" required>
                </div>               
                <div class="form-group">
                    <label for="{{'edit-user-email'.$user->id}}">Email</label>
                    <input type="email" class="form-control" id="{{'edit-user-email'.$user->id}}" name="email" value="{{$user->email}}" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Site Address</label>
                    <input type="text" class="form-control" name="site_address" value="{{$user->site_address}}" placeholder="Site Address" >
                </div>
                <div class="form-group">
                    <label>Correspondence Address</label>
                    <input type="text" class="form-control" name="correspondence_address" value="{{$user->correspondence_address}}" placeholder="Correspondence Address" >
                </div>
                <div class="form-group">
                    <label for="{{'edit-user-postcode'.$user->id}}">Postal Code</label>
                    <input type="text" class="form-control" id="{{'edit-user-postcode'.$user->id}}" name="postal_code" value="{{$user->postal_code}}" placeholder="Post Code" required>
                </div>
                <div class="form-group">
                    <label for="{{'edit-user-phone'.$user->id}}">Contact Number</label>
                    <input type="text" class="form-control" id="{{'edit-user-phone'.$user->id}}" name="contact_number" value="{{$user->phone}}" placeholder="Phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                </div>
                
               
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>