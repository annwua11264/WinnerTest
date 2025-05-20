<?php
$host = "fdb1028.awardspace.net";
$port = 3306;
$dbname = "4636854_winnerenergy";
$username = "4636854_winnerenergy";
$password = "Y4uynogc11264";

// สร้างการเชื่อมต่อ
$conn = new mysqli($host, $username, $password, $dbname, $port);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}
?>
