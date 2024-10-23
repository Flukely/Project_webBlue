<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "webdatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// ถ้ามีการส่งแบบฟอร์มล็อกอิน
if (isset($_POST['login'])) {
               $log_username = $_POST['username'];
               $log_password = $_POST['password'];
               
               // ตรวจสอบชื่อผู้ใช้และรหัสผ่านโดยใช้ prepared statement
               $sql = $conn->prepare("SELECT * FROM users WHERE username=?");
               $sql->bind_param("s", $log_username);
               $sql->execute();
               $result = $sql->get_result();
               
               if ($result->num_rows > 0) {
                   $row = $result->fetch_assoc();
                   // ตรวจสอบรหัสผ่าน
                   if (password_verify($log_password, $row['password'])) {
                       $_SESSION['user_id'] = $row['id'];
                       // ใช้ JavaScript เพื่อ redirect ไปยังเว็บไซต์
                       echo "<script>window.location.href='https://blue-160946.github.io/';</script>";
                       exit();
                   } else {
                       echo "<script>alert('Incorrect password!');</script>";
                   }
               } else {
                   echo "<script>alert('Username not found!');</script>";
               }
               $sql->close();
           }
           
           // ฟังก์ชันสำหรับเพิ่มสินค้าในตะกร้า
           function addToCart($product_id, $quantity) {
               global $conn;
           
               if (!isset($_SESSION['user_id'])) {
                   return "กรุณาเข้าสู่ระบบ";
               }
           
               $user_id = $_SESSION['user_id'];
           
               // เช็คว่ามีสินค้านี้ในตะกร้าหรือไม่
               $stmt = $conn->prepare("SELECT * FROM cart_items WHERE user_id = ? AND product_id = ?");
               $stmt->bind_param("ii", $user_id, $product_id);
               $stmt->execute();
               $result = $stmt->get_result();
           
               if ($result->num_rows > 0) {
                   // หากมีอยู่แล้วให้เพิ่มจำนวน
                   $stmt = $conn->prepare("UPDATE cart_items SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?");
                   $stmt->bind_param("iii", $quantity, $user_id, $product_id);
               } else {
                   // หากยังไม่มีให้เพิ่มรายการใหม่
                   $stmt = $conn->prepare("INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)");
                   $stmt->bind_param("iii", $user_id, $product_id, $quantity);
               }
               $stmt->execute();
               return "เพิ่มสินค้าในตะกร้าเรียบร้อย";
           }
           
           // ฟังก์ชันสำหรับแสดงตะกร้าสินค้า
           function viewCart() {
               global $conn;
           
               if (!isset($_SESSION['user_id'])) {
                   return "กรุณาเข้าสู่ระบบ";
               }
           
               $user_id = $_SESSION['user_id'];
               $stmt = $conn->prepare("SELECT c.product_id, c.quantity, p.product_name, p.price 
                                        FROM cart_items c 
                                        JOIN all_products p ON c.product_id = p.product_id 
                                        WHERE c.user_id = ?");
               $stmt->bind_param("i", $user_id);
               $stmt->execute();
               $result = $stmt->get_result();
           
               if ($result->num_rows > 0) {
                   $cart_items = [];
                   while ($row = $result->fetch_assoc()) {
                       $cart_items[] = "Product Name: " . $row['product_name'] . " | Quantity: " . $row['quantity'] . " | Price: " . $row['price'];
                   }
                   return implode("<br>", $cart_items);
               } else {
                   return "ตะกร้าของคุณว่างเปล่า";
               }
           }
           
           // ฟังก์ชันสำหรับออกจากระบบ
           function logout() {
               session_unset();
               session_destroy();
               return "ออกจากระบบเรียบร้อย";
           }
           
           // ตรวจสอบการทำงาน
           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               if (isset($_POST['add_to_cart'])) {
                   $product_id = $_POST['product_id'];
                   $quantity = $_POST['quantity'];
                   echo addToCart($product_id, $quantity);
               } elseif (isset($_POST['view_cart'])) {
                   echo viewCart();
               } elseif (isset($_POST['logout'])) {
                   echo logout();
               }
           }
           ?>
           
           <!DOCTYPE html>
           <html lang="th">
           <head>
               <meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>Login & Register</title>
               <style>
                   /* สีหลักและฟอนต์ */
                   :root {
                       --primary-color: #f8bbd0; /* ชมพูอ่อน */
                       --secondary-color: #f06292; /* ชมพูเข้ม */
                       --text-color: #333;
                       --background-color: #fff;
                       --font-family: 'Roboto', sans-serif;
                   }
                   
                   body {
                       font-family: var(--font-family);
                       background-color: var(--background-color);
                       color: var(--text-color);
                       margin: 0;
                       padding: 0;
                       display: flex;
                       justify-content: center;
                       align-items: center;
                       height: 100vh;
                   }
                   
                   .login-container {
                       background-color: var(--background-color);
                       padding: 40px;
                       border-radius: 10px;
                       box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                       width: 350px;
                       text-align: center;
                   }
                   
                   h1 {
                       color: var(--primary-color);
                       margin-bottom: 20px;
                   }
                   
                   .input-group {
                       margin-bottom: 15px;
                       text-align: left;
                   }
                   
                   .input-group label {
                       color: var(--secondary-color);
                       display: block;
                       font-weight: bold;
                       margin-bottom: 5px;
                   }
                   
                   .input-group input {
                       width: 100%;
                       padding: 10px;
                       border: 1px solid var(--primary-color);
                       border-radius: 5px;
                       box-sizing: border-box;
                   }
                   
                   button {
                       background-color: var(--primary-color);
                       border: none;
                       color: white;
                       padding: 10px 20px;
                       border-radius: 20px;
                       width: 100%;
                       font-size: 16px;
                       cursor: pointer;
                   }
                   
                   button:hover {
                       background-color: var(--secondary-color);
                   }
               </style>
           </head>
           <body>
           
           <div class="login-container">
               <!-- แบบฟอร์มล็อกอิน -->
               <h1>Login</h1>
               <form action="" method="post">
                   <div class="input-group">
                       <label for="username">Username</label>
                       <input type="text" id="username" name="username" required>
                   </div>
                   <div class="input-group">
                       <label for="password">Password</label>
                       <input type="password" id="password" name="password" required>
                   </div>
                   <button type="submit" name="login">Login</button>
               </form>
               <br>
               <button onclick="document.location = 'register.php'">Register</button> 
           </div>
           
           </body>
           </html>