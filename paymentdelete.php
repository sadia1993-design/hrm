<?php
session_start();
$conn= new mysqli('localhost','root','','php_project');

$id=$_GET['mm'];
$dat=$conn->query("DELETE FROM `salary_payment` WHERE paymentID=$id");
// echo("DELETE FROM `salary_payment` WHERE 'paymentID'=$d");

$_SESSION['msg']='Deleted infofully!';
$_SESSION['class']='danger';

 // header("location:showsallarypayment.php");
?>

 <script> 
 window.location.assign("showsallarypayment.php");
</script>