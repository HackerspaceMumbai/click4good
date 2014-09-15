<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$conn =mysql_connect("localhost","root","");
$db= mysql_select_db("sec",$conn);
if(!$db)
{
  echo mysql_error();
}

$q="SELECT * FROM img";
$r=mysql_query("$q",$conn);
if($r)
{
while($row=mysql_fetch_array($r))
{
//header();
echo "</br>";
echo $row['name'];
echo "</br>";
//$imageData=$row["image"];
//$type="content-type: ".$row['image'];
//header($type);
//echo $row[image];
//echo $row['image'];
echo "<img src=image.php?a=".$row['Id']."/>";
//echo "<br>";
}
}
else
{
echo mysql_error();
}

?>