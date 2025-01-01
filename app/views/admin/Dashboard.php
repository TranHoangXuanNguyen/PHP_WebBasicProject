<?php
$totalUsers =    (count($data['allusers']));
$totalFoodItems = (count($data['allfooditems']));
// var_dump($data['allfooditems'])
?>

<body onload="showChart()">
    <div class="admin__dashboard__container container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="inforbox">
                    <div class="inforboxTitle">Total users:</div>
                    <div class="inforboxinfor">
                        <?php echo $totalUsers; ?> <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inforbox" onclick="showChart()">
                    <div class="inforboxTitle">Total food items:</div>
                    <div class="inforboxinfor">
                        <?php echo $totalFoodItems; ?> <i class="bi bi-egg-fried"></i>
                    </div>
                </div>
            </div>
            <div class="col mt">
                <div class="inforbox" onclick="showChart2()">
                    <div class="inforboxTitle">Total imcome at month:</div>
                    <div class="inforboxinfor">
                        <?php echo $data['totalMoney']; ?> <i class="bi bi-egg-fried"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col" id="chart">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col" id="chart2">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>

</body>