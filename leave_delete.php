<?php
$conn= new mysqli("localhost", "root" , "", "php_project");
$id=$_GET['id'];
$dd=$conn->query("DELETE FROM `leave_type` WHERE typeID=$id");

// header('Location: leave_insert.php');

?>
  <script> 
      window.location.assign("leave_insert.php");
     </script>

