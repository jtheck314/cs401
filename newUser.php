<?php $pageName = "login"; 
 require_once "header.php"; 
 session_start();
if(isset($_SESSION['form'])){
        $firstName_preset = $_SESSION['form']['firstName'];
        $lastName_preset = $_SESSION['form']['lastName'];
        $password_preset = $_SESSION['form']['password'];
        $email_preset = $_SESSION['form']['email'];
	$phone_preset = $_SESSION['form']['phone'];
	unset($_SESSION['form']);
}
?>
<div id="newUser">
 <h1>New User Creation</h1>
 <form method="POST" action="newUser_handler.php">
  <div>First Name: <input value="<?php echo $firstName_preset; ?>" type="text" name="firstName" id="firstName"/></div>
  <div>Last Name: <input value="<?php echo $lastName_preset; ?>" type="text" name="lastName" id="lastName"/></div>
  <div>Password: <input value="<?php echo $password_preset; ?>" type="text" name="password" id="password"/></div>
  <div>Email: <input value="<?php echo $email_preset; ?>" type="text" name="email" id="email"/></div>
  <div>Phone Number: <input value="<?php echo $phone_preset; ?>" type="text" name="phone" id="phone"/></div>
  <input type="submit" value="Create Account"/>
 </form>
</div>
<?php require_once "footer.php"; ?>
