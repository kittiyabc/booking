<?php 
error_reporting(0);
$title = 'ร้านทำเล็บ ต่อขนตา สักคิ้ว มมส'; 
include 'templates/header.php';
include 'connect.php';  
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {
    font-family: "Times New Roman", serif
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: serif;
    letter-spacing: 5px
}
</style>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="index.php?page=home">Home</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
<div id="home" class="w3-content">

    <!-- Image in Display Container-->
    <div class="w3-display-container w3-padding-top-48">

        <h1>ร้านทำเล็บ ต่อขนตา สักคิ้ว มมส</h1>
        <h3>ร้านทำเล็บ ต่อขนตา สักคิ้ว มมส</h3>
        <h4>เวลาทำการ : 9.00น-22.00น. </h4><br>
        <p class="w3-large w3-text-grey w3-hide-medium">
            ร้านทำเล็บบรรยากาศหรูหรานั่งสบาย มีสีเจลให้เลือกหลายสีมาก ทาพื้นเดี่ยว ๆ ก็สวย
            สไตล์เล็บของร้านนี้เขาจะเน้นแบบเรียบเป็นงานเล็บขับผิว มีแบบออมเบรไล่สี
            และกากเพชรระยิบระยับงามมากจ้า
            และสำหรับเล็บเท้าใครชอบมีปัญหาเล็บขบร้านนี้เขาก็ตัดหนังเก่งตะไบเล็บสวย โล่งเท้าจริงฟินสุด ๆ
            ชอบทรงเล็บแบบไหนก็บอกเขาได้เลยค่ะ .
        </p>


    </div>

    <!-- About -->
    <div id="about" class="w3-padding-top-64">
        <div class="w3-row">

            <div class="w3-half w3-padding-large w3-hide-small">
                <img src="home/img/227.jpg" class="w3-round w3-image w3-opacity-min" alt="Table" style="width:100%">
            </div>
            <div class="w3-half w3-padding-large">
                <h2>เพ้นเล็บเจล</h2>

                <h4>เพ้นลายการ์ตูน</h4>
                <p class="w3-text-grey">
                    แรงบันดาลใจจากการ์ตูนในวัยเด็กของเราเยอะมากค่ะ เช่น Winnie the Pooh, Mickey Mouse, Snoopy, Sesame
                    Street
                    .</p><br>

                <h4>ต่อเล็บเจล</h4>
                <p class="w3-text-grey">
                    การต่อเล็บแบบเจลนั้นจะใช้เพียงเจลที่ผสมมาเรียบร้อยแล้ว ซึ่งจะมีลักษณะคล้ายกับเจลใส่ผม กลิ่นไม่แรง
                    และจะใช้แสง UV ในการทำให้เจลแข็งตัว เล็บที่ได้ออกมาก็จะมีความใสกว่าแบบอะคริลิค .</p><br>

                <h4>ไล่สีออมเบร </h4>
                <p class="w3-text-grey">
                    เล็บเจลไล่สีออมเบรแบบนี้ ถ้าเลือกเป็นสีโทนชมพูหรือนู้ด จะดูสวยเป็นธรรมชาติ
                </p><br>

            </div>
        </div>
        <div class="w3-row">

            <div class="w3-col l6 m6 w3-padding-large">
                <h2>ต่อขนตา</h2>

                <h4>ต่อขนตาแบบเส้นต่อเส้น</h4>
                <p class="w3-text-grey">
                    เพิ่มความหวานให้กับดวงตา ด้วยการ ต่อขนตา แบบเส้นต่อเส้น ทำให้เห็นเส้นขนตาคมชัดเหมือนปัดมาสคาร่า
                    เส้นขนตาเรียงสวยอย่างเป็นธรรมชาติ</p><br>

                <h4>ต่อขนตาแบบเส้นต่อเส้นผสมช่อ</h4>
                <p class="w3-text-grey">
                    ต่อขนตาแบบเส้นต่อเส้นและผสมแบบจับช่อ โดยใช้ขนตาช่อสั้นเป็นฐาน คั่นด้วยเส้นที่มีความยาว
                    ทำให้ดวงตาดูสวยหวานและคมชัดอย่างเป็นธรรมชาติ</p><br>

                <h4>ต่อขนตาแบบช่อ</h4>
                <p class="w3-text-grey">
                    พิ่มความคมชัดให้กับดวงตา ด้วยเทคนิคต่อขนตาแบบจับช่อด้วยมือ ให้ลุคขนตาที่ดูฟุ้ง
                    และมีความหนาเหมือนกรีดอายไลเนอร์ เลือกได้ทั้งแบบธรรมชาติ และลุคจัดเต็ม
                    ขนตาเบาสบายถึงแม้ต่อจำนวนเส้นเยอะ
                </p><br>



            </div>

            <div class="w3-col l6 m6 w3-padding-large">
                <img src="home/img/20.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
            </div>

        </div>

        <div id="about" class="w3-padding-top-64">
            <div class="w3-row">

                <div class="w3-half w3-padding-large w3-hide-small">
                    <img src="home/img/21.jpg" class="w3-round w3-image w3-opacity-min" alt="Table" style="width:100%">
                </div>

                <div class="w3-half w3-padding-large">
                    <h2>สักคิ้ว</h2>

                    <h4>สักคิ้วลายเส้นธรรมชาติ</h4>
                    <p class="w3-text-grey">
                        เพิ่มความหวานให้กับดวงตา ด้วยการ ต่อขนตา แบบเส้นต่อเส้น ทำให้เห็นเส้นขนตาคมชัดเหมือนปัดมาสคาร่า
                        เส้นขนตาเรียงสวยอย่างเป็นธรรมชาติ</p><br>

                    <h4>สักคิ้ว 3 มิติ</h4>
                    <p class="w3-text-grey">
                        การวาดเลียนแบบเส้นขนคิ้วจริง ให้เหมือนการมีเส้นขนงอกนูนออกมา ทำให้คิ้วดูมีมิติเป็นรูปร่าง
                        โดยอาศัยเส้นขนจริงช่วยทำให้ดูเป็นธรรมชาติมากยิ่งขึ้น</p><br>

                    <h4>สักคิ้ว 6 มิติ</h4>
                    <p class="w3-text-grey">
                        การสร้างสรรค์งานเหล่านี้จะใช้หลักในการ Drawing
                        เพื่อลวงตาเราให้มองเห็นภาพมีลักษณะยื่นหรือนูนออกมาหรือมีมิติ
                    </p><br>

                </div>

            </div>
        </div>


        <!-- End Content -->
    </div>




    <?php		
include 'templates/footer.php';
?>