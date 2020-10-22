  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+1 (202) 555-0149</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
        </div>
      </div>
    </div>
    <br />
<br />
    <div class="container">
      <div class="row justify-content-center">
      
       <form method="post" id="frmcus">
                <div class="card">
                    <div class="card-header ">
                        <div class="text-center py-2">
                            <h3><i class="fa fa-envelope"></i> Got a question?</h3>
                            <p class="m-0">We'd love to hear from you. Send us a message and we'll respond as soon as possible</p>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                </div>
                                <input type="text" class="form-control" id="TXTname" name="TXTname" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                </div>
                                <input type="email" class="form-control" id="TXTemail" name="TXTemail" placeholder="Email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                </div>
                                <textarea class="form-control" placeholder="Message" id="TXTmsg" name="TXTmsg" required></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="button" value="Send" class="btnSendCus btn-info btn-block rounded-0 py-2">
                        </div>
                    </div>

                </div>
            </form>
            <!--Form with header-->
      </div>
    </div>
  </section>

<script>
<!--

$(document).ready(function(){
	$(".btnSendCus").click(function(){
		$.post("contactus_req.php",$("form#frmcus").serialize(),function(data){
			if (data=='Success') {
				alert("Successfully Sent");
				$("#TXTname").val("");
				$("#TXTemail").val("");
				$("#TXTmsg").val("");
			} else {
				alert(data);
			}
		});
	});
});
//-->
</script>