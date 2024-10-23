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

// เพิ่มสินค้า
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    // จัดการการอัปโหลดไฟล์ภาพ
    $image_url = 'default_image.png'; // ค่าเริ่มต้น
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/"; // โฟลเดอร์สำหรับเก็บภาพ
        $image_url = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image_url);
    }

    $sql = "INSERT INTO all_products (product_name, category, price, quantity_in_stock, image_url)
            VALUES ('$product_name', '$category', $price, $quantity, '$image_url')";

    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// ลบสินค้า
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];

    $sql = "DELETE FROM all_products WHERE product_id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Product removed successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// แก้ไขสินค้า
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // จัดการการอัปโหลดไฟล์ภาพ
    $image_url = $_POST['current_image']; // ใช้ URL ปัจจุบันเป็นค่าเริ่มต้น
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/"; // โฟลเดอร์สำหรับเก็บภาพ
        $image_url = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image_url);
    }

    $sql = "UPDATE all_products SET 
            product_name='$product_name', 
            category='$category', 
            price=$price, 
            quantity_in_stock=$quantity,
            image_url='$image_url' 
            WHERE product_id=$product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// ฟังก์ชันสำหรับดึงข้อมูลสินค้าสำหรับการแก้ไข
$product_to_edit = null;
if (isset($_GET['edit_id'])) {
    $product_id = $_GET['edit_id'];
    $sql = "SELECT * FROM all_products WHERE product_id = $product_id";
    $result = $conn->query($sql);
    $product_to_edit = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #d81b60;
        }

        h2 {
            color: #d81b60;
        }

        form {
            background-color: #fff;
            border: 1px solid #d81b60;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 50%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #d81b60;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #c2185b;
        }

        table {
            width: 95%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #d81b60;
        }

        th {
            background-color: #d81b60;
            color: white;
            padding: 10px;
        }

        td {
            padding: 3px;
            text-align: center;
        }

        img {
            max-width: 50px;
            max-height: 50px;
        }
    </style>
</head>
<body>
    <h1>Stock Management</h1>
    
    <h2>Add Product</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Product Name:</label>
        <input type="text" name="product_name" required>
        <label>Category:</label>
        <input type="text" name="category" required>
        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>
        <label>Quantity:</label>
        <input type="number" name="quantity" required>
        <label>Image:</label>
        <input type="file" name="image" accept="image/*">
        <input type="submit" name="add_product" value="Add Product">
    </form>

    <h2>Remove Product</h2>
    <form action="" method="POST">
        <label>Product ID:</label>
        <input type="number" name="product_id" required>
        <input type="submit" name="remove_product" value="Remove Product">
    </form>

    <h2>Edit Product</h2>
    <?php if ($product_to_edit): ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $product_to_edit['product_id']; ?>">
        <input type="hidden" name="current_image" value="<?php echo $product_to_edit['image_url']; ?>">
        <label>Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $product_to_edit['product_name']; ?>" required>
        <label>Category:</label>
        <input type="text" name="category" value="<?php echo $product_to_edit['category']; ?>" required>
        <label>Price:</label>
        <input type="number" name="price" step="0.01" value="<?php echo $product_to_edit['price']; ?>" required>
        <label>Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $product_to_edit['quantity_in_stock']; ?>" required>
        <label>Image:</label>
        <input type="file" name="image" accept="image/*">
        <input type="submit" name="edit_product" value="Update Product">
    </form>
    <?php else: ?>
    <form action="" method="GET">
        <label>Product ID:</label>
        <input type="number" name="edit_id" required>
        <input type="submit" value="Edit Product">
    </form>
    <?php endif; ?>
    
    <h2>Current Stock</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
        </tr>
        <?php
        // Fetch and display products
        $sql = "SELECT * FROM all_products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['product_id']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['category']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['quantity_in_stock']}</td>
                        <td><img src='{$row['image_url']}' alt='{$row['product_name']}'></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No products found</td></tr>";
        }

        // ปิดการเชื่อมต่อ
        $conn->close();
        ?>
    </table>
</body>
</html>
