<?php
include "core/init.php";
protect_page();
include "includes/overall/header.php"; 


if(empty($_POST) === false){

	$required_fields = array("firstname","email");
 foreach($_POST as $key=>$value){
	if(empty($value) && in_array($key,$required_fields) === true){
	$errors[] = "Fields marked with an asterisk are required";
	break 1;
	}
  }
  
  if(empty($errors) === true){
  
  if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) === false){
  $errors[] = "A valid email address is required";
  }else if(email_exists($_POST['email']) === true && $user_data['email'] != $_POST['email']){
$errors[] = 'Sorry, the email \'' .$_POST['email']. '\' is already taken.';

  }
  }
  

  
 }
 
?>

<h1>Settings</h2>

<?php

if(isset($_GET["success"]) === true && empty($_GET["success"])=== true ){
	echo "Your details have been updated.";

}else{
if(empty($_POST) === false && empty($errors) === true){
$update_data = array(
"firstname" 		=> $_POST["firstname"],
"lastname" 		=> $_POST["lastname"],
"email" 		=> $_POST["email"]
);

update_user($update_data);
header("Location: settings.php?success");
exit();


}else if (empty($errors) === false){

echo output_errors($errors);
}

?>


<form action = "" method = "post">
	<ul>
	<li>
	First Name*:<br>
	<input type = "text" name = "firstname" value = "<?php  echo $user_data['firstname']; ?>">
	</li>
	<li>
	Last Name:<br>
	<input type = "text" name = "lastname" value = "<?php  echo $user_data['lastname']; ?>">
	</li>
	<li>
	Email*:<br><br>
	<input type = "text" name = "email" value = "<?php  echo $user_data['email']; ?>">
	</li>
	<li>
	<input type = "submit" value = "Submit">
	</li>
	</ul>
</form>

<?php
}
include "includes/overall/footer.php"; 
 
?>