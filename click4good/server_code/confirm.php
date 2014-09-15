<?php

$host="localhost";

$databasename="loc_db";

$user="root";

$pass="";

$con = mysql_connect("$host","$user","");

if(!$con) {
	die('Could not connect:'.mysql_error());
}

mysql_select_db("$databasename",$con);

//echo "database connected successfully";

//@$latitude = $_GET['latitude'];
//@$longitude = $_GET['longitude'];
//@$address = $_GET['address'];

$result = mysql_query("SELECT * FROM test_table",$con);
echo "<html>";
echo "<head>";
echo "<body>";
echo "<form action='final.php' method='GET'>";
$row = mysql_fetch_assoc($result);
echo "$row";
while($row) {
	echo "hiee";
	echo $row['address'];
	echo "latitude:". $row['latitude'] . "longitude:". $row['longitude'];
	echo "<input type='radio' name=$row['address'] value='1'>"."Yes";
	echo "<input type='radio' name=$row['address'] value='0'>"."No";
	echo "<br>";	
	}
	
	echo "<input type='submit' value='Submit'>";
	echo "</form>";
	
	echo "</body>";
	
	echo "</head>";
	
	echo "</html>";
?>