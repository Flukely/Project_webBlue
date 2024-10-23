<?php
session_start();  // เริ่ม session
session_destroy();  // ลบ session ทั้งหมด
header("Location: index.html");  // เปลี่ยนเส้นทางกลับไปที่หน้า login
exit();
?>
