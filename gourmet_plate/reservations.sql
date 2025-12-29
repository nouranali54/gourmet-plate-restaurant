-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 28, 2025 at 06:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `persons` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `persons`, `date`, `time`, `created_at`) VALUES
(1, 'TEST', 2, '2025-02-10', '20:00:00', '2025-12-28 16:56:35'),
(2, 'TEST', 2, '2025-02-10', '20:00:00', '2025-12-28 17:02:43'),
(3, 'youssef fawzy fathallah', 3, '2025-12-28', '19:11:00', '2025-12-28 17:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user','admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);
CREATE TABLE menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    category_id INT,
    CONSTRAINT fk_menu_category
        FOREIGN KEY (category_id)
        REFERENCES categories(id)
        ON DELETE SET NULL
);
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    status ENUM('paid','preparing','delivered') DEFAULT 'paid',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_orders_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
);
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    menu_item_id INT NOT NULL,
    quantity INT DEFAULT 1,
    price DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_order_items_order
        FOREIGN KEY (order_id)
        REFERENCES orders(id)
        ON DELETE CASCADE,
    CONSTRAINT fk_order_items_menu
        FOREIGN KEY (menu_item_id)
        REFERENCES menu_items(id)
        ON DELETE CASCADE
);


-- Complete Data for Gourmet Plate Restaurant
-- Import this file to phpMyAdmin - it has ALL your data ready!

-- ============================================
-- 1. INSERT CATEGORIES
-- ============================================

INSERT INTO `categories` (`name`) VALUES
('Appetizers'),
('Main Dishes'),
('Desserts'),
('Drinks');

-- ============================================
-- 2. INSERT MENU ITEMS (All 24 items from your menu.php)
-- ============================================

-- Appetizers (category_id = 1)
INSERT INTO `menu_items` (`name`, `description`, `price`, `image`, `category_id`) VALUES
('Chicken Wings', 'chicken wings in sweet & spicy chaat', 360.00, 'images/wings.jpeg', 1),
('Shrimp', 'shrimp with hot and spicy chaat', 550.00, 'images/shrimp.jpg', 1),
('Tomato Soup', 'Roasted Tomato Soup', 280.00, 'images/tomato.jpg', 1),
('Ahi Tuna Tartare', 'Sushi-grade Ahi Tuna diced and lightly seasoned, served atop fresh avocado with a delicate drizzle of wasabi crème.', 450.00, 'images/Tuna.jpg', 1),
('Burrata Caprese', 'Creamy Burrata cheese paired with salty Prosciutto, charred fig wedges, and an aged balsamic glaze.', 500.00, 'images/Burrata-caprese-salad.jpg', 1),
('Truffled Portobello Caps', 'Portobello mushrooms stuffed with whipped goat cheese and thyme, finished with a luxurious truffle oil infusion.', 600.00, 'images/traflle.webp', 1),

-- Main Dishes (category_id = 2)
('Grilled Steak', 'Grilled Steak with mushroom and onion sauce', 1300.00, 'images/steak.jpg', 2),
('Rib eye', 'Grilled Rib eye with potato', 1750.00, 'images/ripeye.jpeg', 2),
('Pan-Seared Chilean Sea Bass', 'Flaky Chilean Sea Bass pan-seared to crisp perfection, finished with a bright lemon-butter sauce and seasonal vegetables.', 1100.00, 'images/butter.webp', 2),
('Duck Confit', 'Classic French duck leg prepared confit-style for maximum tenderness, served beneath a crisp skin and sweet cherry reduction.', 1250.00, 'images/duck.webp', 2),
('Grilled Filet Mignon', 'An exceptionally tender, perfectly grilled beef filet, served with a rich truffle jus reduction and potato purée.', 1000.00, 'images/tender.jpg', 2),
('Pasta Alfredo', 'Alfredo Pasta with grilled chicken', 720.00, 'images/pasta.webp', 2),

-- Desserts (category_id = 3)
('Saffron Crème brûlée', 'An elegant reinvention of the classic Italian dessert, featuring separated layers of espresso-soaked ladyfingers and lightly whipped Mascarpone cream', 450.00, 'images/creame.jpg', 3),
('Pistachio and Raspberry Verrine', 'A layered composition of creamy pistachio mousse, tangy raspberry gelée, and crushed butter shortbread, elegantly served in a tall glass', 350.00, 'images/cake.jpg', 3),
('Molten Chocolate Lava Cake', 'A warm, decadent dark chocolate cake with a melting liquid center, served alongside house-made vanilla bean ice cream and edible gold leaf.', 370.00, 'images/mol.jpeg', 3),
('Cheese Cake', 'Cheese Cake with strawberry sauce', 250.00, 'images/cheese.webp', 3),
('Molten Cake', 'Molten Cake with vanilla icecream', 280.00, 'images/molten.jpg', 3),
('Tiramisu', 'Vanilla Tiramisu with Cocoa powder', 350.00, 'images/tramisu.jpg', 3),

-- Drinks (category_id = 4)
('Espresso Martini Infusion', 'A rich, velvety mix of premium vodka, coffee liqueur, and a fresh shot of single-origin espresso, served ice-cold with a signature three-bean garnish.', 320.00, 'images/mooka.webp', 4),
('Matcha Lavender Elixir', 'Creamy iced matcha tea crafted with cold almond milk and natural lavender syrup, creating a serene, sophisticated beverage.', 370.00, 'images/matcha.webp', 4),
('Smoked Pineapple & Ginger Fizz', 'A vibrant, subtly smoky blend of pineapple juice, fresh lime, and spicy ginger syrup, topped with sparkling water.', 380.00, 'images/pinapple.jpg', 4),
('Passion Fruit', 'A tangy and refreshing tropical flavor with a sweet-sour balance.', 350.00, 'images/passion.jpg', 4),
('Sparkling Grape Juice', 'Drink with a light sparkle and clean , sweet grape flavor', 250.00, 'images/grape.jpg', 4),
('Rose lemonade', 'A delicate blend of roses and fresh lemon ,elegant taste', 280.00, 'images/pink.webp', 4);

-- ============================================
-- 3. INSERT TEST USERS
-- ============================================

-- Password for admin: admin123
-- Password for customer: user123
INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES
('Admin User', 'admin@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('Test Customer', 'customer@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user');

-- ============================================
-- 4. INSERT SAMPLE RESERVATIONS (Optional)
-- ============================================

INSERT INTO `reservations` (`name`, `persons`, `date`, `time`) VALUES
('John Smith', 2, '2025-01-15', '19:00:00'),
('Sarah Johnson', 4, '2025-01-16', '20:30:00'),
('Mike Wilson', 6, '2025-01-17', '18:00:00');

-- ============================================
-- 5. INSERT SAMPLE ORDERS (Optional - for testing My Orders page)
-- ============================================

-- First create an order
INSERT INTO `orders` (`user_id`, `total`, `status`) VALUES
(2, 1620.00, 'delivered'),  -- Customer ordered 2 items
(2, 720.00, 'preparing');   -- Another order

-- Then add order items
INSERT INTO `order_items` (`order_id`, `menu_item_id`, `quantity`, `price`) VALUES
(1, 1, 1, 360.00),  -- Chicken Wings
(1, 12, 1, 720.00), -- Pasta Alfredo
(1, 16, 2, 250.00), -- Cheese Cake x2
(2, 7, 1, 1300.00); -- Grilled Steak

-- Update order totals based on items
UPDATE `orders` SET `total` = 1360.00 WHERE `id` = 1;  -- 360 + 720 + (250*2) = 1620
UPDATE `orders` SET `total` = 1300.00 WHERE `id` = 2;  -- 1300


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
