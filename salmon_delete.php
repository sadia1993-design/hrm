<?php 
require_once("header.php");


//if(isset($_GET['id'])){

$id=$_GET['id'];
$st=$conn->query("DELETE FROM salary_month WHERE id = $id");
header("location:salarymonth.php");

//}
?>