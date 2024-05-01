<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#edit-progress-record'.$progressData->id}}">
<i class="fa fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-progress-record'.$progressData->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Status Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('projects.progress.edit')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="modal-body">
                <div class="form-control">
                    <label for="{{'task'.$progressData->id}}">Task</label>
                    <textarea name="task" id="{{'task'.$progressData->id}}" cols="30" rows="6" class="form-control" required>{{$progressData->task}}</textarea>
                    <input type="text" name="progress_id" value="{{$progressData->id}}" hidden>
                </div>
                <div class="form-group">
                    <label for="{{'task-status'.$progressData->id}}">Task Status</label>
                    <select class="form-control" id="{{'task-status'.$progressData->id}}" name="project_status_id" required>
                        @foreach($projectStatuses as $projectStatus)
                        <option value="{{$projectStatus->id}}" {{$progressData->project_status_id == $projectStatus->id ? 'selected' : ''}}>{{$projectStatus->status_name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-control">
                    <label for="{{'completed-on'.$progressData->id}}">Completed On</label>
                    <input type="date" class="form-control" id="{{'completed-on'.$progressData->id}}" name="completed_on" value="{{$progressData->completed_on}}">
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