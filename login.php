<?php
require("./login_read.php");

if(isset($_POST['loginBtn'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    while($info = mysqli_fetch_assoc($queryLogin)){
        if($username == $info['username'] AND $password == $info['password']){
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
<h2><img src="images/finance.png" alt=""></h2>
<h2>LOGIN</h2>

<form action="login.php" method="POST">
<label for="">Username</label>: <input name="username" type="text">
<br>
<br>
<label for="">Password</label>: <input name="password" type="text">
<br>
<br>
<input name="loginBtn" style="width:25%; border-style:none;background-color: #32de84; color:white; font-size:1.2rem; font-weight:bold" type="submit" value="LOGIN" >
</form>
</div>
    </body>
</html>