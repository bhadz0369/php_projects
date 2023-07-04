<?php
require("./login_database.php");
$sqlLogin = "SELECT * FROM login";
$queryLogin = mysqli_query($connectLogin, $sqlLogin);
?>