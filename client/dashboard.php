<?php
require('../static_components/header.php');
?>

<div class="container" style="padding-top: 1rem;">
    <div class="row" style="padding: 0;">
        <div class="col-3 .ms-md-auto">
            <div class="card" style="border-radius: 3px;">
                <h5 class="card-header">Assets</h5>
                <div class="card-body">
                    <canvas id="myChartTotalAssets" width="250" height="150"></canvas>
                    <p style="font-weight: bold; text-transform:uppercase;margin-top:1rem">Total Number of Assets : 12</p>
                </div>
            </div>
        </div>
        <div class="col-3 .ms-md-auto">
            <div class="card" style="border-radius: 3px;">
                <h5 class="card-header">Asset by Category</h5>
                <div class="card-body">
                    <canvas id="myChartAssetsCategory" width="250" height="150"></canvas>
                    <p style="font-weight: bold; text-transform:uppercase;margin-top:1rem">Total Number of Assets : 12</p>
                </div>
            </div>
        </div>
        <div class="col-3 .ms-md-auto">
            <div class="card" style="border-radius: 3px;">
                <h5 class="card-header">Assets by Type</h5>
                <div class="card-body">
                    <canvas id="myChartAssetsType" width="250" height="150"></canvas>
                    <p style="font-weight: bold; text-transform:uppercase;margin-top:1rem">Total Number of Assets : 12</p>
                </div>
            </div>
        </div>
        <div class="col-3 .ms-md-auto">
            <div class="card" style="border-radius: 3px;">
                <h5 class="card-header">Assets by Assigned</h5>
                <div class="card-body">
                    <canvas id="myChartAssetAssign" width="250" height="150"></canvas>
                    <p style="font-weight: bold; text-transform:uppercase;margin-top:1rem">Total Number of Assets : 12</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 1rem;">
        <div class="col-6 .ms-md-auto" style="">
            <div class="card" style="border-radius: 3px;">
                <h5 class="card-header"># of Asset by Location</h5>
                <div class="card-body">
                    <canvas id="myChartAssetsLocation" width="250" height="75"></canvas>
                    <p style="font-weight: bold; text-transform:uppercase;margin-top:1rem">Total Number of Assets : 12</p>
                </div>

            </div>
        </div>
        <div class="col-3">
            <div class="card" style="border-radius: 3px;">
                <h5 class="card-header">Assets by Assigned</h5>
                <div class="card-body">
                    <canvas id="myChartAssetAssign" width="250" height="150"></canvas>
                    <p style="font-weight: bold; text-transform:uppercase;margin-top:1rem">Total Number of Assets : 12</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require('../static_components/footer.php');
?>
<script>
    $(document).ready(() => {

        DoughnutGraph('myChartAssetsCategory', ['OK', 'WARNING', 'CRITICAL', 'UNKNOWN'], [12, 19, 3, 5], 'Asset')
        DoughnutGraph('myChartAssetsType', ['OK', 'WARNING', 'CRITICAL', 'UNKNOWN'], [12, 19, 3, 5], 'Asset')
        DoughnutGraph('myChartAssetAssign', ['OK', 'WARNING', 'CRITICAL', 'UNKNOWN'], [12, 19, 3, 5], 'Asset')
        Barchart('myChartAssetsLocation', ['sample', 'test', 'info', 'data', 'datasa'], [55, 21, 76, 12, 120], "Asset")
    })
</script>