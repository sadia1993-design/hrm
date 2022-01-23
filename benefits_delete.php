<?php
$conn= new mysqli("localhost", "root" , "", "php_project");
$id=$_GET['id'];
$dd=$conn->query("DELETE FROM `benefits` WHERE id=$id");

// header('Location: benefits.php');
?>
  <script> 
      window.location.assign("benefits.php");
     </script>
