<button type="button" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#delete-modal-'.$data->id}}">
<i class="fa fa-trash"></i>  Delete
</button>

<div class="modal fade" id="{{'delete-modal-'.$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this project ? <br/><br/>
        </div>
        <div class="modal-footer">
             <a href="{{route('project.delete',$data->id)}}"><button type="button" class="btn btn-primary">Yes</button></a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
