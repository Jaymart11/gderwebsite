<div class="modal fade" id="modal_user">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="modal_register_content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Information</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" id="frmpost">
                        <div class="form-row mb-1">            
                        	<?php
							include("dbcon.php");
							$query = "SELECT * FROM customers WHERE id='".mysqli_real_escape_string($dbc, $_SESSION['GDERuid'])."'";
							$result = mysqli_query($dbc, $query);
							$row = mysqli_fetch_array($result);
							?>           
                            <table style="width:100%;">
                            	<tr>
                                	<td>Firstname</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTfname2" id="TXTfname2" value="<?php echo $row['fname'] ?>" style="font-weight:bold;" readonly="readonly"></td>
                                </tr>
                                <tr>
                                	<td>Middlename</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTmname2" id="TXTmname2" value="<?php echo $row['mname'] ?>" style="font-weight:bold;" readonly="readonly"></td>
                                </tr>
                                <tr>
                                	<td>Lastname</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTlname2" id="TXTlname2" value="<?php echo $row['lname'] ?>" style="font-weight:bold;" readonly="readonly"></td>
                                </tr>
                                <tr>
                                	<td>Email</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTemail2" id="TXTemail2" value="<?php echo $row['emailadd'] ?>" style="font-weight:bold;" readonly="readonly"></td>
                                </tr>
                                <tr>
                                	<td>Contact no.</td>
                                    <td><input type="text" class="form-control mb-2" name="TXTcontact2" id="TXTcontact2" value="<?php echo $row['contactno'] ?>" style="font-weight:bold;" readonly="readonly"></td>
                                </tr>
                                <tr>
                                	<td colspan="2"><hr /></td>
                                </tr>
                                <tr>
                                	<td>Current Password</td>
                                    <td><input type="password" class="form-control mb-2" name="TXTcpassword2" id="TXTcpassword2" value="" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                	<td>New Password</td>
                                    <td><input type="password" class="form-control mb-2" name="TXTpassword2" id="TXTpassword2" value="" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                	<td>Retype New Password</td>
                                    <td><input type="password" class="form-control mb-2" name="TXTvpassword2" id="TXTvpassword2" value="" style="font-weight:bold;"></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <div class="modal-footer">
                        
                        <button class="btn btn-secondary" type="button" id="btnlogout">Logout</button>
                        <button class="btn btn-primary" type="button" id="btnchangepass">Change Password</button>
                    </div>
                    <div id="msguser"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
<!--
$(document).ready(function(){
	$("#btnlogout").click(function(){
		window.location = "./logout.php";
	});
	$("#btnchangepass").click(function(){
		$.post("changepass_req.php",$("form#frmpost").serialize(),function(d){
			if (d=='success') {
				alert('Successfully Changed');
				$("#msguser").html("Successfully Changed");
				$("#TXTcpassword2").val("");
				$("#TXTpassword2").val("");
				$("#TXTvpassword2").val("");
				$("#modal_user").modal("hide");
				$("#msguser").html("");
			} else {
				$("#msguser").html(d);
			}
			
		});
	});
});
//-->
</script>
