<?php 
$title = 'สมัครสมาชิก'; //กำหนดไตเติ้ล
include 'templates/header.php';
include 'connect.php';
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="index.php?page=home">Home</a>
        </li>
        <li class="active">สมัครสมาชิก</li>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
<!-- เพิ่ม -->
<form class="form-horizontal" role="form" name="formregister" method="post" action="member\action.php?action=add">
    <div class="page-header">
        <h1>เพิ่มสมาชิก</h1>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="txtUsername"> ชื่อผู้ใช้
        </label>
        <div class="col-sm-9">
            <input type="text" name="txtUsername" id="txtUsername" placeholder="Username" class="col-xs-10 col-sm-5"
                value="" required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="txtPassword"> รหัสผ่าน
        </label>
        <div class="col-sm-9">
            <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" class="col-xs-10 col-sm-5"
                value="" required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="txtConPassword">
            ยืนยันรหัสผ่าน </label>
        <div class="col-sm-9">
            <input type="password" name="txtConPassword" id="txtConPassword" placeholder="Password"
                class="col-xs-10 col-sm-5" value="" required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="title"> คำนำหน้า
        </label>
        <div class="col-sm-9">
            <select name="title" id="title">
                <option value="นาย">นาย</option>
                <option value="นางสาว">นางสาว</option>
                <option value="นาง">นาง</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="txtfirstname"> ชื่อ
        </label>
        <div class="col-sm-9">
            <input type="text" name="txtfirstname" id="txtfirstname" placeholder="Firstname" class="col-xs-10 col-sm-5"
                value="" required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="txtsurname"> นามสกุล
        </label>
        <div class="col-sm-9">
            <input type="text" name="txtsurname" id="txtsurname" placeholder="Surname" class="col-xs-10 col-sm-5"
                value="" required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="position">สถานะการเข้าใช้</label>
        <div class="col-sm-9">
            <input type="text" name="position" id="position" placeholder="Position" class="col-xs-10 col-sm-5" value=""
                required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="phone">เบอร์โทรศัพท์</label>
        <div class="col-sm-9">
            <input type="text" name="phone" id="phone" placeholder="Phone" class="col-xs-10 col-sm-5" value=""
                required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="txtemail"> อีเมลล์
        </label>
        <div class="col-sm-9">
            <input type="text" name="txtemail" id="txtemail" placeholder="Email" class="col-xs-10 col-sm-5" value=""
                required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="status"> ระดับสิทธิ์
        </label>
        <div class="col-sm-9">
            <select name="status" id="status">
                <option value="admin">admin</option>
                <option value="user" selected>user</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="active"> สถานะ </label>
        <div class="col-sm-9">
            <select name="active" id="active">
                <option value="1">ใช้งานได้</option>
                <option value="0">รอการยืนยัน</option>
            </select>
        </div>
    </div>
    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-primary" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                ยืนยัน
            </button>
            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
            <button class="btn btn-warning" type="button" onClick="javascript: window.history.back();">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                ยกเลิก
            </button>
        </div>
    </div>
</form>
<?php		
include 'templates/footer.php';
$conn->close();
?>