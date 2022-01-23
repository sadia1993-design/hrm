
<?php
// session_start();
require_once("header.php");
require_once("sidebar.php");

$id=$_GET['id'];
$data=$conn->query("DELETE FROM candidate WHERE id=$id");
// $_SESSION['msg']='Deleted successfully!';
// $_SESSION['class']='danger';
// header('Location: candidate.php');
?>
 <script>
      window.location.href ="candidate.php";
   </script>