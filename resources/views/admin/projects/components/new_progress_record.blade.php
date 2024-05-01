<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#new-progress-record">
<i class="ri-add-circle-line align-bottom"></i> New Status Update
</button>

<!-- Modal -->
<div class="modal fade" id="new-progress-record" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Status Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('projects.progress.add')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="modal-body">
                <div class="form-control">
                    <label for="task">Task</label>
                    <textarea name="task" id="task" cols="30" rows="6" class="form-control" required>{{old('task')}}</textarea>
                    <input type="text" name="project_id" value="{{$project->id}}" hidden>
                </div>
                <div class="form-group">
                    <label for="task-status">Task Status</label>
                    <select class="form-control" id="task-status" name="project_status_id" required>
                        @foreach($projectStatuses as $projectStatus)
                        <option value="{{$projectStatus->id}}">{{$projectStatus->status_name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-control">
                    <label for="completed-date" id="completed-date">Completed On</label>
                    <input type="date" class="form-control" name="completed_on" value="{{old('completed_on')}}">
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