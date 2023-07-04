<?php
require("./login_read.php");

if(isset($_POST['changeBtn'])){
    $currentUsername = $_POST['currentUsername'];
    $currentPassword = $_POST['currentPassword'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    while($info = mysqli_fetch_assoc($queryLogin)){
        if($currentUsername == $info['username'] AND $currentPassword == $info['password']){
            $sqlChange = "UPDATE login SET username = '$username', password = '$password'";
            $queryChange = mysqli_query($connectLogin, $sqlChange);
            
            echo "<script>alert('CHANGE SUCCESSFULLY!')</script>";
            echo "<script>window.location.href='/LOAN SYSTEM/home.php'</script>";
        }else{
            echo "<script>alert('INVALID! pls. check username and password!')</script>";
        }
    }
   

}
?>
<!doctype html>
<html>
    <head>
<style>
    *{
        font-family: sans-serif;
        text-align: center;
        color: gray;
    }
    body{
        display: flex;
        justify-content: center;
        min-height: 100vh;
        align-items: center;
        background-color:#dcdcdc;
    }
    .containerTB{
        width: 500px;
        height: auto;
        padding: 30px;
        background-color: white;
    }
    img{
        height: 15rem;
    }
    .containerTB input{
        width: 50%;
        height: 30px;
    }
</style>
    </head>
    <body>
       <div class="containerTB">
<h2>SETTINGS</h2>
<form action="settings.php" method="POST">
<h3>Change Username and Password?</h3>
<br>
<br>
<label for="">Current Username: </label><input name="currentUsername" type="text" required>
<br>
<br>
<label for="">Current Password: </label><input name="currentPassword" type="text" required>
<br>
<br>
<br>
<br>
<h3>Change to:</h3>
<label for="">Username: </label><input name="username" type="text" required>
<br>
<br>
<label for="">Password: </label><input name="password" type="text" required>
<br>
<br>
<a href='forgot.php'>Forgot?</a>
<input type="submit" name="changeBtn" style="width:25%; border-style:none; background-color: #32de84; color:white; font-size:1.2rem; font-weight:bold" value="CHANGE">
</form>

</div>
    </body>
</html>