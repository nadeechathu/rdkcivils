<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="{{'#edit-task'.$taskRec->id}}">
   <i class="fa fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-task'.$taskRec->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('project.tasks.update')}}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Task</label>
                    <textarea name="task" class="form-control" cols="30" rows="6" required>{{$taskRec->task}}</textarea>
                    <input type="text" name="task_id" value="{{$taskRec->id}}" hidden>
                </div>
                <div class="form-group">
                    <label>Task Status</label>
                    <select class="form-control" name="status" required>
                        <option {{$taskRec->status == 1 ? 'selected':''}} value="1">Active</option>
                        <option {{$taskRec->status == 0 ? 'selected':''}} value="0">Inactive</option>

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