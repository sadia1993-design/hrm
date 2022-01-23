<?php 

$conn= new mysqli("localhost", "root" , "", "php_project");
 //delete quary
 if (isset($_GET['delid'])) {

    $del_id = $_GET['delid'];
    $emp_id = $_GET['emp_id'];
    $del = $conn->query("DELETE FROM attendance where attID=$del_id"); ?>

    <script>
      window.location.href = "attendance_log.php?empid=<?php echo $emp_id; ?>";
    </script>

  <?php 
  
}
