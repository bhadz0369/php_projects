<script src="jquery-1.9.1.js" ></script>
<script src="chart.min.js" ></script>
<?php

require("./database.php");
$sql = "SELECT * FROM loan_table WHERE status = 'NOT-PAID'";
$query = mysqli_query($connect, $sql);
while($result = mysqli_fetch_array($query)){
    $name[] = $result['name'];
    $amount[] = $result['amount'];
}

$sqlTypeMoney = "SELECT SUM(amount) FROM loan_table WHERE loan_type = 'Money' AND status= 'NOT-PAID'";
$typeMoney = $connect -> query($sqlTypeMoney);

$sqlTypeFood = "SELECT SUM(amount) FROM loan_table WHERE loan_type = 'Food' AND status= 'NOT-PAID'";
$typeFood = $connect -> query($sqlTypeFood);

if(isset($_POST['filterBtn'])){
    $type = $_POST['type'];
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
    .parent{
        margin: auto;
        background-color: white;
        padding: 30px;
        width: 30vw;
        height: auto;
        position: relative;
    }
    .parent h1{
        text-align: center;
        color: gray;
        font-weight: bold;
        margin-top: 10%;
    }
    .parent h3{
        color: gray;
    }
    .selectParent{
        position: absolute;
        top: 0;
        top: 2rem;
        left: 0;
        left: 1.2rem;
    }
    .filterBtn{
        background-color: #5e71f3;
        color: white;
        border-style: none;
        font-weight: bold;
    }
    .father{
        display: flex;
justify-content: space-between;
      width: 100vw;
      height: 100vh;
        align-items: center;
        border: 1px solid black;
    }

</style>
    </head>
    <body>

    <?php require("./header.php")  ?>

    <div class="father">

    <?php require("./dashboard.php") ?>
        <div class="parent">

        <div class="selectParent">

        <form action="chart_report.php" method="post">
<label for="">Show Chart By: </label> <select name="type" id="">

    <option value="bar">Bar</option>
    <option value="pie">Pie</option>
    <option value="line">Line</option>

</select>
<button name="filterBtn" class="filterBtn">Filter</button>
        </form>
</div>

            <h1>CHART REPORT</h1>
<h3><?php while($money = mysqli_fetch_array($typeMoney)){
echo 'Money Loan Type: Php ' . number_format($money['SUM(amount)']);
} ?></h3>
<h3><?php while($food = mysqli_fetch_array($typeFood)){
echo 'Food Loan Type: Php ' . number_format($food['SUM(amount)']);
} ?></h3>

    <canvas id="chartBar"></canvas>
    </div> 
    </div>
    </body>
</html>

<script>
    var ctx = document.getElementById('chartBar').getContext('2d')
    var myChart = new Chart(ctx, {
        type: '<?php echo $type ?>',
        data :{
            labels: <?php echo json_encode($name) ?> ,
            datasets : [{
                backgroundColor: [
                    "#5969ff",
                    "#ff407b",
                    "#25d5f2",
                    "#ffc750",
                    "#2ec551",
                    "#7040fa",
                    "#ff004e"
                ],
                data:  <?php echo json_encode($amount) ?>,
               }]
        },
        options: {
            legend: {
                display : true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
        }
    });
</script>