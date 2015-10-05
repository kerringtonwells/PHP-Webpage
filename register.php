<?php 
include "core/init.php";
logged_in_redirect();
include "includes/overall/header.php";


if(empty($_POST) === false){

	$required_fields = array("username","password","password_r","firstname","email");
 foreach($_POST as $key=>$value){
	if(empty($value) && in_array($key,$required_fields) === true){
	$errors[] = "Fields marked with an asterisk are required";
	break 1;
	}
 }
 if(empty($errors) === true){
  if(user_exists($_POST["username"]) === true){
  //Do not use any double quotes on this line below
  $errors[] = 'Sorry, the username \'' .$_POST["username"]. '\' is already taken';
  }
 //regular expression to check for spaces 
  if(preg_match("/\\s/",$_POST['username']) == true){
  $errors[] = "Your username must not contain any spaces";
  
  
  }
 if(strlen($_POST["password"]) < 6){
 $errors[] = "Your password must be at least 6 characters";
 }
 if($_POST["password"] !== $_POST["password_r"]){
 $errors[] = "Your passwords do not match";
 }
 if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL === false)){
 $errors[] = "A valid email is required";
 
 }
 
 if (email_exists($_POST["email"]) === true){
 ///Do not use any double quotes anywhere on this line below
 $errors[] = 'Sorry, the email \'' .$_POST['email']. '\' is already taken.';

 }
 }

}

 ?>
		
		<h1>Register</h1>
<?php 
if(isset($_GET["success"]) && empty($_GET["success"])){
echo "You've been registered successfully!  Please check your email to activate your account.";
//this ends at the start of the next php opening
}else{
if(empty($_POST) === false && empty($errors) === true){ 
$register_data = array(
"username" 		=> $_POST["username"],
"password" 		=> $_POST["password"],
"firstname" 		=> $_POST["firstname"],
"lastname" 		=> $_POST["lastname"],
"email" 		=> $_POST["email"],
"email_code"		=> md5($_POST["username"] + microtime())
);
register_user($register_data);
header("Location: register.php?success");
exit();

} else if (empty($errors) === false){
echo output_errors($errors);
}


?>		
		<form action = "" method = "POST">
		<ul>
		<li>Username*:<br>
		<input type = "text" name = "username">
		
		</li>
		<li>Password*:<br>
		<input type = "password" name = "password"></li>
		<li>Retype Password*:<br>
		<input type = "password" name = "password_r"></li>
		<li>First name*:<br>
		<input type = "text" name = "firstname"></li>
		<li>Last name:<br>
		<input type = "text" name = "lastname"></li>
		<li>Email*:<br>
		<input type = "text" name = "email"></li>
		<li><input type = "submit" value = "Register"></li>
		</ul>
		</form>
   
<?php 
}
include "includes/overall/footer.php"; ?>