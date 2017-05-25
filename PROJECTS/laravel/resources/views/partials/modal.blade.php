<div class="modal fade" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$title or 'INFO'}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            <div class="modal-footer">
                <button id="btn-primary" type="button" class="btn btn-primary">{{$saveButton or 'Save'}}</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{$closeButton or 'Close'}}</button>
            </div>
        </div>
    </div>
</div>