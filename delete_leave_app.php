<?php 
$conn = new mysqli("localhost", "root", "", "php_project");

$id=$_GET['id'];
$conn->query("DELETE FROM `leave_application` WHERE applicationID='$id'");

header('location:add_leave_app.php');

?>