<?php $pageName = "login"; ?>
<?php require_once "header.php"; ?>
<div id="login">
 <h3>Existing Users</h3>
 <form method="POST" action="login_handler.php">
  <div>
   <label for="email">Email: </label>
   <input type="text" name="email" />
  </div>
  <div>
   <label for="password">Password: </label>
   <input type="text" name="password" />
  </div>
  <input type="submit" value="Log In"/>
<?php
	if(isset($_SESSION['authenticated']) && !$_SESSION['authenticated']){
		echo '<div class="badphp">Invalid email or password<span class="fadeout">X</span></div>';
	}
?>	       
 </form>
 <hr/>
 <div>
  <h3>New Users</h3>
  <a href="/newUser.php">Click here to create an account</a>
 </div>
 <div class="clear"><br></div>
</div>
<?php require_once "footer.php"; ?>  
