

<!-- Modal -->
<div id="sendfriend" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Invite a friend to apply for this rotation</h4>
        </div>
          <div class="modal-body">
            
            Know of someone who would love this rotation?
            <br> Enter their email below, and we'll send them an invite on your behalf.
            <br>
            <br>
            <input type="hidden">

            <form class="form-horizontal" method="post" action="{{ action('InvitesController@store') }}">
            <div class="form-group">
              {{ csrf_field() }}
              <label class="control-label col-sm-2" for="posting_id">Company:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="posting_id" name="posting_id" placeholder="Enter name of company offering the rotation">
              </div>

        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter friend's email">
        </div>

      </div>
      <div class="row">
      <div class="col-md-9"></div>
      <div class="col-md-3">
      <button type="submit" class="btn btn-outline"> Share the love </button>
    </div>
    </div></div>

</form>




      </div>

    </div>

  </div>
</div>
