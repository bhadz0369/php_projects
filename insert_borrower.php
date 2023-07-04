<?php

require("./database.php");

if(isset($_POST['addBtn'])){
    $loan_type = $_POST['loan_type'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $amount = $_POST['amount'];
    $date_borrowed = $_POST['date_borrowed'];
    $due_date  = $_POST['due_date'];
    $interest = $_POST['interest'];

    $sqlInsert = "INSERT INTO loan_table VALUES(null,'$loan_type','$name','$contact','$amount','$date_borrowed','$due_date','$interest', 'NOT-PAID')";
    $queryInsert = mysqli_query($connect, $sqlInsert);
    echo "<script>alert('INSERTED SUCCESSFULLY!')</script>";
    echo "<script>window.location.href = '/LOAN SYSTEM/borrower.php'</script>";

}
?>