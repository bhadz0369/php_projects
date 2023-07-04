<?php
require("./database.php");
$sql = "SELECT * FROM loan_table LIMIT 3";
$query = mysqli_query($connect, $sql);
?>