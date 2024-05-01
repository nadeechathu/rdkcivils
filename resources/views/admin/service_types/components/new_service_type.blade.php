<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#new-service-type">
<i class="ri-add-circle-line align-bottom"></i> Add Service Type
</button>

<!-- Modal -->
<div class="modal fade" id="new-service-type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Service Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('service_types.create')}}" method="post" enctype="multipart/form-data">
        @csrf
      
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label>Service Type Name *</label>
              <input type="text" name="name" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>Slug *</label>
              <input type="text" name="slug" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="mb-3">
              <label>Description *</label>
              <input type="text" name="description" class="form-control" required>
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
            <label>Thumbnail * (dimensions - 702px X 536px)</label>
              <input type="file" name="thumbnail" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>Banner * (dimensions - 2165px X 630px)</label>
              <input type="file" name="image" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label>Status *</label>
              <select name="status" class="form-control" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
          </div>
          
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create Service Type</button>
      </div>
      </form>
    </div>
  </div>
</div>