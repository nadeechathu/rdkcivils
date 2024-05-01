<button type="button" class="btn btn-dark btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#approve-modal-'.$user->id}}">
    <i class="fa fa-check"></i> Approve
    </button>

    
    <div class="modal fade" id="{{'approve-modal-'.$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Client Approval</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to approve this client registration ?
        </div>
        <div class="modal-footer">
            <a href="{{route('clients.approve',['id' => $user->id])}}"><button type="button" class="btn btn-primary">Yes</button></a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>            
        </div>
        </div>
    </div>
    </div>