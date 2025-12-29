<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    die("Not logged in");
}

if (!isset($_POST['cart'])) {
    die("No cart data");
}

$cart = json_decode($_POST['cart'], true);

if (!$cart || count($cart) === 0) {
    die("Cart empty");
}

$user_id = $_SESSION['user_id'];
$total = 0;

// حساب الإجمالي
foreach ($cart as $item) {
    $total += $item['price'];
}

// 1️⃣ حفظ الأوردر
mysqli_query(
    $conn,
    "INSERT INTO orders (user_id, total, status)
     VALUES ('$user_id', '$total', 'paid')"
);

$order_id = mysqli_insert_id($conn);

// 2️⃣ حفظ عناصر الأوردر (بالـ ID مباشرة)
foreach ($cart as $item) {
    $menu_id = (int)$item['id'];
    $price   = $item['price'];

    mysqli_query(
        $conn,
        "INSERT INTO order_items (order_id, menu_item_id, quantity, price)
         VALUES ('$order_id', '$menu_id', 1, '$price')"
    );
}

// تنظيف الكارت والرجوع للهوم
echo "<script>
    localStorage.removeItem('cart');
    alert('Payment successful! Order saved.');
    window.location.href = 'index.php';
</script>";
