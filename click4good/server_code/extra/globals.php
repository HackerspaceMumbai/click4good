<?php

$host="localhost";

$databasename="phpfresher_demo";

$user="root";

$pass="";

$conn=mysql_connect($host,$user,$pass);
if($conn)
{
$db_selected = mysql_select_db($databasename, $conn);

if (!$db_selected) {

    die ('Can\'t use foo : ' . mysql_error());
}
}

else

{

    die('Not connected : ' . mysql_error());

}

?>
