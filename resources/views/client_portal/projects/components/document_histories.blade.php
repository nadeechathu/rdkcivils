<button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#history-modal-'.$projectDocument->id}}">
 View History
</button>

<div class="modal fade" id="{{'history-modal-'.$projectDocument->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-height: 80vh; max-width:100vh;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Document History</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <div class="modal-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Created Date</th>
                                <th>Updated Date</th>
                                <th class="text-center">Preview File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projectDocument->documentHistories as $history)
                            <tr>
                                <td>{{$history->created_date ?? 'N/A'}}</td>
                                <td>{{$history->created_at ?? 'N/A'}}</td>
                                <td>
                                    <center>
                                    @if($history->document_src != null)
                                    <a href="{{ asset($history->document_src) }}" target="_blank" class="btn btn-dark">Preview</a>
                                    @else
                                    <span class="text-danger">This document is required!</span>
                                    @endif
                                    </center>  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>