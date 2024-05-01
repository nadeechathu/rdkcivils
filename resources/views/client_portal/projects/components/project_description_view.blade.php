<!-- Button trigger modal -->
<button type="button" class="btn btn-dark mt-3" data-bs-toggle="modal" data-bs-target="#description-view">
  <i class="fa fa-edit"></i> Preview Description
</button>

<!-- Modal -->
<div class="modal fade" id="description-view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:900px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Project Description</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {!!$project->description!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>