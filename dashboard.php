<?php

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
     .dashboard{
                width: 300px;
                height: 100vh;
                background-color: #2f3543;
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
            .select{
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
</style>
    </head>
    <body>
        
    <div class="dashboard">
<nav>
    <ul>
        <li><a href='settings.php'>Settings</a></li>
        <li><a href = 'home.php'>Home</a></li>
       <li>
        <select name="" id="" class="select" onchange="window.location.href = this.value;">
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

    </body>
</html>