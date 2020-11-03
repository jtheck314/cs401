<?php $pageName = "login"; ?>
<?php require_once "header.php"; ?>
<div id="login">
 <h3>Existing Users</h3>
 <form method="POST" action="login_handler.php">
  <div>Email: <input type="text" name="email" /></div>
  <div>Password: <input type="text" name="password" /></div>
  <input type="submit" value="Log In"/>
 </form>
 <hr/>
 <div>
  <h3>New Users</h3>
  <a href="/newUser.php">Click here to create an account</a>
 </div>
</div>
<?php require_once "footer.php"; ?>  
