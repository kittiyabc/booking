<?php
session_start();
if ($_SESSION['status']!='admin' and $_SESSION['status']!='user') {
	echo "<script>alert('session ผิดผลาด'); window.location ='../index.php';</script>";
	exit();
} else {
include '../connect.php'; 
}
//เพิ่มข้อมูล
if ($_GET['action']=='add'){
$sql = "SELECT * FROM tb_rooms WHERE id_rooms = '{$_POST['idrooms']}' ";
$meResult = $conn->query( $sql )->fetch_assoc() ;   
$strYear = date('Y',strtotime($_POST['startdate']))-543;
$strMonth= date('m',strtotime($_POST['startdate']));
$strDay= date('d',strtotime($_POST['startdate']));
$startdate = $strYear.'-'.$strMonth.'-'.$strDay.'T'.$_POST['starttime'].':00';

$endstrYear = date('Y',strtotime($_POST['enddate']))-543;
$endstrMonth= date('m',strtotime($_POST['enddate']));
$endstrDay= date('d',strtotime($_POST['enddate']));
$enddate = $endstrYear.'-'.$endstrMonth.'-'.$endstrDay.'T'.$_POST['endtime'].':00';

$equip = implode(',', $_POST['equip']);	
if($_FILES["img_event"]["name"] != "")
        {			
			$fileimg = basename($_FILES["img_event"]["name"]);
        	move_uploaded_file($_FILES["img_event"]["tmp_name"],"../images/".$fileimg);
        }
$meSQL = "INSERT INTO tb_event (id_member,rooms,title,start,end,color,people,equipment,member,etc,img_event) VALUES ('".$_POST['memberid']."','".$_POST['idrooms']."','".$_POST['title']."','".$startdate."','".$enddate."','".$meResult['color_rooms']."','".$_POST['people']."','".$equip."','".$_POST['member']."','".$_POST['etc']."','".$fileimg."')";
		$meQuery = $conn->query($meSQL);		
		
		if ($meQuery == TRUE) {
			echo "<script>alert('เพิ่มข้อมูลเสร็จเรียบร้อยแล้ว <br>เมื่อถึงเวลาที่จองคิว เกินเวลา 15นาที พนักงาานจะทำการยกเลิกการจองนั้นทันที และไม่สามารถคืนเงินได้'); window.location ='../index.php?page=mybooking';</script>";
        } else {
			echo "<script>alert('มีปัญหาการบันทึกข้อมูล กรุณากลับไปบันทึกใหม่');history.back(-1);</script>";
			exit();
        
		}	
}	

//แก้ไขข้อมูล
if ($_GET['action']=='edit'){
$sql = "SELECT * FROM tb_rooms WHERE id_rooms = '{$_POST['idrooms']}' ";
$meResult = $conn->query( $sql )->fetch_assoc() ;   
$strYear = date('Y',strtotime($_POST['startdate']))-543;
$strMonth= date('m',strtotime($_POST['startdate']));
$strDay= date('d',strtotime($_POST['startdate']));
$startdate = $strYear.'-'.$strMonth.'-'.$strDay.'T'.$_POST['starttime'].':00';

$endstrYear = date('Y',strtotime($_POST['enddate']))-543;
$endstrMonth= date('m',strtotime($_POST['enddate']));
$endstrDay= date('d',strtotime($_POST['enddate']));
$enddate = $endstrYear.'-'.$endstrMonth.'-'.$endstrDay.'T'.$_POST['endtime'].':00';

if($_FILES["img_event"]["name"] != "")
        {
			        		//*** Delete Old File ***//
        	@unlink("../images/".$_POST["FilehdnOld"]);
			$fileimg = basename($_FILES["img_event"]["name"]);	
        	move_uploaded_file($_FILES["img_event"]["tmp_name"],"../images/".$fileimg);     	
        }
		else{
			$filename = $_POST['FilehdnOld'];
		}$meSQL = "UPDATE tb_event ";
$equip = implode(',', $_POST['equip']);
$meSQL .="SET rooms='{$_POST['idrooms']}',"
. "title='{$_POST['title']}',"
. "start='{$startdate}',"
. "end='{$enddate}',"
. "color='{$meResult['color_rooms']}',"
. "people='{$_POST['people']}',"
. "equipment='{$equip}',"
. "etc='{$_POST['etc']}' "
. "img_event='{$_POST['img_event']}',";
$meSQL .= "WHERE id ='{$_POST['id']}' ";

$meQuery = $conn->query($meSQL);			
	if ($meQuery == TRUE) {
		echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว  ');window.location ='../index.php?page=mybooking'; </script>";
        } else {
		echo "<script>alert('มีปัญหาการบันทึกข้อมูล กรุณากลับไปบันทึกใหม่');history.back(-1);</script>";
		exit();
        }
}	
//เปลี่ยนสถานะ
if ($_GET['action']=='change'){
		if ($_GET['status']=='0'){
			$meSQL = "UPDATE tb_event SET status='3'";
		} else if($_GET['status']=='3'){
			$meSQL = "UPDATE tb_event SET status='0'";
}
$meSQL .= "WHERE id ='{$_GET['id']}' ";
$meQuery = $conn->query($meSQL);			
	if ($meQuery == TRUE) {
		echo "<script>window.location ='../index.php?page=mybooking';</script>";
        } else {
		echo "<script>alert('มีปัญหาการบันทึกข้อมูล กรุณากลับไปบันทึกใหม่');history.back(-1);</script>";
		exit();
        }
}	
//ปิด
$conn->close();
?>