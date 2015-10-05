<?php 
include "core/init.php";
//wrote this line to stop users from altering files once they view users profiles
session_destroy();
include "includes/overall/header.php"; 


if(isset($_GET['username']) === true && empty ($_GET['username']) === false){
//this get variable allows the page to reload but with specific conditions that arent on the normal page
$username = $_GET['username'];

if(user_exists($username) === true){
$user_id = user_id_from_username($username);
$profile_data = user_data($user_id, 'firstname', 'lastname', 'email');
?>

<h1><?php echo $profile_data['firstname']; echo "'s"; ?> Profile</h1>
<p><?php echo $profile_data['email']; ?></p>

<?php
}else{
echo "Sorry that user doesn't exist";
}

}else{
header('Location: index.php');
exit();

}

 include "includes/overall/footer.php"; ?>