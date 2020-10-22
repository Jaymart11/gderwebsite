 <style>
.unread{
	background:#F00;
	color:#FFF;
	padding:2px 6px 3px;
	font-size:9px;
	border-radius: 5px;
	margin-right:10px;
}
</style>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="./"><img src="img/gder_logo2.png" style="height:30px;" /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
			<?php if($page == 'proddet') { ?>
            	<li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./?page=products">Products</a>
                  </li>
            <?php } else { ?>
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#portfolio">Products</a>
                  </li>

             <?php } ?>
<!--                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                  </li>-->
             <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
              </li>
              
              <?php if (isset($_SESSION['GDER'])) {  ?>
              <li class="nav-item">
              	<a class="nav-link" href="#user" id="btnuser"><?php echo $_SESSION['GDERnamae']; ?></a>
              </li>	
              <li class="nav-item">
                <a class="nav-link" href="#chat" id="btnchat">Chat <span class="unread" id="unread" style="display:none;">0</span></a>
              </li>
              <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="#register" id="btnregister">Register</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="#login" id="btnlogin">Login</a>
              </li>
              <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
 <script>
 	$(document).ready(function(){
		$("#btnregister").click(function(){
			$("#modal_register").modal("show");
		});
		
		$("#btnuser").click(function(){
			$("#modal_user").modal("show");
		});
		
		
		$("#btnchat").click(function(){
			$("#modal_chat").modal({backdrop: 'static', keyboard: true});
			$("#chatcont").load("conversation.php",function(e){
					$("#chatcont").animate({ scrollTop: $('#chatcont').prop("scrollHeight")}, 1000);
			});	
		});
		
		var y = setInterval(function(){ 
			$.post("unreadcount.php",function(d){
				if (d==0){
					$("#unread").hide();
				} else {
					$("#unread").show();
				}
				$("#unread").html(d);
			});
		}, 5000);
		
		
		$("#btnlogin").click(function(){
			$("#modal_login").modal("show");
		});
	});
 </script>