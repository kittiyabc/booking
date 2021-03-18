<?php
// $conn = mysqli_connect("localhost", "root", "", "room");
//$conn = mysqli_connect("localhost", "root", "", "room");

 $conn = mysqli_connect('db', 'root', '12345678', "room");

mysqli_set_charset($conn, 'utf8');
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$boss = 'พนักงาน' ; //ชื่อตำแหน่งหัวหน้าใช้ในปริ้นหนังสือ
?>