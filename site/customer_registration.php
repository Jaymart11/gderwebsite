<div class="modal fade" id="modal_register">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="modal_register_content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Registration</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" id="frmpost">
                        <div class="form-row mb-1">                       
                            <table style="width:100%;">
                            	<tr>
                                	<td>Firstname</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTfname" id="TXTfname" value="" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                	<td>Middlename</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTmname" id="TXTmname" value="" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                	<td>Lastname</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTlname" id="TXTlname" value="" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                	<td>Email</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTemail" id="TXTemail" value="" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                	<td>Contact no.</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTcontact" id="TXTcontact" value="" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                	<td>Password</td>
                                    <td><input type="password" class="form-control mb-2" name="TXTpassword" id="TXTpassword" value="" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                	<td>Retype Password</td>
                                    <td><input type="password" class="form-control mb-2" name="TXTvpassword" id="TXTvpassword" value="" style="font-weight:bold;"></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <div class="modal-footer">
                        
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="button" id="btnsavecustomer">Register</button>
                    </div>
                    <div id="msg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
<!--
$(document).ready(function(){
	$("#btnsavecustomer").click(function(){
		$.post("customer_registration_req.php",$("form#frmpost").serialize(),function(d){
			if (d=='success') {
				$("#msg").html("Successfully Registered");
				$("#TXTfname").val("");
				$("#TXTmname").val("");
				$("#TXTlname").val("");
				$("#TXTemail").val("");
				$("#TXTcontact").val("");
				$("#TXTpassword").val("");
				$("#TXTvpassword").val("");
				$("#modal_register").modal("hide");
				$("#msg").html("");
			} else {
				$("#msg").html(d);
			}
			
		});
	});
});
//-->
</script>
