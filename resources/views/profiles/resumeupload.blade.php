

<!-- Modal -->
<div id="resumeupload" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload your resume</h4>
        </div>

          <div class="modal-body">
            <form method="post" action="{{ action('ProfileController@resumeupload') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="resume" />
                <br /><br />
                <input type="submit" />
            </form>

          

          </div>


      </div>

    </div>

  </div>
</div>
