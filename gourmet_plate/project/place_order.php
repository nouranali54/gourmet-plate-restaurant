<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    echo "Not logged in";
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || empty($data['items'])) {
    echo "Invalid order";
    exit;
}

$user_id = $_SESSION['user_id'];
$total   = $data['total'];

// 1️⃣ إضافة الأوردر
$sql = "INSERT INTO orders (user_id, total) VALUES ('$user_id', '$total')";
mysqli_query($conn, $sql);

$order_id = mysqli_insert_id($conn);

// 2️⃣ إضافة عناصر الأوردر
foreach ($data['items'] as $item) {
    $name  = mysqli_real_escape_string($conn, $item['name']);
    $price = $item['price'];
    $qty   = $item['qty'];

    // نجيب id المنتج (مؤقتًا بالاسم)
    $q = mysqli_query($conn, "SELECT id FROM menu_items WHERE name='$name'");
    if ($row = mysqli_fetch_assoc($q)) {
        $menu_id = $row['id'];

        mysqli_query(
            $conn,
            "INSERT INTO order_items (order_id, menu_item_id, quantity, price)
             VALUES ('$order_id', '$menu_id', '$qty', '$price')"
        );
    }
}

echo "Order saved";
