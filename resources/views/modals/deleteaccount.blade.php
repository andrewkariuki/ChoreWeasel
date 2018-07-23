<!-- Modal -->
<div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="deleteAccountLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="deleteAccountLabel">Confirm that you want to go ahead with this!!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <p class="margin-bottom-2 text-center">
                    <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                    <strong>Deleting</strong> your account is <u><strong>permanent</strong></u> and <u><strong>cannot</strong></u>                    be undone.
                    <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Changed my mind</button>
                <form action="{{ url('client/account/delete/'.Auth::user()->id) }}" method="post"> @method('delete') @csrf
                    <button type="button" class="btn btn-primary">DELETE</button>
                </form>

            </div>
        </div>
    </div>
</div>
