<?php
session_start();
if ($_SESSION['id'] != '') {
include 'connect.php';
$sql = "SELECT * FROM tb_member WHERE id_member = '{$_SESSION['id']}' ";
$rs = $conn->query( $sql )->fetch_assoc() ;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>

    <meta name="description" content="top menu &amp; navigation" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="assets/css/colorbox.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
		<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!--[if lte IE 9]>
		<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <link rel="stylesheet" href="assets/fullcalendar-3.6.2/fullcalendar.min.css" />
    <link href="assets/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <script src="assets/js/ace-extra.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
    <script src="js/popper.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">

    </script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">

</head>

<body class="no-skin">
    <div class="w3-container w3-metro-magenta">
        <div class="container-fluid">
            <a class="navbar-header" href="index.html"> <img src="templates/2.png" alt="logo"> </a>

            <nav role=" navigation" class="navbar-menu pull-left ">
                <ul class="nav navbar-nav">
                    <li class="<?php if ($_GET['page']=='booking'){echo 'active';}?>">
                        <a href="index.php">
                            Home
                        </a>
                    </li>
                    <li class="<?php if ($_GET['page']=='booking'){echo 'active';}?>">
                        <a href="index.php?page=booking">
                            <i class="ace-icon fa  fa-pencil-square-o"></i>
                            จองคิว
                        </a>
                    </li>
                    <li class="<?php if ($_GET['page']=='rooms'){echo 'active';}?>">
                        <a href="index.php?page=rooms">
                            <i class="ace-icon fa  fa-coffee"></i>
                            บริการ
                        </a>
                    </li>
                    <?php if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'user') {?>
                    <li class="<?php if ($_GET['page']=='mybooking'){echo 'active';}?>">
                        <a href="index.php?page=mybooking">
                            <i class="ace-icon fa  fa-calendar"></i>
                            รายการจองของฉัน
                        </a>
                    </li>
                    <?php } ?>
                    <li class="<?php if ($_GET['page']=='member'){echo 'active';}?>">
                        <a href="index.php?page=member">
                            <i class="ace-icon fa fa-users"></i>
                            สมาชิก
                        </a>
                    </li>
                    <?php   if ($_SESSION['status'] =='admin')  { ?>
                    <li class="<?php if ($_GET['page']=='report'){echo 'active';}?>">
                        <a href="index.php?page=report">
                            <i class="ace-icon fa fa-check-square-o"></i>
                            รายงาน
                        </a>
                    </li>
                    <li
                        class="<?php if ($_GET['page']=='setrooms' || $_GET['page']=='satting' || $_GET['page']=='style' || $_GET['page']=='equip' ){echo 'active';}?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ace-icon fa fa-cogs"></i>
                            ตั้งค่า
                            &nbsp;
                            <i class="ace-icon fa fa-angle-down bigger-110"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                            <li>
                                <a href="index.php?page=setrooms">
                                    <i class="ace-icon fa fa-coffee bigger-110 blue"></i>
                                    บริการ
                                </a>
                            </li>
                            <li>
                                <a href="index.php?page=satting">
                                    <i class="ace-icon fa fa-users bigger-110 blue"></i>
                                    สมาชิก
                                </a>
                            </li>

                            <li>
                                <a href="index.php?page=style">
                                    <i class="ace-icon fa fa-eye bigger-110 blue"></i>
                                    รูปแบบเวลา
                                </a>
                            </li>

                            <li>
                                <a href="index.php?page=equip">
                                    <i class="ace-icon fa fa-camera-retro bigger-110 blue"></i>
                                    สถานะการเข้าใช้
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
            <div class="navbar-buttons navbar-header pull-right " role="navigation">
                <?php if ($_SESSION['id'] != '') {?>
                <ul class="nav ace-nav">
                    <?php 	if ($_SESSION['status'] == 'admin') {
$sql2 = "SELECT COUNT(id) AS count1 FROM tb_event WHERE status = 0 ";
$rs2 = $conn->query($sql2)->fetch_assoc();?>
                    <li class="transparent dropdown-modal open">
                        <a class="dropdown-toggle" href="index.php?page=report&report=0">
                            <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                            <span
                                class="badge badge-important"><?php if ($rs2['count1']==0){echo '';}else {echo $rs2['count1'];}?></span>
                        </a>
                    </li>
                    <?php } ?>
                    <li class="light-pink dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                            <span class="user-info">
                                <small>ยินดีต้อนรับ</small>
                                <?php 
echo $rs['title'].$rs['firstname'].'  '.$rs['surname'];
?>
                            </span>
                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul
                            class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="index.php?page=user">
                                    <i class="ace-icon fa fa-cog"></i>
                                    ตั้งค่า
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="member/logout.php">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    ออกจากระบบ
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php } else {?>
                <ul class="nav ace-nav-justified">
                    <li>
                        <a href="index.php?page=login">
                            <i class="ace-icon fa  fa-laptop"></i>
                            เข้าสู่ระบบ
                        </a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div><!-- /.navbar-container -->
    </div>