<?php
session_start();
require_once("header.php");
require_once("sidebar.php");?>
<?php
$id=$_GET['ram'];
$data=$conn->query("DELETE FROM bank  WHERE bankID=$id");
$_SESSION['msg']='Deleted infofully!';
$_SESSION['class']='danger';
// header('Location: bank.php');
?>
   <script>
    window.location.href=("bank.php");
    </script>