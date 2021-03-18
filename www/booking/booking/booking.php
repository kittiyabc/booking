<?php 
$title = 'บริการ'; //กำหนดไตเติ้ล
include 'templates/header.php';
include 'connect.php';
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="index.php?page=home">Home</a>
        </li>
        <li class="active">บริการ</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="row">
                    <div class="page-header">
                        <h1><?php echo $title; ?></h1>
                    </div>
                    <div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border">
                        <img src="https://positioningmag.com/wp-content/uploads/2018/07/open_kbank_new.png"
                            class="w3-hover-opacity" alt="Norway">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php		
include 'templates/footer.php';
$conn->close();
?>