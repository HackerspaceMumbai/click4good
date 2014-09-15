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

$result = mysql_query("SELECT * FROM test_table",$con);
while($row = mysql_fetch_assoc($result)) {
	

$ans=$_GET[$row['address']];
if($ans===1) {
	$query1 = "INSERT INTO valid_table values('".$latitude."','".$longitude."')";
		}
if(mysql_query($query1,$con)) {
	echo "Data inserted successfully.<br>";
	
}	
}
?>