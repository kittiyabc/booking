<?php 
$title = 'ระบบจองคิว'; //กำหนดไตเติ้ล
include 'templates/header.php';
include 'connect.php';
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php?page=home">Home</a>
							</li>
							<!--<li class="active">Calendar</li>-->
						</ul><!-- /.breadcrumb -->
</div>				   
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
		<div class="main-content-inner">
			<div class="page-content" >
                <div class="row" >
                    <div class="col-sm-12">
						<!--<div class="space"></div>-->
//ข้อความ
				</div>
            </div>	
		</div>			
<?php		
include 'templates/footer.php';
$conn->close();
?>
                              