<?php 
include("modules/login_req.php");
?>
<?php if (isset($_SESSION['GDER']) && $_SESSION['GDER']=='1') { ?>
<script type="text/javascript">
	window.location = "./";
</script>
<?php } ?>
<link rel="stylesheet" type="text/css" href="css/signin.css">
<body class="text-center">
<div id="bg">
  <img src='images/loginbg.jpg' alt='' />
</div>
<form class="form-signin" method="post">
      <img class="mb-4" src="images/gder_logo.png" alt="" style="width:300px;">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="TXTusername" required autofocus autocomplete="off">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="TXTpassword" required autocomplete="off">
        <div class="alert alert-primary" role="alert">
            <?php $x = explode("{}",$msg); echo $x[0]; ?>
        </div>
        <input type="submit" value="Sign in" name="BTNlogin" id="btnlogin" class="btn btn-lg btn-primary btn-block" />

      
      <p class="mt-5 mb-3 text-muted">&copy; GDER Furniture Enterprises 2019</p>
    </form>
</body>