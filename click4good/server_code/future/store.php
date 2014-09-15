<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$conn =mysql_connect("localhost","root","");
$db= mysql_select_db("sec",$conn);
if(!$db)
{
  echo mysql_error();
}
$aname=$_POST['aname']; 
$aphoto=addslashes(file_get_contents($_FILES['aphoto']['tmp_name']));
$img=getimagesize($_FILES['aphoto']['tmp_name']);
$imagetype=$img['mime'];
$q="INSERT INTO img VALUES(' ','$aname','$aphoto','$imagetype') ";
$r=mysql_query($q,$conn);
if($r)
{
echo "info stored";
}
else
     mysql_error();
?>