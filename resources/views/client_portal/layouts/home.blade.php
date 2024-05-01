@extends('client_portal.layouts.app')
@section('content')

<div class="container-flluid vh-100 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('client_portal.common.alerts')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Your Project Dashboard</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            @if(sizeof($projects) > 0)
            @foreach($projects as $project)
            <div class="col-md-3">
                @include('client_portal.projects.project_card')
            </div>
            @endforeach
            @else
            <h5>There are no projects assigned to you for now.</h5>
            @endif
           
           
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $( document ).ready(function() {
    console.log( "ready!" );
});
</script>
@endsection