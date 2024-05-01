<div class="card mt-4">
  <img src="{{asset($project->images[0]->src)}}" class="card-img-top" alt="{{$project->title}}">
  <div class="card-body text-center">
    <h5 class="card-title">{{$project->title}}</h5>
    <p class="card-text fs-6">Location - {{$project->location}}</p>
    <p class="card-text fs-6">
        @if($project->projectStatus != null)
        <span class="badge bg-warning">{{$project->projectStatus->status_name}}</span>
        @endif
    </p>
    <a href="{{route('clients.projects.single',['slug' => $project->slug])}}" class="btn btn-dark mt-2 w-100">Detailed View</a>
  </div>
</div>