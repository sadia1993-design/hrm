<?php 
require_once("header.php");


if(isset($_GET['id'])){

$id=$_GET['id'];
$st=$conn->query("DELETE FROM `department` WHERE `dptID`=$id");
header("location:department.php");

}

                 

 
             