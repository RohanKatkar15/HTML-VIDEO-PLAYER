<?php 

$conn = mysqli_connect("localhost","root","","new_task");

 if(!$conn){

 	die("Connection Failed!");
 }
 else {

 	echo "success";
 }
?>