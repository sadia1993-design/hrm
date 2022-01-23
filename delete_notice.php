<?php
require_once("header.php");
require_once("sidebar.php");

$id = $_GET['id'];
$conn->query("DELETE FROM `notice` WHERE `notice`.`id` = '$id'");


?>

<script type="text/javascript">
    window.location.href = "add_notice.php";
</script>