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

echo "database connected successfully";

@$latitude = $_GET['latitude'];
@$longitude = $_GET['longitude'];
@$address = $_GET['address'];

$result = mysql_query("SELECT * FROM loc_table",$con);

while($row = mysql_fetch_assoc($result)) {
	if($latitude===$row['latitude'] && $longitude===$row['longitude']) {
		
		die();
	}
	}
		$query = "INSERT INTO loc_table values('".$latitude."','".$longitude."','".$address."')";
		
if(mysql_query($query,$con)) {
	echo "Data inserted successfully.<br>";
	
}	

$query = "INSERT INTO test_table values('".$latitude."','".$longitude."','".$address."','5')";
		
if(mysql_query($query,$con)) {
	echo "Data inserted successfully.<br>";
	
}	
$result1 = mysql_query("SELECT * FROM loc_table",$con);

while($row1= mysql_fetch_assoc($result1)) {
  echo $row1['latitude'] . " " . $row1['longitude'] . " " . $row1['address'];
  echo "<br>";
}

echo "<form action='confirm.php' method='GET'>";
echo "<input type='submit' value='NEXT'>";
echo "</form>";


mysql_close($con);
?>