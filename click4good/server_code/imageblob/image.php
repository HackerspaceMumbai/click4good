<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$conn =mysql_connect("localhost","root","");
$db= mysql_select_db("sec",$conn);
if(!$db)
{
  echo mysql_error();
}
$a=$_GET['a'];
$q="SELECT image,type FROM img where Id='$a' ";
$r=mysql_query("$q",$conn);
if($r)
{
$row=mysql_fetch_array($r);
$type="content-type: ".$row['type'];
header($type);
echo $row['image'];
  
 }
?> 