<?php
require("./login_read.php");
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
    h3{
        text-decoration: 1px underline black;
    }
</style>
    </head>
    <body>
        <div class="containerTB">
            <h1>PRIVATE INFORMATIONS</h1>
            <?php while($info = mysqli_fetch_assoc($queryLogin)){?>
            <label for="">Your current username: <h3><?php echo $info['username'] ?></h3></label>
            <br>
            <br>
            <label for="">Your current password: <h3><?php echo $info['password'] ?></h3></label>
        <?php } ?>
        </div>
    </body>
</html>