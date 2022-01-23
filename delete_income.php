<?php 
require_once("header.php");
require_once("sidebar.php");

$id=$_GET['id'];
$conn->query("DELETE FROM `income` WHERE incomeID='$id'");

// header('location:add_income.php');

    ?>

  <script> 
      window.location.href="add_income.php";
   </script>

  <?php

?>