<?php 
$title = 'บริการ'; //กำหนดไตเติ้ล
include 'templates/header.php';
include 'connect.php';
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="index.php?page=home">Home</a>
        </li>
        <li class="active">บริการ</li>
    </ul><!-- /.breadcrumb -->
</div>

<div class="w3-container w3-yellow">
    <center>
        <h1><?php echo $title; ?></h1>
    </center>

</div>
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="row">
                    <!-- หน้าแรก -->
                    <?php if ($_GET['action']=='') {
 $meSQL = "SELECT * FROM tb_rooms ORDER BY id_rooms asc";
 $meQuery = $conn->query($meSQL);
 $i=1 ;
while ($rs = $meQuery->fetch_assoc()){
?>
                    <div class="col-md-4 col-sm-12">
                        <div class="thumbnail">
                            <img class="img1" style="width:500px;height: 400px;"
                                src="images/<?php echo $rs['image_rooms'] ?>">
                            <div class=" caption">
                                <label class="w3-text-pink">
                                    <h1><?php echo $i++; ?>.</h1>
                                </label>
                                <label class="w3-text-PaleVioletRed1">
                                    <h2><?php echo $rs['name_rooms']?></h2>
                                </label>
                                <br>
                                <label class="w3-text-blue">
                                    <h3>ราคาจอง <?php echo $rs['people_rooms']?> บาท</h3>
                                </label>
                                <pre
                                    style="padding: 1px;border: 0px;background-color: transparent !important;"><?php echo $rs['detail_rooms']?></pre>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>
<!-- div.table-responsive -->

<?php		
include 'templates/footer.php';
$conn->close();
?>