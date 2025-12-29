<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// نجيب الطلبات
$orders = mysqli_query($conn, "
    SELECT * FROM orders 
    WHERE user_id = '$user_id'
    ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Orders</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="navbar">
    <div class="logo">Gourmet Plate</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="my_orders.php">My Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</header>

<div class="menu-wrapper">
    <h1 class="menu-heading">My Orders</h1>

    <?php while ($order = mysqli_fetch_assoc($orders)): ?>
        <div class="menu-item" style="flex-direction:column; align-items:flex-start;">
            <h3>Order #<?= $order['id'] ?></h3>
            <p>Status: <?= $order['status'] ?></p>
            <p>Total: <?= $order['total'] ?> LE</p>

            <ul>
                <?php
                $items = mysqli_query($conn, "
                    SELECT 
                        mi.name,
                        oi.quantity,
                        oi.price
                    FROM order_items oi
                    JOIN menu_items mi ON oi.menu_item_id = mi.id
                    WHERE oi.order_id = '{$order['id']}'
                ");

                while ($item = mysqli_fetch_assoc($items)):
                ?>
                    <li>
                        <?= $item['name'] ?> 
                        (<?= $item['quantity'] ?>) - 
                        <?= $item['price'] ?> LE
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <br>
    <?php endwhile; ?>
</div>

</body>
</html>
