    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

<div class="modal fade" id="modal_prodcat">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="modal_prodcat_content">
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal-->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeletePost" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Record?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to delete this record?</div>
      <form class="form-horizontal" id="frmdelete" enctype="multipart/form-data">
      	<input type="hidden" id="TXTdeletepid" name="pid" value="0" />
      	<input type="hidden" id="TXTmode" value="delete" name="mode" />
      </form>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
        <button class="btn btn-primary" type="button" id="btndeleteyes">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Attachment Modal-->
<div class="modal fade" id="DelAttachModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Attachment?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Delete Attachment?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" id="btndelattach" data-dismiss="modal">Yes</button>
        <button class="btn btn-primary" type="button" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">

          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="./modules/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>