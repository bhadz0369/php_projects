<?php
require("./database.php");

if(isset($_POST['deleteBtn'])){
    $deleteID = $_POST['deleteID'];
    $sqlDelete = "DELETE FROM loan_table WHERE id = $deleteID";
    $queryDelete = mysqli_query($connect, $sqlDelete);
    echo "<script>alert('DELETED SUCCESSFULLY!')</script>";
    echo "<script>window.location.href = '/LOAN SYSTEM/borrower.php'</script>";
}
?>