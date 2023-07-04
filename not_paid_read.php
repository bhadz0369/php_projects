<?php
require("./database.php");
$sql = "SELECT * FROM loan_table WHERE status = 'NOT-PAID' LIMIT 5";
$query = mysqli_query($connect, $sql);
?>