<?php 
$title = 'วิเคราะห์ข้อมูล'; //กำหนดไตเติ้ล
include 'templates/header.php';
if ($_SESSION['status'] =='admin')  
{
include './connect.php';

} else {
    echo "<script>alert('คุณไม่มีสิทธิในการเข้าถึง!'); window.location ='index.php';</script>";
}
?>
<style>
.inputcolor {
    padding: 0px !important;
}
</style>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="index.php?page=home">Home</a>
        </li>
        <li class="active">วิเคราะห์ข้อมูล</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-12">
                        <p> <a class="btn btn-white btn-primary" href="index.php?page=division&action=add"
                                role="button"><i class="ace-icon glyphicon glyphicon-plus"></i>เพิ่ม</a>
                        <p>
                        <div class="page-header">
                            <h1><?php echo $title; ?></h1>
                        </div>

                        <div class="col-sm-12">
                            <div class="center">
                                <span class="btn btn-danger"><i class="fa fa-hourglass-2"></i>&nbsp;รออนุมัติ
                                    <?php $sql2 = "SELECT COUNT(id) AS count1 FROM tb_event WHERE status = 0 ";
$rs2 = $conn->query($sql2)->fetch_assoc(); echo $rs2['count1']; ?> รายการ</span>
                                <span class="btn btn-success"><i class="fa fa-file-photo-o"></i>&nbsp;บริการ
                                    <?php $sql2 = "SELECT COUNT(id_rooms) AS count2 FROM tb_rooms ";
$rs2 = $conn->query($sql2)->fetch_assoc(); echo $rs2['count2']; ?> รายการ</span>
                                <span class="btn btn-info"><i class="fa fa-group"></i>&nbsp;สมาชิก
                                    <?php $sql2 = "SELECT COUNT(id_member) AS count3 FROM tb_member ";
$rs2 = $conn->query($sql2)->fetch_assoc(); echo $rs2['count3']; ?> คน</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">บริการ</h3>
                                        <div>
                                            <canvas id="myChart" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 8],
        ['Eat', 2],
        ['TV', 4],
        ['Gym', 2],
        ['Sleep', 8]
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'My Average Day',
        'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
</script>


<?php		
include 'templates/footer.php';
$conn->close();
?>