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

@$latitude = $_GET['latitude'];
@$longitude = $_GET['longitude'];
@$address = $_GET['address'];


$query = "INSERT INTO loc_table values('".$latitude."','".$longitude."','".$address."')";

if(mysql_query($query,$con)) {
	echo "Data Received";
}	
/*
$result = mysql_query("SELECT * FROM loc_table",$con);

while($row = mysql_fetch_assoc($result)) {
  echo $row['latitude'] . " &nbsp;&nbsp;&nbsp;&nbsp;" . $row['longitude'] . "&nbsp;&nbsp;&nbsp;&nbsp; " . $row['address'];
  echo "<br>";
}
*/
mysql_close($con);
?>