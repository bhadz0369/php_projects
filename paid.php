<?php
require("./paid_read.php");




if(isset($_POST['filterBtn'])){
    $categoryFilter = $_POST['category'];
      $entries = $_POST['entries'];
    $sqlFilter = "SELECT * FROM loan_table WHERE status = 'PAID' AND loan_type LIKE '$categoryFilter%' LIMIT $entries";
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
        width: auto;
    }
    .actionsTD{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .delete{
        background-color: #fd5c63;
    }
    .delete{
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
.containerPaid{
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

        <div class="containerPaid">
    <div class="containerTB">
<h2>PAID AREA</h2>
<form action="paid.php" method="post">
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
    <form action="search_paid.php" method="get">
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
        <th>Date Paid</th>
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