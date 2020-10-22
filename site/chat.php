<style>
#chatcont{
overflow-y:scroll;
}
</style>
<div class="modal fade" id="modal_chat">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="modal_register_content">
                <div class="modal-header">
                    <h5 class="modal-title">Conversation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="chatclose">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" id="frmchat" action="">
                        <div class="form-row mb-1">            
                        	<div style="height:300px; width:100%; border:1px solid #CCC;" id="chatcont">
                            
                            </div>
                        </div>
                    
                    <div class="modal-footer">
                        <table border="0" style="width:100%;">
                        	<tr>
                            	<td>
                                <input type="text" name="TXTchatmsg" id="TXTchatmsg" class="form-control mt-1" autocomplete="off" />
                                </td>
                                <td>
                                <button class="btn btn-primary" type="button" id="btnsend">Send</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </form>
                    <div id="msgchat"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
<!--
$(document).ready(function(){
	$("#frmchat").submit(function(event){
		event.preventDefault();
	});
	
	function SendMSG(){
		$.post("chat_send_req.php",$("form#frmchat").serialize(),function(d){
			if (d=='success') {
				$("#TXTchatmsg").val("");
				$("#chatcont").load("conversation.php");
                $("#chatcont").animate({ scrollTop: $('#chatcont').prop("scrollHeight")}, 1000);
			} else {
				//$("#msgchat").html(d);
			}
			
		});
	}
	
	$("#TXTchatmsg").on('keypress',function(e) {
		if(e.which == 13) {
			SendMSG();
		}
	});
	
	$("#btnsend").on("click",function(){
		SendMSG();
	});
	
	

});

//-->
</script>
