<?php 
session_start();
$title = 'จองคิวบริการ'; //กำหนดไตเติ้ล
include 'templates/header.php';
if ($_SESSION['status'] =='admin' || $_SESSION['status'] =='user')  
{
include 'connect.php';
include 'function.php';
} else {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้ระบบ!'); window.location ='index.php?page=login';</script>";
}
error_reporting(0);
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate ("D, d M Y H:i:s") . " GMT");
?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style type="text/css">
/* css สำหรับกำหนดรูปแบบของกล่องข้อความ Tooltip */
.tooltip {
    position: fixed;
    padding: 15px;
    z-index: 90000;
}

#calendar {
    max-width: 650px;
    margin: 0 auto;
}

* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 33.33%;
    padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}
</style>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="index.php?page=home">Home</a>
        </li>
        <li class="active">จองคิวบริการ</li>
    </ul><!-- /.breadcrumb -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="calendar"></div>
                    </div>
                </div>
                <div id="fullCalModal" class="modal fade" style="padding-top:20px">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                                <h3>รายการจองคิว</h4>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-container ace-save-state" id="main-container">
                <div class="main-content">
                    <div class="main-content-inner">
                        <div class="page-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form enctype="multipart/form-data" class="form-horizontal" role="form"
                                        name="formregister" method="post" action="booking\action.php?action=add">
                                        <div class="page-header">
                                            <h1>จองบริการ</h1>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="idrooms">
                                                บริการ </label>
                                            <div class="col-sm-9">
                                                <select name="idrooms" id="idrooms">
                                                    <?php 
 $meSQL = "SELECT * FROM tb_rooms ORDER BY id_rooms asc";
 $meQuery = $conn->query($meSQL);
 while ($meResult = $meQuery->fetch_assoc()){
 ?>
                                                    <option value="<?php echo $meResult['id_rooms'];?>">
                                                        <?php echo $meResult['name_rooms'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right">ผู้จอง</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="membershow" placeholder=""
                                                    class="col-xs-10 col-sm-5"
                                                    value="<?php echo $rs['firstname'].'  '.$rs['surname'];?>"
                                                    disabled />
                                                <input type="hidden" name="member"
                                                    value="<?php echo $rs['firstname'].'  '.$rs['surname'];?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right"
                                                for="title">รายละเอียด </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="title" id="title"
                                                    placeholder="(กรณีที่ลูกค้าต้องการเพิ่มเติม เช่น บริการทำเล็บต้องการติดสติ๊กเกอร์ เพ้นท์เล็บ)"
                                                    class="col-xs-10 col-sm-5" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="people"
                                                required> ราคาจอง
                                            </label>
                                            <div class="col-sm-9">
                                                <select name="people" id="people">
                                                    <?php 
 $meSQL = "SELECT * FROM tb_rooms ORDER BY people_rooms asc";
 $meQuery = $conn->query($meSQL);
 while ($meResult = $meQuery->fetch_assoc()){
 ?>
                                                    <option
                                                        value="<?php echo $rs['name_rooms'].'  '.$meResult['people_rooms'];?>">
                                                        <?php echo $rs['name_rooms'].'  '.$meResult['people_rooms'];?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <h5 align='center'>
                                            ลูกค้าสามารถเลือกเวลาในการจองคิว
                                            รายการละ 2 ชั่วโมง
                                            สามารถเช็คเวลาที่ว่างได้ตามปฎิทินการจองของร้านค่ะ</h5>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right"
                                                for="startdatepicker">เริ่ม</label>
                                            <div class="col-sm-2">
                                                <div class="input-group"> <input class="form-control datepicker"
                                                        name="startdate" id="enddatepicker" type="text"
                                                        data-date-format="yyyy-mm-dd" autocomplete="off" required>
                                                    <span class="input-group-addon"> <i
                                                            class="fa fa-calendar bigger-110"></i> </span>
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label no-padding-right" for="starttime">
                                                เวลา </label>
                                            <div class="col-sm-3">
                                                <div class="input-group"> <select name="starttime" id="starttime">
                                                        <?php 
 $meSQL = "SELECT * FROM tb_style ORDER BY id_style asc";
 $meQuery = $conn->query($meSQL);
 while ($meResult = $meQuery->fetch_assoc()){
 ?>
                                                        <option value="<?php echo $meResult['name_style'];?>">
                                                            <?php echo $meResult['name_style'];?></option>
                                                        <?php } ?>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right"
                                                for="enddatepicker">สิ้นสุด</label>
                                            <div class="col-sm-2">
                                                <div class="input-group"> <input class="form-control datepicker"
                                                        name="enddate" id="enddatepicker" type="text"
                                                        data-date-format="yyyy-mm-dd" autocomplete="off" required>
                                                    <span class="input-group-addon"> <i
                                                            class="fa fa-calendar bigger-110"></i> </span>
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label no-padding-right" for="endtime">
                                                เวลา </label>
                                            <div class="col-sm-3">
                                                <div class="input-group"> <select name="endtime" id="endtime">
                                                        <?php 
 $meSQL = "SELECT * FROM tb_style ORDER BY id_style asc";
 $meQuery = $conn->query($meSQL);
 while ($meResult = $meQuery->fetch_assoc()){
 ?>
                                                        <option value="<?php echo $meResult['name_style'];?>">
                                                            <?php echo $meResult['name_style'];?></option>
                                                        <?php } ?>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right"> สถานะการเข้าใช้
                                            </label>
                                            <div class="col-sm-9">
                                                <?php 
 $meSQL = "SELECT * FROM tb_equipment ORDER BY id_equipment asc";
 $meQuery = $conn->query($meSQL);
 //$i=1;
 while ($meResult = $meQuery->fetch_assoc()){
 ?>
                                                <input type="checkbox" name="equip[]"
                                                    value="<?php echo $meResult['name_equipment'];?>">
                                                <label
                                                    for="equip[]"><?php echo $meResult['name_equipment'];?></label>&nbsp;&nbsp;
                                                &nbsp;&nbsp;
                                                <?php $i++; if ($i == 3){echo '<br />';$i=0;} 
} ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="etc">อื่นๆ
                                            </label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" id="etc" name="etc"
                                                    placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <center><img src="booking/10.png" alt="Paris" style="width:50%;"></center>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right"
                                                for="img_event">รูปภาพ</label>
                                            <input type="file" name="img_event" id="img_event"
                                                OnChange="showPreview(this)" accept="image/*" value="">

                                        </div>
                                        <input type="hidden" name="memberid" value="<?php echo $rs['id_member'];?>" />
                                        <div class="clearfix form-actions">
                                            <div class="center">
                                                <button class="btn btn-success" type="submit"
                                                    href="index.php?page=king">
                                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                                    ยืนยันการจอง
                                                </button>
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                <button class="btn btn-warning" type="button"
                                                    onClick="javascript: window.history.back();">
                                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                                    ยกเลิก
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php		
include 'templates/footer.php';
$conn->close();
?>