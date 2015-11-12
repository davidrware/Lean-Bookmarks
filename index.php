<html>
<head>
<title>Index</title>
</head>
<body>
<h2>All Bookmarks</h2>
<?php

$mysqli = new mysqli("localhost","root","hkGVUX26w8ivEP","dev_bookmarks");

if($mysqli->connect_errno > 0){
	die('Unable to connect to database ['.$mysqli->connect_error.']');
}

$sql = "SELECT * FROM dev_bookmarks.bookmarks;";

if(!$result = $mysqli->query($sql)){
	die('Unable to connect to database ['.$mysqli->connect_error.']');
}

while($row = $result->fetch_assoc()){
	echo "<a href=\"".$row['url']."\">".$row['title']."</a><br />\n";
}
?>
</body>
</html>
