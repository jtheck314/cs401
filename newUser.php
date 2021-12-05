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
#blah
<div id="newUser">
 <h1>New User Creation</h1>
 <form id="newUser" class="f">
  <div>
   <label for="first name">First Name: </label>
   <input value="<?php echo $firstName_preset; ?>" type="text" name="firstName" id="firstName"/>
  </div>
  <div>
   <label for="last name">Last Name: </label>
   <input value="<?php echo $lastName_preset; ?>" type="text" name="lastName" id="lastName"/>
  </div>
  <div>
   <label for="password">Password: </label>
   <input value="<?php echo $password_preset; ?>" type="text" name="password" id="password"/>
  </div>
  <div>
   <label for="email">Email: </label>
   <input value="<?php echo $email_preset; ?>" type="text" name="email" id="email"/>
  </div>
  <div>
   <label for="phone">Phone Number: </label>
   <input value="<?php echo $phone_preset; ?>" type="text" name="phone" id="phone"/>
  </div>
  <input type="submit" value="Create Account"/>
 </form>
 <div class='bad' id="0">Bad first name<span class='fadeout'>X</span></div>
 <div class='bad' id="1">Bad last name<span class='fadeout'>X</span></div>
 <div class='bad' id="2">Bad password<span class='fadeout'>X</span></div>
 <div class='bad' id="3">Bad email<span class='fadeout'>X</span></div>
 <div class='bad' id="4">Bad phone number<span class='fadeout'>X</span></div>
</div>
<?php require_once "footer.php"; ?>
