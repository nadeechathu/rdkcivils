<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#new-document-type">
<i class="ri-add-circle-line align-bottom"></i> New Document Type
</button>

<!-- Modal -->
<div class="modal fade" id="new-document-type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Document Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('documentTypes.create')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="modal-body">
                <div class="form-control">
                    <label for="document_name">Document Name</label>
                    <input type="text" class="form-control" name="document_name" value="{{old('document_name')}}">
                </div>
                <div class="form-control">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="4">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="type">Document Type</label>
                    <select class="form-control" id="type" name="type">
                        <option value="0">Project Document</option>
                        <option value="1">Customer Document</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select>
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>