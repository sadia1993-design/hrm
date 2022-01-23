<?php
require_once("header.php");

require_once("sidebar.php");

$id=$_GET['id'];
$data=$conn->query("DELETE FROM expense_category WHERE id=$id");


// header('Location: expense_catt.php'); ?>
 <script> 
      window.location.assign("expense_catt.php");
     </script>