<?php
$db=mysqli_connect('localhost','root','','creditmanagement');
if(!$db){
	die("Connection failed: ".mysqli_connet_error());
}
else{
	mysqli_query($db,"set autocommit=0");
	mysqli_query($db,"commit");
}
?>