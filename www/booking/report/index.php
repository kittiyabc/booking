<?php 
session_start();
$title = 'การแจ้งเตือน'; //กำหนดไตเติ้ล
include 'templates/header.php';
if ($_SESSION['status'] =='admin')  
{
include 'connect.php';
include 'function.php';
} else {
    echo "<script>alert('คุณไม่มีสิทธิในการเข้าถึง!'); window.location ='index.php';</script>";
}
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="index.php?page=home">Home</a>
        </li>
        <li class="active">การแจ้งเตือน</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-12">

                        <!-- หน้าแรก -->
                        <?php if ($_GET['action']=='') { ?>
                        <div class="form-group" style="padding-left:50px">
                            <form action="" method="post">
                                <label class="text-warning bigger-140 blue" for="link"> ค้นหาจากสถานะ </label>
                                <select name="selectstatus">
                                    <option value="" <?php if ($_GET['report'] == '') {echo 'selected';} ?>>ทั้งหมด
                                    </option>
                                    <option value="0" <?php if ($_GET['report'] == '0') {echo 'selected';} ?>>รออนุมัติ
                                    </option>
                                    <option value="1" <?php if ($_GET['report'] == '1') {echo 'selected';} ?>>อนุมัติ
                                    </option>
                                    <option value="2" <?php if ($_GET['report'] == '2') {echo 'selected';} ?>>ไม่อนุมัติ
                                    </option>
                                    <option value="3" <?php if ($_GET['report'] == '3') {echo 'selected';} ?>>ยกเลิก
                                    </option>
                                </select>
                                <input class="btn btn-sm btn-primary" type="submit" name="substatus" /></input>
                            </form>
                        </div>
                        <?php
if (isset($_POST['substatus']))
{
		if ($_POST['selectstatus']!='' )
		{
			echo "<script> window.location = 'index.php?page=report&report=".$_POST['selectstatus']."'</script>"; 
		} else { 
			echo "<script> window.location = 'index.php?page=report'</script>"; 
		}
}
	if (isset($_GET['report'])) {
	$meSQL = "SELECT * FROM tb_event LEFT JOIN tb_rooms ON tb_event.rooms = tb_rooms.id_rooms WHERE status = {$_GET['report']} ORDER BY id DESC";
	} else {	
	$meSQL = "SELECT * FROM tb_event LEFT JOIN tb_rooms ON tb_event.rooms = tb_rooms.id_rooms ORDER BY id DESC";
	}
	$meQuery = $conn->query($meSQL);
?>

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
$rs2 = $conn->query($sql2)->fetch_assoc(); echo $rs2['count3']; ?> คน
                                </span>
                                <br>

                                <div class="mt-3" style="margin-top: 25px;">
                                    <span class="btn btn-yellow">&nbsp;รวมรายได้การจอง
                                        <?php $sql2 = "SELECT SUM(e.people) sum_incomeAll FROM tb_event e WHERE e.status=1";
$rs2 = $conn->query($sql2)->fetch_assoc(); echo number_format($rs2['sum_incomeAll']); ?> บาท
                                    </span>

                                    <span class="btn btn-teal">&nbsp;รายได้บริการทำเล็บ
                                        <?php $sql2 = "SELECT SUM(e.people) sum_income_1 FROM tb_event e WHERE e.status=1 AND e.rooms=1";
$rs2 = $conn->query($sql2)->fetch_assoc(); echo number_format($rs2['sum_income_1']); ?> บาท
                                    </span>

                                    <span class="btn btn-danger">&nbsp;รายได้บริการต่อขนตา
                                        <?php $sql2 = "SELECT SUM(e.people) sum_income_2 FROM tb_event e WHERE e.status=1 AND e.rooms=2";
$rs2 = $conn->query($sql2)->fetch_assoc(); echo number_format($rs2['sum_income_2']); ?> บาท
                                    </span>

                                    <span class="btn btn-info">&nbsp;รายได้บริการสักคิ้ว
                                        <?php $sql2 = "SELECT SUM(e.people) sum_income_3 FROM tb_event e WHERE e.status=1 AND e.rooms=3";
$rs2 = $conn->query($sql2)->fetch_assoc(); echo number_format($rs2['sum_income_3']); ?> บาท
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="page-header">
                            <h1><?php echo $title; ?></h1>
                        </div>
                        <!-- div.table-responsive -->
                        <!-- div.dataTables_borderWrap -->
                        <div class="table-responsive">
                            <table id="dtBasicExample" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">ลำดับ</th>
                                        <th class="center">ผู้จอง</th>
                                        <th class="center">บริการ</th>
                                        <th class="center">รายการที่จะทำการจอง</th>
                                        <th class="center">เริ่มเวลา</th>
                                        <th class="center">สิ้นสุดเวลา</th>
                                        <th class="center">หลักฐานการโอน</th>
                                        <th class="center">สถานะ</th>
                                        <th class="center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$i=1 ;
while ($rs = $meQuery->fetch_assoc()){
?>
                                    <tr>
                                        <td class="center"><?php echo $i++; ?></td>
                                        <td class="center"><?php echo $rs['member'];?></td>
                                        <td><?php echo $rs['name_rooms'];?></td>
                                        <td><?php echo $rs['title'];?></td>
                                        <td class="center">
                                            <?php $dateData=$rs['start']; echo thai_date_and_time(strtotime($dateData)); ?>
                                        </td>
                                        <td class="center">
                                            <?php $dateData=$rs['end']; echo thai_date_and_time(strtotime($dateData)); ?>
                                        </td>
                                        <td>
                                            <img src="./images/<?php echo $rs['img_event'];?>"
                                                style="width:50px;height:50px;"
                                                onclick="document.getElementById('modal01').style.display='block'">

                                            <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                                                <span
                                                    class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                                                <div class="w3-modal-content w3-animate-zoom">
                                                    <img src="./images/<?php echo $rs['img_event'];?>"
                                                        style="width:100%">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="center">
                                            <?php if ($rs['status']=='1'){echo '<span class="label label-sm label-info">','อนุมัติ','</span>';} else if ($rs['status']=='2'){echo '<span class="label label-sm label-danger">','ไม่อนุมัติ','</span>';} else if ($rs['status']=='3'){echo '<span class="label label-sm">','ยกเลิก','</span>';} else {echo '<span class="label label-sm label-warning">','รออนุมัติ','</span>';}?>
                                        </td>
                                        <td class="center">
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green"
                                                    href="index.php?page=report&action=edit&id=<?php echo $rs['id']; ?>&report=<?php echo $_GET['report']; ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                                <a class="blue"
                                                    href="javascript:popup('report/print.php?id=<?php echo $rs['id']; ?>','',680,500)">
                                                    <i class="ace-icon glyphicon glyphicon-print bigger-130"></i>
                                                </a>
                                                <a class="red"
                                                    href="report/action.php?action=delete&id=<?php echo $rs['id']; ?>&report=<?php echo $_GET['report']; ?>"
                                                    OnClick="return chkdel();">
                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                </a>
                                            </div>

                                            <div class="hidden-md hidden-lg">
                                                <div class="inline pos-rel">
                                                    <button class="btn btn-minier btn-yellow dropdown-toggle"
                                                        data-toggle="dropdown" data-position="auto">
                                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                    </button>

                                                    <ul
                                                        class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <a href="index.php?page=report&action=edit&id=<?php echo $rs['id']; ?>&report=<?php echo $_GET['report']; ?>"
                                                                class="tooltip-success" data-rel="tooltip"
                                                                title="แก้ไข">
                                                                <span class="green">
                                                                    <i
                                                                        class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:popup('report/print.php?id=<?php echo $rs['id']; ?>','',680,500)"
                                                                class="tooltip-info" data-rel="tooltip" title="พิมพ์">
                                                                <span class="blue">
                                                                    <i
                                                                        class="ace-icon glyphicon glyphicon-print bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="report/action.php?action=delete&id=<?php echo $rs['id']; ?>&report=<?php echo $_GET['report']; ?>"
                                                                class="tooltip-error" data-rel="tooltip" title="ลบ"
                                                                OnClick="return chkdel();">
                                                                <span class="red">
                                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php } ?>
                            <!-- แก้ไข -->
                            <?php if ($_GET['action']=='edit') { 
		$meSQL = "SELECT * FROM tb_event WHERE id ='{$_GET['id']}' ";
		$meQuery = $conn->query($meSQL);
    if ($meQuery == TRUE) {
        $meResult2 = $meQuery->fetch_assoc();
    } else {
        echo $conn->error;
    }
    ?>
                            <form enctype="multipart/form-data" class="form-horizontal" role="form" name="formregister"
                                method="post"
                                action="report\action.php?action=edit&report=<?php echo $_GET['report'];?>">
                                <div class="page-header">
                                    <h1>แก้ไข</h1>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="idrooms"> บริการ
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="idrooms" id="idrooms">
                                            <?php 
 $meSQL = "SELECT * FROM tb_rooms ORDER BY id_rooms asc";
 $meQuery = $conn->query($meSQL);
 while ($meResult = $meQuery->fetch_assoc()){
 ?>
                                            <option value="<?php echo $meResult['id_rooms'];?>"
                                                <?php if ($meResult['id_rooms'] == $meResult2['rooms']) {echo 'selected';}?>>
                                                <?php echo $meResult['name_rooms'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right">ผู้จอง</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="membershow" placeholder="" class="col-xs-10 col-sm-5"
                                            value="<?php echo $meResult2['member'];?>" disabled />
                                        <input type="hidden" name="member" value="<?php echo $meResult2['member'];?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right"
                                        for="title">รายการที่จะทำการจอง</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" id="title" placeholder=""
                                            class="col-xs-10 col-sm-5" value="<?php echo $meResult2['title'];?>"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="people">ราคาจอง</label>
                                    <div class="col-sm-2">
                                        <input type="number" name="people" id="people" placeholder=""
                                            class="col-xs-10 col-sm-5" value="<?php echo $meResult2['people'];?>"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="startdatepicker">
                                        เริ่ม</label>
                                    <div class="col-sm-2">
                                        <div class="input-group"> <input class="form-control datepicker"
                                                name="startdate" id="startdatepicker" type="text"
                                                data-date-format="yyyy-mm-dd" autocomplete="off"
                                                value="<?php $start = date('Y-m-d',strtotime($meResult2['start']));echo $start;?>"
                                                required> <span class="input-group-addon"> <i
                                                    class="fa fa-calendar bigger-110"></i> </span> </div>
                                    </div>
                                    <label class="col-sm-1 control-label no-padding-right" for="starttime"> เวลา
                                    </label>
                                    <div class="col-sm-2">
                                        <div class="input-group"> <input id="starttime" name="starttime" type="time"
                                                class="form-control"
                                                value="<?php $starttime = date('H:i',strtotime($meResult2['start']));echo $starttime;?>"
                                                required></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right"
                                        for="enddatepicker">สิ้นสุด</label>
                                    <div class="col-sm-2">
                                        <div class="input-group"> <input class="form-control datepicker" name="enddate"
                                                id="enddatepicker" type="text" data-date-format="yyyy-mm-dd"
                                                autocomplete="off"
                                                value="<?php $end = date('Y-m-d',strtotime($meResult2['end']));echo $end;?>"
                                                required> <span class="input-group-addon"> <i
                                                    class="fa fa-calendar bigger-110"></i> </span> </div>
                                    </div>
                                    <label class="col-sm-1 control-label no-padding-right" for="endtime"> เวลา </label>
                                    <div class="col-sm-3">
                                        <div class="input-group"> <input id="endtime" name="endtime" type="time"
                                                class="form-control"
                                                value="<?php $endtime = date('H:i',strtotime($meResult2['end']));echo $endtime;?>"
                                                required></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right"> สถานะการเข้าใช้ </label>
                                    <div class="col-sm-9">
                                        <?php 
 $meSQL = "SELECT * FROM tb_equipment ORDER BY id_equipment asc";
 $meQuery = $conn->query($meSQL);
 $equipment = explode(',' , $meResult2['equipment']);
 //echo $equipment;
 
 while ($meResult = $meQuery->fetch_assoc()){
	 if (in_array($meResult['name_equipment'], $equipment))
	 {
		  echo "<input type='checkbox' name='equip[]' value='".$meResult['name_equipment']."' checked>";
		 }else
		 {
		  echo "<input type='checkbox' name='equip[]' value='".$meResult['name_equipment']."' >";
		 }// end if
 ?>

                                        <label
                                            for="equip[]"><?php echo $meResult['name_equipment'];?></label>&nbsp;&nbsp;
                                        &nbsp;&nbsp;
                                        <?php $i++; if ($i == 3){echo '<br />';$i=0;} 
} ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="etc">อื่นๆ </label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" id="etc" name="etc"
                                            placeholder=""><?php echo $meResult2['etc'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="status" required> สถานะ
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status">
                                            <option value="0"
                                                <?php if ($meResult2['status'] == '0') {echo 'selected';}?>>รออนุมัติ
                                            </option>
                                            <option value="1"
                                                <?php if ($meResult2['status'] == '1') {echo 'selected';}?>>อนุมัติ
                                            </option>
                                            <option value="2"
                                                <?php if ($meResult2['status'] == '2') {echo 'selected';}?>>ไม่อนุมัติ
                                            </option>
                                            <option value="3"
                                                <?php if ($meResult2['status'] == '3') {echo 'selected';}?>>ยกเลิก
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-success" type="submit">
                                            <i class="ace-icon fa fa-check bigger-110"></i>
                                            ยืนยัน
                                        </button>
                                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                        &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                        <button class="btn btn-warning" type="button"
                                            onClick="javascript: window.history.back();">
                                            <i class="ace-icon fa fa-undo bigger-110"></i>
                                            ยกเลิก
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                                <input type="hidden" name="FilehdnOld" value="<?php echo $meResult['img_event'];?>">
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <script language="JavaScript">
                function chkdel() {
                    if (confirm('ต้องการลบรายการนี้หรือไม่')) {
                        return true;
                    } else {
                        return false;
                    }
                }
                </script>
                <script type="text/javascript">
                function popup(url, name, windowWidth, windowHeight) {
                    myleft = (screen.width) ? (screen.width - windowWidth) / 2 : 100;
                    mytop = (screen.height) ? (screen.height - windowHeight) / 2 : 100;
                    properties = "width=" + windowWidth + ",height=" + windowHeight;
                    properties += ",scrollbars=no, top=" + mytop + ",left=" + myleft + ",toolbar=no";
                    window.open(url, name, properties);
                }
                </script>
                <?php		
include 'templates/footer.php';
$conn->close();
?>