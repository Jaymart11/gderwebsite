<div class="modal fade" id="modal_login">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="modal_register_content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Login</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" id="frmlogin">
                        <div class="form-row mb-1">                       
                            <table style="width:100%;">
                                <tr>
                                	<td>Email</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTemail" id="TXTemail" value="" style="font-weight:bold;" autocomplete="off"></td>
                                </tr>
                                <tr>
                                	<td>Password</td>
                                    <td><input type="password" class="form-control mb-2" name="TXTpassword" id="TXTpassword" value="" style="font-weight:bold;"  autocomplete="off"></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <div class="modal-footer">
                        
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="button" id="btnloginnow">Login</button>
                    </div>
                    <div id="msglogin"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
<!--
$(document).ready(function(){
	$("#btnloginnow").click(function(){
		$.post("customer_login_req.php",$("form#frmlogin").serialize(),function(d){
			if (d=='success') {
				$("#msglogin").html("Successfully Login");
				alert("Successfully Login");
				window.location = "./";
			} else {
				$("#msglogin").html(d);
			}
		});
	});
});
//-->
</script>
