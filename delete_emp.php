<?php
require_once("header.php");

require_once("sidebar.php");

$id=$_GET['id'];
$data=$conn->query("DELETE FROM employee WHERE empID=$id");


// header('Location: view_emp.php');
?>

        <script> 
      window.location.assign("view_emp.php");
     </script>


