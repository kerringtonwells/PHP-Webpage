<?php 
include "core/init.php";
//your putting the protect page function here because you dont want any data to load before the check

include "includes/overall/header.php"; 

?>

<?php echo '<?xml version = "1.0" encoding = "UTF-8"?>'; ?>
<rss version = "2.0">
<channel>
<title>Kerrington</title>
<description>RSS Feed</description>
<link>http://kerringtonwells.com</link>

 <item>
	<title>Item title</title>
	<description>Rss Feed</description>
	<link>http://kerringtonwells.com</link>
	<pubDate></pubDate>
 </item>
</channel>	
</rss>	
 
<?php include "includes/overall/footer.php"; ?>