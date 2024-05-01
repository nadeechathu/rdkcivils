<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="{{'#edit-document-type'.$documentType->id}}">
<i class="fa fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-document-type'.$documentType->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Document Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('documentTypes.edit')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="modal-body">
                <div class="form-control">
                    <label for="document_name">Document Name</label>
                    <input type="text" class="form-control" id="{{'document_name'.$documentType->id}}" name="document_name" value="{{$documentType->document_name}}">
                </div>
                <div class="form-control">
                    <label for="description">Description</label>
                    <textarea name="description" id="{{'description'.$documentType->id}}" class="form-control" cols="30" rows="4">{{$documentType->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="type">Document Type</label>
                    <select class="form-control" id="{{'type'.$documentType->id}}" name="type">
                        <option value="0" {{ $documentType->type == 0 ? 'selected' : '' }}>Project Document</option>
                        <option value="1" {{ $documentType->type == 1 ? 'selected' : '' }}>Customer Document</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="{{'status'.$documentType->id}}" name="status">
                        <option value="0" {{ $documentType->status == 0 ? 'selected' : '' }}>Inactive</option>
                        <option value="1" {{ $documentType->status == 1 ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
              <input type="hidden" name="document_type_id" value="{{$documentType->id}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>