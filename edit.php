<?php
$mysqli = new mysqli("localhost","root","hkGVUX26w8ivEP","dev_bookmarks");

if($mysqli->connecterrno){
	echo "Failed to connect to MySQL:(".$mysqli->connecterrno.") ".$mysqli->connect_error;
}

?>
<html>
<head>
<title>Add/Edit Bookmark</title>
</head>
<body>
<?php
if(isset($_POST['url']) || isset($_GET['url'])){
	$url = ($_POST['url'] ? $_POST['url'] : $_GET['url']);
	#echo $url;
	if(!($stmt = $mysqli->prepare("INSERT INTO dev_bookmarks.bookmarks(url,datetimeadded) VALUES (?,NOW())"))){
		echo "Prepare failed: (".$mysqli->errno.") ".$mysqli->error;
	}
	$stmt->bind_param("s",$url);
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
	echo "<a href=\"".$url."\">Bookmark</a> added successfully.";	
	echo "<script type=\"text/Javascript\"> var timeout = window.setTimeout(2000); window.close()</script>";
} else {
?>

<body>
<form action="edit.php" method="post">
	<input type="url" name="url" placeholder="http://google.com">
	<input type="submit">

</form>

<?php
}
?>
</body>
</html>

