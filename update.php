<?php
require("./database.php");

if(isset($_POST['editBtn'])){
    $editID = $_POST['editID'];
    $editLoan_Type = $_POST['editLoan_Type'];
    $editName = $_POST['editName'];
    $editContact = $_POST['editContact'];
    $editAmount = $_POST['editAmount'];
    $editDate_B = $_POST['editDate_B'];
    $editDate_D = $_POST['editDate_D'];
    $editInterest = $_POST['editInterest'];
    $editStatus = $_POST['editStatus'];
}
if(isset($_POST['updateBtn'])){
    $updateID = $_POST['updateID'];
    $updateLoan_type = $_POST['updateLoan_type'];
    $updateName = $_POST['updateName'];
    $updateContact = $_POST['updateContact'];
    $updateAmount = $_POST['updateAmount'];
    $updateDate_B = $_POST['updateDate_B'];
    $updateDate_D = $_POST['updateDate_D'];
    $updateInterest = $_POST['updateInterest'];
    $updateStatus = $_POST['updateStatus'];

    $sqlUpdate = "UPDATE loan_table SET loan_type = '$updateLoan_type', name = '$updateName', contact = '$updateContact', amount = '$updateAmount', date_borrowed = '$updateDate_B', date_pay = '$updateDate_D', interest = '$updateInterest', status = '$updateStatus' WHERE id = $updateID  ";
    $query = mysqli_query($connect, $sqlUpdate);
    echo "<script>alert('UPDATED SUCCESSFULLY!')</script>";
    echo "<script>window.location.href = '/LOAN SYSTEM/not_paid.php'</script>";

}
?>
<!doctype html>
<html>
    <head>
<style>
 *{
        font-family: sans-serif;
    }
    body{
        display: flex;
        justify-content: center;
        min-height: 100vh;
        align-items: center;
        background-color:#dcdcdc;
        padding: 30px;
    }
    .containerTB{
        width: auto;
        height:auto;
        background-color: white;
        padding: 75px 20px;
        text-align: center;
        position: relative;
    }
    .containerTB h4{
        background-color: #32de84;
        font-weight: bold;
        color: white;
     padding: 10px;
   margin-top: 0;
    }
    table,td, th{
        padding: 10px;
border-collapse: collapse;
border: 1px solid lightgray;
text-align: center;
    }
    th{
        background-color: #5e71f3;
        color: white;
        font-weight: bold;
    }
    table input{
        width: 90px;
        text-align: center;
    }
.updateBtn{
    position: absolute;
    right: 0;
    bottom: 0;
    right: 2rem;
    bottom: 10px;
    background-color: #5e71f3;
    color: white;
    font-weight: bold;
    border-style: none;
    padding: 10px;
}
</style>
    </head>
    <body>
        
<div class="containerTB">
<h4>BORROWER'S INFORMATIONS</h4>

<table>
    <tr>
        <th>ID</th>
        <th>Loan Type</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Amount</th>
        <th>Date Borrowed</th>
        <th>Due Date</th>
        <th>Interest</th>
        <th>STATUS</th>
    </tr>
   <tr>
    <form action="update.php" method="post">
        <td><input type="text" name="updateID" value="<?php echo $editID ?>"></td>
    <td> <input type="text" name="updateLoan_type" value="<?php echo $editLoan_Type ?>"> </td>
    <td><input type="text"  name="updateName"  value="<?php echo $editName ?>"></td>
    <td><input type="text"  name="updateContact"  value="<?php echo $editContact ?>"></td>
    <td><input type="text"  name="updateAmount" value="<?php echo $editAmount ?>"></td>
    <td><input type="text"  name="updateDate_B" value="<?php echo $editDate_B ?>"></td>
    <td><input type="text"  name="updateDate_D" value="<?php echo $editDate_D ?>"></td>
    <td><input type="text"  name="updateInterest" value="<?php echo $editInterest ?>"></td>
    <td><input type="text"  name="updateStatus" value="<?php echo $editStatus ?>"></td>
   </tr>
</table>

<button name="updateBtn" class="updateBtn" >UPDATE</button>
</form>
</div>

    </body>
</html>