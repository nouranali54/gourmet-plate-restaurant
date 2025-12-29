<?php
include "config/db.php";
echo "<h3>Database Data Verification</h3>";

// Check categories
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM categories");
$row = mysqli_fetch_assoc($result);
echo "Categories: {$row['count']} (should be 4)<br>";

// Check menu items  
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM menu_items");
$row = mysqli_fetch_assoc($result);
echo "Menu Items: {$row['count']} (should be 24)<br>";

// Check users
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM users");
$row = mysqli_fetch_assoc($result);
echo "Users: {$row['count']} (should be at least 2)<br>";

// List categories with their items
$result = mysqli_query($conn, "
    SELECT c.name as category, COUNT(m.id) as item_count 
    FROM categories c 
    LEFT JOIN menu_items m ON c.id = m.category_id 
    GROUP BY c.id
");

echo "<h4>Categories and Item Count:</h4>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "- {$row['category']}: {$row['item_count']} items<br>";
}
?>