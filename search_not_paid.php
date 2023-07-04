<?php
require("./not_paid_read.php");



if(isset($_POST['filterBtn'])){
$categoryFilter = $_POST['category'];
  $entries = $_POST['entries'];
$sqlFilter = "SELECT * FROM loan_table WHERE status = 'NOT-PAID' AND loan_type LIKE '$categoryFilter%' LIMIT $entries";
$query = mysqli_query($connect, $sqlFilter);

}
if(isset($_GET['searchBtn'])){
$user_input = $_GET['user_input'];
$sqlSearch = "SELECT * FROM loan_table WHERE name LIKE '$user_input%' AND status = 'NOT-PAID'  ORDER BY ID DESC";
$query = mysqli_query($connect, $sqlSearch);
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
    .containerTB{
        width: auto;
        height:auto;
        background-color: white;
        padding: 20px;
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
    .actionsTH{
        width: 120px;
    }
    .actionsTD{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .edit{
        background-color: #32de84;
    }
    .delete{
        background-color: #fd5c63;
    }
    .edit, .delete{
        border-style: none;
        padding: 5px;
        color: white;
        font-weight: bold;
    }
    .search{
        transform: translateX(50%);
        width: 50%;
        height: 30px;
        border: 1px solid gray;
        margin-bottom: 5%;
        overflow: hidden;
    }
    .search input{
        border-style: none;
        outline-style: none;
        width: 80%;
        height: 100%;
    }
    .search input{
        
    }
    .search:hover{
       box-shadow: 1px 1px 1px gray;
    }
    .filterBtn{
        padding: 2px 4px;
        border-style: none;
        outline-style: none;
        background-color: #5e71f3;
        color: white;
        font-weight: bold;
    }

    .parent{
        display: flex;
        justify-content: space-between;
      width: 100vw;
      height: 100vh;
        align-items: center;
    }

    label{
        font-weight: bold;
        color: gray;
    }
    h2{
    text-align: center;
    font-size: 2rem;
    color: gray;
}
.searchBtn{
    background-color: gray;
    color: white;
    font-weight: bold;
}
.containerNotPaid{
    width: 80%;
    min-width: 900px;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.search input{
    margin-top: 7px;
}
</style>
    </head>
    <body>
        
    <?php require("./header.php")  ?>

    <div class="parent">

    <?php require("./dashboard.php") ?>

    <div class="containerNotPaid">
    <div class="containerTB">
<h2>NOT-PAID AREA</h2>
    <form action="not_paid.php" method="post">
 <label for="">Loan Type: </label> <select name="category" id="">
    
 <option value="Money">Money</option>
 <option value="Food">Food</option>

</select>

<br>
<br>

<label for="">Entries: </label> &nbsp;&nbsp;&nbsp;&nbsp; <select name="entries" id="">

<option value="2">2</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="200">All</option>
</select><button name="filterBtn" class="filterBtn">Filter</button>
</form>

<div class="search">
    <form action="search_not_paid.php" method="get">
<input type="text" name="user_input" placeholder="Search..."><button name="searchBtn" class="searchBtn">search</button>
</form>
</div>

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
        <th class="actionsTH">Actions</th>
    </tr>

    <?php while($borrower = mysqli_fetch_assoc($query)){ ?>
    <tr>
    <td><?php echo $borrower['id'] ?></td>
    <td><?php echo $borrower['loan_type'] ?></td>
    <td><?php echo $borrower['name'] ?></td>
    <td><?php echo $borrower['contact'] ?></td>
    <td><?php echo 'Php '. number_format($borrower['amount']) ?></td>
    <td><?php echo $borrower['date_borrowed'] ?></td>
    <td><?php echo $borrower['date_pay'] ?></td>
    <td><?php echo 'Php '.$borrower['interest'] ?></td>
    <td><?php echo $borrower['status']?></td>
    <td class="actionsTD" >
    <form action="update.php" method="post">
            <input type="submit" name="editBtn" value="EDIT" class="edit">
            <input type="hidden" name="editID" value="<?php echo $borrower['id'] ?>">
            <input type="hidden" name="editLoan_Type" value="<?php echo $borrower['loan_type'] ?>">
            <input type="hidden" name="editName" value="<?php echo $borrower['name'] ?>">
            <input type="hidden" name="editContact" value="<?php echo $borrower['contact'] ?>">
            <input type="hidden" name="editAmount" value="<?php echo $borrower['amount'] ?>">
            <input type="hidden" name="editDate_B" value="<?php echo $borrower['date_borrowed'] ?>">
            <input type="hidden" name="editDate_D" value="<?php echo $borrower['date_pay'] ?>">
            <input type="hidden" name="editInterest" value="<?php echo $borrower['interest'] ?>">
            <input type="hidden" name="editStatus" value="<?php echo $borrower['status'] ?>">
        </form>
        <form action="delete_borrower.php" method="post">
            <input type="submit" name="deleteBtn" value="DELETE" class="delete">
            <input type="hidden" name="deleteID" value="<?php echo $borrower['id'] ?>">
        </form>
    </td>
    </tr>
    <?php } ?>

</table>
    </div>
    </div>
    </div>
    </body>
</html>