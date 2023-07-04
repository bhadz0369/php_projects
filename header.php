<?php
require("./login_read.php");

$username;
while($info = mysqli_fetch_assoc($queryLogin)){
    $username = $info['username'];
}
?>
<!doctype html>
<html>
    <head>

<style>
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
</style>

    </head>
    <body>
        
    <header>
<h3>Loan Management System</h3>
<h3><?php echo $username ?><a href= 'login.php'><img style="width:2rem;" src="images/logout.png" alt=""></a></h3>
        </header>

    </body>
</html>