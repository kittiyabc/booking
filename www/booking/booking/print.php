<style type="text/css">
input[type='checkbox']:checked:after {
    background: #FFF;
    content: '\2714';
    color: #000;
}
</style>
<?php 
error_reporting (E_ALL ^ E_NOTICE);
session_start();
if ($_SESSION['status'] =='admin' || $_SESSION['status'] =='user' )  
{
include '../connect.php';
include '../function.php';
$meSQL = "SELECT * FROM tb_event AS t1 
LEFT JOIN tb_division AS t2 
ON t1.division = t2.id_division 
LEFT JOIN tb_style AS t3
ON t1.style = t3.id_style 
LEFT JOIN tb_rooms AS t4
ON t1.rooms = t4.id_rooms
LEFT JOIN tb_member AS t5
ON t1.id_member = t5.id_member WHERE id ='{$_GET['id']}' ";
		$meQuery = $conn->query($meSQL);
    if ($meQuery == TRUE) {
        $meResult = $meQuery->fetch_assoc();
    } else {
        echo $conn->error;
    }
} else {
    echo "<script>alert('คุณไม่มีสิทธิในการเข้าถึง!'); window.location ='index.php';</script>";
}
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel"
    xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta name=ProgId content=Excel.Sheet>
    <meta name=Generator content="Microsoft Excel 15">
    <link rel=Stylesheet href=stylesheet.css>
    <style type='text/css'>
    @font-face {
        font-family: 'THSarabunPSK';
        src: url('../assets/fonts/THSarabunPSK.eot') format('embedded-opentype'), url('../assets/fonts/THSarabunPSK.woff') format('woff'), url('../assets/fonts/THSarabunPSK.ttf') format('truetype'), url('../assets/fonts/THSarabunPSK.svg') format('svg');
        font-weight: normal;
        font-style: normal;
    }

    body {
        font-family: 'THSarabunPSK' !important;
    }
    </style>
</head>

<body link="#0563C1" vlink="#954F72" class=xl65>

    <table border=0 cellpadding=0 cellspacing=0 width=629 style='border-collapse:
 collapse;table-layout:fixed;width:476pt'>
        <col class=xl65 width=37 span=17 style='width:28pt'>
        <tr height=37 style='mso-height-source:userset;height:27.95pt'>
            <td colspan=17 height=37 class=xl68 width=629 style='height:27.95pt;
  width:476pt'>คิวของคุณ</td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=17 height=28 class=xl69 style='height:21.0pt'></td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=12 height=28 class=xl66 style='height:21.0pt'></td>
            <td class=xl65 colspan=5 align=left style='mso-ignore:colspan'>
                วันที่ <?php 
                $date=date("d-m-Y");
                echo   $date;
                ?>
            </td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=3 class=xl66>รายการจอง</td>
            <td colspan=4 class=xl67><?php echo $meResult['title'];?></td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=3 class=xl66>ผู้ดูแลระบบ</td>
            <td colspan=16 class=xl67><?php echo $boss ;?></td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=17 height=28 class=xl65 style='height:21.0pt'></td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=3 height=28 class=xl65 style='height:21.0pt'></td>
            <td colspan=2 class=xl67>ผู้จอง</td>
            <td colspan=5 class=xl67><?php echo $meResult['ntitle'].$meResult['member'];?></td>
            <td colspan=3 class=xl66>สถานะการใช้งาน</td>
            <td colspan=5 class=xl67><?php echo $meResult['position'];?></td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=3 class=xl66>เบอร์โทรศัพท์</td>
            <td colspan=4 class=xl67><?php echo $meResult['phone'];?></td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=3 class=xl66>บริการที่จอง</td>
            <td colspan=4 class=xl67><?php echo $meResult['name_rooms'];?></td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=2 height=28 class=xl66 style='height:21.0pt'>วันที่</td>
            <td colspan=2 class=xl67><?php echo date('d',strtotime($meResult['start']));?></td>
            <td class=xl65 align=left>เดือน</td>
            <td colspan=3 class=xl67><?php echo $thai_month_arr[date("n",strtotime($meResult['start']))];?></td>
            <td class=xl65 align=left>พ.ศ.</td>
            <td colspan=2 class=xl67><?php echo date('Y',strtotime($meResult['start']))+543;?></td>
            <td class=xl65 align=left>เวลา</td>
            <td colspan=5 class=xl67><?php echo date('H:i',strtotime($meResult['start']));?> น.</td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=2 height=28 class=xl66 style='height:21.0pt'>ถึงวันที่</td>
            <td colspan=2 class=xl67><?php echo date('d',strtotime($meResult['end']));?></td>
            <td class=xl65 align=left>เดือน</td>
            <td colspan=3 class=xl67><?php echo $thai_month_arr[date('n',strtotime($meResult['end']))];?></td>
            <td class=xl65 align=left>พ.ศ.</td>
            <td colspan=2 class=xl67><?php echo date('Y',strtotime($meResult['end']))+543;?></td>
            <td class=xl65 align=left>เวลา</td>
            <td colspan=5 class=xl67><?php echo date('H:i',strtotime($meResult['end']));?> น.</td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=4 height=28 class=xl66 style='height:21.0pt'>ราคาจอง</td>
            <td colspan=2 class=xl67 style="text-align:center;"><?php echo $meResult['people'];?></td>
            <td class=xl65 align=left>บาท</td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=17 height=28 class=xl66 style='height:21.0pt'>สถานะการเข้าใช้</td>
        </tr>
        <tr height=28 style='mso-height-source:userset;height:21.0pt'>
            <td colspan=17 rowspan=3 height=84 class=xl65 style='height:63.0pt;'>
                <div style="padding-left:100px;">
                    <?php 
 $meSQL2 = "SELECT * FROM tb_equipment ORDER BY id_equipment asc";
 $meQuery2 = $conn->query($meSQL2);
 $equipment = explode(',' , $meResult['equipment']);
 //echo $equipment;
 while ($meResult2 = $meQuery2->fetch_assoc()){
	 if (in_array($meResult2['name_equipment'], $equipment))
	 {
		  echo "<input type='checkbox' disabled='false' name='equip[]' value='".$meResult2['name_equipment']."' checked >";
		 }else
		 {
		  echo "<input type='checkbox' disabled='false' name='equip[]' value='".$meResult2['name_equipment']."' >";
		 }// end if
 ?>

                    <label for="equip[]"><?php echo $meResult2['name_equipment'];?></label>&nbsp;&nbsp; &nbsp;&nbsp;
                    <?php $i++; if ($i == 3){echo '<br />';$i=0;} 
} ?>
                </div>
            </td>
        </tr>
    </table>
    <div style="text-align:center;"><input type="button" name="Button" value="พิมพ์"
            onclick="javascript:this.style.display='none';window.print();"></div>
</body>

</html>