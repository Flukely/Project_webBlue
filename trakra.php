<?php
session_start();  // เริ่ม session

// ตรวจสอบว่าผู้ใช้ได้ล็อกอินแล้วหรือยัง
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ka_jang_handmade</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Mali:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="img/logo-1.png" width="200px">   
        </a>
        
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="user_dashboard.php" class="nav-item nav-link active"><i class="fa-solid fa-house me-2"></i>Home</a>
                <a href="meaning-of-flowers.html" class="nav-item nav-link"><i class="fa-solid fa-leaf me-2"></i>Meaning of Flowers</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Our Shop</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="ourshop-flower-01.html" class="dropdown-item">Flower</a>
                        <a href="ourshop-accessories-01.html" class="dropdown-item">Accessorie</a>
                        <a href="ourshop-keychain-01.html" class="dropdown-item">Keychain</a>
                    </div>
                </div>
                <a href="about.html" class="nav-item nav-link"><i class="fa-solid fa-user me-2"></i>About</a>
            </div>
            <a href="https://www.instagram.com/ka_jang_handmade/"
                class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Order Products<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Products Section Start -->
    <div class="container-xxl py-3">
        <div class="container">
            <div class="section-title text-start">
                <h1 class="display-6 mb-5">เพิ่มลงกระตร้า เอ้ย!!!ตระกร้า</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-1/product-1.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">FLODUCKY</h5>
                            <small>299 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('FLODUCKY', 299, 'img/flower/page-1/product-1.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/keychain/page-1/product-1.jpg" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Broccoli 🥦</h5>
                            <small>59 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Broccoli', 59, 'img/keychain/page-1/product-1.jpg')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-1/product-2.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Sunshine ☀️</h5>
                            <small>299 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Sunshine', 299, 'img/flower/page-1/product-2.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-1/product-3.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Love Sampler</h5>
                            <small>359 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Love Sampler', 359, 'img/flower/page-1/product-3.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-1/product-4.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Forgotmenot</h5>
                            <small>129 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Forgotmenot', 129, 'img/flower/page-1/product-4.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-1/product-5.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Love Sun Blue 1</h5>
                            <small>299 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Sun Blue', 299, 'img/flower/page-1/product-5.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-1/product-6.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Sweetie</h5>
                            <small>229 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Sweetie', 229, 'img/flower/page-1/product-6.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-1/product-7.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Bunny Bunny</h5>
                            <small>359 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Bunny Bunny', 299, 'img/flower/page-1/product-7.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-1/product-8.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Sun Blue 2</h5>
                            <small>359 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Sun Blue 2', 299, 'img/flower/page-1/product-8.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-2/product-1.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Sunflower</h5>
                            <small>129 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Sunflower', 129, 'img/flower/page-2/product-1.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-2/product-3.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Sunlit Memories</h5>
                            <small>218 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Sunlit Memories', 218, 'img/flower/page-2/product-3.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-2/product-4.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Daisy 🌼</h5>
                            <small>129 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Love Sampler', 129, 'img/flower/page-2/product-4.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/flower/page-2/product-5.png" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Tulips 🌷</h5>
                            <small>79 ฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Tulips 🌷', 79, 'img/flower/page-2/product-5.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/keychain/page-1/product-2.jpg" alt="">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Moji</h5>
                            <small>59฿</small><br><br>
                            <button class="btn btn-primary mt-2" onclick="addToCart('Moji', 59, 'img/keychain/page-1/product-2.jpg')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/accessories/page-1/product-1.png" alt="">
                        </div>
                          <div class="text-center border border-5 border-light border-top-0 p-4">
                          <h5 class="mb-0">Tulip twist</h5>
                          <small>69 ฿</small><br><br>
                          <button class="btn btn-primary mt-2" onclick="addToCart('Tulip twist', 69, 'img/accessories/page-1/product-1.png')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative rounded-3">
                            <img class="img-fluid" src="img/keychain/page-1/product-3.jpg" alt="">
                        </div>
                          <div class="text-center border border-5 border-light border-top-0 p-4">
                          <h5 class="mb-0">Jellyfish</h5>
                          <small>79 ฿</small><br><br>
                          <button class="btn btn-primary mt-2" onclick="addToCart('Jellyfish', 79, 'img/keychain/page-1/product-3.jpg')">เพิ่มลงตะกร้า</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products Section End -->

    <!-- ตะกร้าสินค้า Start -->
    <div class="container py-5">
        <h1 class="display-5 mb-5 text-center">รายการสั่งซื้อและค่าเสียหาย</h1>
        <div class="row">
            <div class="col-lg-8">
                <div id="cart-items"></div> <!-- แสดงรายการสินค้าที่เพิ่มลงในตะกร้า -->
            </div>
            <div class="col-lg-4">
                <h5 class="mb-3">สรุปคำสั่งซื้อ</h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>ยอดรวมสินค้า (Subtotal)</span>
                        <strong id="subtotal">0 ฿</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>ค่าจัดส่ง</span>
                        <strong>50 ฿</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>ยอดรวมทั้งหมด (Total)</span>
                        <strong id="total">50 ฿</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ตะกร้าสินค้า End -->

    <script>
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        function addToCart(productName, price, image) {
            const product = { name: productName, price: price, image: image };
            cart.push(product);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();
        }

        function updateCartUI() {
            const cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';
            let subtotal = 0;

            cart.forEach((product, index) => {
                subtotal += product.price;
                cartItemsContainer.innerHTML += `
                    <div class="cart-item mb-4">
                        <div class="d-flex align-items-center">
                            <img src="${product.image}" alt="${product.name}" class="img-fluid" style="width: 150px;">
                            <div class="ms-3">
                                <h5 class="mb-1">${product.name}</h5>
                                <small class="text-muted">ราคา: ${product.price} ฿</small>
                            </div>
                            <div class="ms-auto">
                                <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">ลบออก</button>
                            </div>
                        </div>
                    </div>
                `;
            });

            document.getElementById('subtotal').textContent = subtotal + ' ฿';
            document.getElementById('total').textContent = subtotal + 50 + ' ฿'; // บวกค่าจัดส่ง
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();
        }

        // Load cart items on page load
        window.onload = updateCartUI;
    </script>

    <!-- JavaScript Libraries --> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
