<?php
require("./read.php");
require("./insert_borrower.php");

$sqlNoFilter = "SELECT * FROM loan_table";
$queryNoFilter = mysqli_query($connect, $sqlNoFilter);

if(isset($_POST['filterBtn'])){
$categoryFilter = $_POST['category'];
$sqlFilter = "SELECT * FROM loan_table WHERE loan_type LIKE '$categoryFilter%' LIMIT 3";
$query = mysqli_query($connect, $sqlFilter);

}
?>
<!doctype html>
<html>
    <head>
<style>
    *{
        font-family: sans-serif;
        padding: 0;
        margin: 0;
    }
    body{
        background-color:#dcdcdc;
    }
    .containerInsert{
        text-align: center;
        width: 700px;
        height: auto;
        padding: 20px;
        background-color: white;
        position: relative;
    }
    .parent{
        display: flex;
        justify-content: space-between;
      width: 100vw;
      height: 100vh;
        align-items: center;
    }
    .parentInput{
        text-align: center;
    }
    .parentInput input{
     margin: 15px 30px;
    }
    .addBtn{
position:absolute;
right: 0;
bottom: 0;
right: 2rem;
bottom: 1rem;
background-color: #32de84;
color: white;
font-weight: bold;
border-style: none;
font-size: 1.2rem;
padding: 10px 20px;
    }
    label{
        font-weight: bold;
        color: gray;
    }
    .containerInsert h4{
        background-color: #32de84;
        color: white;
     padding: 10px;
    }
    .containerParent{
    width: 80%;
    min-width: 900px;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid black;
}
</style>
    </head>
    <body>
        

    <?php require("./header.php")  ?>
    <div class="parent">

    <?php require("./dashboard.php") ?>
    <div class="containerParent">
    <div class="containerInsert">
<h4>BORROWER'S INFORMATIONS</h4>

<div class="parentInput">

<form action="insert_borrower.php" method="post">
 <label for="">Loan Type:</label> <select name="loan_type" id="">
    
    <option value="Money">Money</option>
    <option value="Food">Food</option> </select> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <label for="">Name:</label> <input name="name" type="text"><br>

    <label>Contact:</label> <input name="contact"  type="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Amount:</label> <input name="amount" type="text"><br><label>Date Borrowed:</label><input name="date_borrowed" type="date">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp;<label>Due date:</label> <input name="due_date" type="date"><br><br><label>Interest:</label> <input name="interest" type="text">
</div>

<button name="addBtn" class="addBtn" >ADD</button>
</form>
    </div>

    </div>
   
    </div>
    </body>
</html>