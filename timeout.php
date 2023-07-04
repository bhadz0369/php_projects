<?php

session_start();

$inactivity_time = 60;

if(isset($_SESSION['last_timestamp']) && (time() - $_SESSION['last_timestamp']) > $inactivity_time){
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit();
}else{
    session_regenerate_id(true);

    $_SESSION['last_timestamp'] = time();
}
?>