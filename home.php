<?php
require("./database.php");
require("./login_read.php");
$sqlPaid = "SELECT * FROM loan_table WHERE status = 'PAID'";
$queryPaid = mysqli_query($connect, $sqlPaid);

$printPaid;
if($paid = mysqli_num_rows($queryPaid)){
 $printPaid = $paid;
}

$sqlNot  = "SELECT * FROM loan_table WHERE status = 'NOT-PAID'";
$queryNot = mysqli_query($connect, $sqlNot);

$printNot;
if($notPaid = mysqli_num_rows($queryNot)){
 $printNot= $notPaid;
}

$sqlBorrower  = "SELECT * FROM loan_table";
$queryBorrower = mysqli_query($connect, $sqlBorrower);

$printBorrower;
if($Borrower = mysqli_num_rows($queryBorrower)){
 $printBorrower = $Borrower;
}

$sqlAmount = "SELECT SUM(amount) FROM loan_table WHERE status = 'NOT-PAID' ";
$total = $connect -> query($sqlAmount);

$sqlRecent = "SELECT * FROM loan_table ORDER BY ID DESC LIMIT 1";
$queryRecent = mysqli_query($connect, $sqlRecent);

$username;
while($info = mysqli_fetch_assoc($queryLogin)){
    $username = $info['username'];
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
                list-style: none;
                text-decoration: none;
            }
            body{
background-color: #dcdcdc;
min-width: 1000px;
            }
            .parent{
                width: 100%;
                height: 100%;
                border: 1px solid black;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .dashboard{
                width: 300px;
                height: 100vh;
                background-color: #2f3543;
            }
            .notification{
                display: flex;
          
                flex-direction: column;
                align-items: center;
                width: 80%;
                height: 100vh;
                gap: 2rem;
                background-color: #dcdcdc;
            }
            .notification .recent{
                text-align: center;
                color: gray;
            }
            .parent_notif{
                margin-top: 5%;
                width:90%;
                height:45%;
               background-color: white;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                position: relative;
            }
            .box{
                width: 200px;
                height: 150px;
                text-align: center;
                color:white;
                font-weight:bold;
            }
            .box h2{
                padding:20px;
                font-size: 22px;
            }
            .borrower{
                background-color: #5e71f3;
            }
            .amount{
                background-color: #15c99c;
            }
            .paid{
                background-color: #e97673;
            }
            .not{
            background-color: #f6cd45;
            }
            header{
                width: 100%;
                height: 70px;
                background-color: #2f6fda;
                color: white;
                font-weight: bold;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            header h3{
            padding: 10px 30px 0 30px;
            }
            nav{
display: flex;
justify-content: center;
flex-direction: column;
align-items: center;
            }
            nav ul{
                margin-top: 20%;

            }
            nav ul li{
                padding: 5px 20px;
                text-align: center;
margin: 50% 0;
            }
            nav ul li:hover{
                background-color: #5e71f3;
            }
            nav ul li a{
                color:lightgray;
            }
            p{
                position: absolute;
                top: 0;
                left: 0;
                top: 2rem;
                left: 2rem;
                font-weight: bold;
                color: gray;
            }
            select{
                background-color: transparent;
                color:lightgray;
                border-style: none;
                font-size: 16px;
            }
            .option{
                padding: 5px;
                text-align: center;
                background-color: transparent;
                color:black;
            }
h1{
    font-size: 1.7rem;
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
        </style>
    </head>
        <body>

        <header>
<h3>Loan Management System</h3>
<h3><?php echo $username ?> <a href= 'login.php'><img style="width:2rem;" src="images/logout.png" alt=""></a></h3>
        </header>
           <div class="parent">
<div class="dashboard">
<nav>
    <ul>
    <li><a href='settings.php'>Settings</a></li>
        <li><a href = 'home.php'>Home</a></li>
       <li>
        <select name="" id="" onchange="window.location.href = this.value;">
           <option class="option" value="">Borrower</option>
           <option class="option" value="borrower.php">add borrower</option>
            <option class="option" value="paid.php">paid</option>
            <option class="option" value="not_paid.php">not paid</option>
        </select>
       </li>

        <li><a href = 'chart_report.php'>Chart Report</a></li>
    <li><a href='about.php'>About</a></li>
    </ul>
</nav>
</div>

<div class="notification">
<div class="parent_notif">
    <p>Welcome Back Administrator!</p>
<div class="box borrower">
    <h2>Total Borrowers</h2><h1><?php echo $printBorrower ?></h1>
</div>
<div class="box amount">
<h2>Total Amount Borrowed</h2><h1><?php while($amount = mysqli_fetch_array($total)){
    echo 'Php ' . number_format($amount['SUM(amount)']);
} ?></h1>
</div>
<div class="box paid">
<h2>Total Paid</h2><h1><?php echo $printPaid?></h1>
</div>
<div class="box not">
<h2>Total Not Paid</h2><h1><?php echo $printNot ?></h1>
</div>

</div>

<div class="containerTB">
    <h1 class="recent">RECENT</h1>
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
    <?php while($borrower = mysqli_fetch_assoc($queryRecent)){ ?>
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
    </tr>
    <?php } ?>

</table>
</div>
</div>

           </div>
        </body>
   
</html>