<?php 
include "core/init.php";
//your putting the protect page function here because you dont want any data to load before the check       
protect_page();
include "includes/overall/header.php"; 
$_SESSION['user'] = (isset($_GET['user']) === true) ? (int)$_GET['user'] : 0;
?>
		
		
	<div class = "chat">
	<div class = "messages">
	<div class = "message">
	<a href = "#">Kerrington </a>Says:

	<p>The message will be displayed here</p>
	</div>
	</div>
	<textarea class = "entry" placeholder="Type here and hit Return. Use shift + Return for a new line"></textarea>
	</div>
	
	<script src = "http://code.jquery.com/jquery-1.9.1.min.js"></script>	
	<script src = "js/chat.js"></script>	

 
<?php include "includes/overall/footer.php"; ?>