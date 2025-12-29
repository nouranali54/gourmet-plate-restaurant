<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PREMIER PLATE</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Explora&display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
   

</head>

<body>
   
        <header class="navbar">
          <div class="logo">Gourmet plate</div>

            <ul class="nav-links">
                <li><a href="index.php">Home </a></li> 
                <li><a href="menu.php">menu</a></li>
                <li><a href="index.php#categories">categories </a></li>
                <li><a href="index.php#contact">contact us</a></li>
        
            </ul>

        </header>

        <div class="restaurant-icons"></div>
    </div>

  
</section>

<div class="menu-wrapper">
    <div class="cart-box">
    <h2>Your Order</h2>

    <ul id="cart-items"></ul>

    <p>Subtotal: <span id="subtotal">0</span> LE</p>
    <p>Tax (14%): <span id="tax">0</span> LE</p>
    <h3>Total: <span id="total">0</span> LE</h3>

    <button id="checkout-btn">Proceed to Payment</button>
</div>


    <h1 class="menu-heading">THE MENU</h1>
    
    <div class="sorting-controls">
        <button id="sort-bestseller" class="sort-btn">Best seller</button>
       
    </div>
    <section class="menu-section" id="Appetizers">
        <h2 class="section-title">ِAppitizers</h2>

        <div class="menu-item" data-price="360" data-bestseller="3">
            <img src="images/wings.jpeg">
            <div class="item-info">
                <h3>chicken wings</h3>
                <p>chicken wings in sweet & spicy chaat</p>
            </div>
            <div class="price">360LE</div>
      <button class="add-to-cart"
    data-id="1"
    data-name="chicken wings"
    data-price="360">
    Add to Order
</button>

            
        </div>
        <div class="menu-item" data-price="550" data-bestseller="2">
            <img src="images/shrimp.jpg">
            <div class="item-info">
                <h3>shrimp</h3>
                <p>shrimp with hot and spicy chaat</p>
            </div>
            <div class="price">550LE</div>
                      <button class="add-to-cart"
                      data-id="2"
    data-name="shrimp"
    data-price="550">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="280" data-bestseller="1">
            <img src="images/tomato.jpg">
            <div class="item-info">
                <h3>Tomato soup</h3>
                <p>Roasted Tomato Soup</p>
            </div>
            <div class="price">280LE</div>
                      <button class="add-to-cart"
                      data-id="3"
    data-name="tomato soup"
    data-price="280">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="450" data-bestseller="4">
            <img src="images/Tuna.jpg">
            <div class="item-info">
                <h3>Ahi Tuna Tartare</h3>
                <p>Sushi-grade Ahi Tuna diced and lightly seasoned, served atop fresh avocado with a delicate drizzle of wasabi crème.</p>
            </div>
            <div class="price">450LE</div>
                      <button class="add-to-cart"
                      data-id="4"
    data-name="Ahi Tuna Tartare"
    data-price="450">
    Add to Order
</button>
        </div>
        
        <div class="menu-item" data-price="500" data-bestseller="4">
            <img src="images/Burrata-caprese-salad.jpg">
            <div class="item-info">
                <h3>Burrata Caprese</h3>
                <p>Creamy Burrata cheese paired with salty Prosciutto, charred fig wedges, and an aged balsamic glaze.</p>
            </div>
            <div class="price">500LE</div>
                      <button class="add-to-cart"
                      data-id="5"
    data-name="Burrata Caprese"
    data-price="500">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="600" data-bestseller="5"> 
            <img src="images/traflle.webp"> 
            <div class="item-info">
                <h3>Truffled Portobello Caps</h3>
                <p>Portobello mushrooms stuffed with whipped goat cheese and thyme, finished with a luxurious truffle oil infusion.</p>
            </div>
            <div class="price">600LE</div>
                      <button class="add-to-cart"
                      data-id="6"
    data-name="Truffled Portobello Caps"
    data-price="600">
    Add to Order
</button>
        </div>
        
    </section>
    <section class="menu-section" id="Main-Dishes">
        <h2 class="section-title">Main Dishes</h2>

        <div class="menu-item" data-price="1300" data-bestseller="3">
            <img src="images/steak.jpg">
            <div class="item-info">
                <h3>Grilled Steak</h3>
                <p>Grilled Steak with mushroom and onion sauce</p>
            </div>
            <div class="price">1300LE</div>
            
            <button class="add-to-cart"
            data-id="7"
    data-name="Grilled Steak"
    data-price="1300">
    Add to Order
</button>

        </div>
        <div class="menu-item" data-price="1750" data-bestseller="5">
          <img src="images/ripeye.jpeg"> 
           <div class="item-info">
               <h3>Rib eye</h3>
               <p>Grilled Rib eye with potato</p>
           </div>
           <div class="price">1750LE</div>
                               <button class="add-to-cart"
                               data-id="8"
    data-name="Rib eye"
    data-price="1750">
    Add to Order
</button>
       </div>
        <div class="menu-item" data-price="1100" data-bestseller="4">
            <img src="images/butter.webp">
            <div class="item-info">
                <h3>Pan-Seared Chilean Sea Bass</h3>
                <p>Flaky Chilean Sea Bass pan-seared to crisp perfection, finished with a bright lemon-butter sauce and seasonal vegetables.</p>
            </div>
            <div class="price">1100LE</div>
                                <button class="add-to-cart"
                                data-id="9"
    data-name="Pan-Seared Chilean Sea Bass"
    data-price="1100">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="1250" data-bestseller="4">
            <img src="images/duck.webp">
            <div class="item-info">
                <h3>Duck Confit</h3>
                <p>Classic French duck leg prepared confit-style for maximum tenderness, served beneath a crisp skin and sweet cherry reduction.</p>
            </div>
            <div class="price">1250LE</div>
                                <button class="add-to-cart"
                                data-id="10"
    data-name="Duck Confitk"
    data-price="1250">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="1000" data-bestseller="5">
            <img src="images/tender.jpg">
            <div class="item-info">
                <h3>Grilled Filet Mignon</h3>
                <p>An exceptionally tender, perfectly grilled beef filet, served with a rich truffle jus reduction and potato purée.</p>
            </div>
            <div class="price">1000LE</div>
                                <button class="add-to-cart"data-id="11"
    data-name="Grilled Filet Mignon"
    data-price="1000">
    Add to Order
</button>
        </div>

        <div class="menu-item" data-price="720" data-bestseller="2">
            <img src="images/pasta.webp">
            <div class="item-info">
                <h3>Pasta Alfredo</h3>
                <p>Alfredo Pasta with grilled chicken</p>
            </div>
            <div class="price">720LE</div>
                                <button class="add-to-cart"
                                data-id="12"
    data-name="Pasta Alfredo"
    data-price="720">
    Add to Order
</button>
        </div>

    </section>
<section class="menu-section" id="Desserts">
        <h2 class="section-title">Desserts</h2>

        <div class="menu-item" data-price="450" data-bestseller="3">
            <img src="images/creame.jpg">
            <div class="item-info">
                <h3>Saffron Crème brûlée</h3>
                <p>An elegant reinvention of the classic Italian dessert, featuring separated layers of espresso-soaked ladyfingers and lightly whipped Mascarpone cream</p>
            </div>
            <div class="price">450LE</div>
                                <button class="add-to-cart"
                                data-id="13"
    data-name="Saffron Crème brûlée"
    data-price="450">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="350" data-bestseller="4">
            <img src="images/cake.jpg">
            <div class="item-info">
                <h3>Pistachio and Raspberry Verrine</h3>
                <p>A layered composition of creamy pistachio mousse, tangy raspberry gelée, and crushed butter shortbread, elegantly served in a tall glass</p>
            </div>
            <div class="price">350LE</div>
                                <button class="add-to-cart"data-id="14"
    data-name="Pistachio and Raspberry Verrine"
    data-price="350">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="370" data-bestseller="5">
            <img src="images/mol.jpeg">
            <div class="item-info">
                <h3>Molten Chocolate Lava Cake</h3>
                <p>A warm, decadent dark chocolate cake with a melting liquid center, served alongside house-made vanilla bean ice cream and edible gold leaf.</p>
            </div>
            <div class="price">370LE</div>
                                <button class="add-to-cart"
                               data-id="15" 
    data-name="Molten Chocolate Lava Cake"
    data-price="370">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="250" data-bestseller="2">
            <img src="images/cheese.webp">
            <div class="item-info">
                <h3>Cheese Cake</h3>
                <p>Cheese Cake with strawberry sauce</p>
            </div>
            <div class="price">250LE</div>
                                <button class="add-to-cart"
                                data-id="16"
    data-name="Cheese Cake"
    data-price="250">
    Add to Order
</button>
        </div>

        <div class="menu-item" data-price="280" data-bestseller="3">
            <img src="images/molten.jpg">
            <div class="item-info">
                <h3>Molten Cake</h3>
                <p>Molten Cake with  vanilla icecream </p>
            </div>
            <div class="price">280LE</div>
                                <button class="add-to-cart"
                                data-id="17"
    data-name="Molten Cake"
    data-price="280">
    Add to Order
</button>
        </div>
         <div class="menu-item" data-price="350" data-bestseller="4">
            <img src="images/tramisu.jpg">
            <div class="item-info">
                <h3>Tiramisu</h3>
                <p> Vanilla Tiramisu with Cocoa powder  </p>
            </div>
            <div class="price">350LE</div>
                                <button class="add-to-cart"
                                data-id="18"
    data-name="Tiramisu"
    data-price="350">
    Add to Order
</button>
        </div>

    </section>
<section class="menu-section" id="DRINKS">
        <h2 class="section-title">Drinks</h2>

        <div class="menu-item" data-price="320" data-bestseller="3">
            <img src="images/mooka.webp">
            <div class="item-info">
                <h3>Espresso Martini Infusion</h3>
                <p>A rich, velvety mix of premium vodka, coffee liqueur, and a fresh shot of single-origin espresso, served ice-cold with a signature three-bean garnish.  </p>
            </div>
            <div class="price">320LE</div>
                                <button class="add-to-cart"
                                data-id="19"
    data-name="Espresso Martini Infusion"
    data-price="320">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="370" data-bestseller="4">
            <img src="images/matcha.webp">
            <div class="item-info">
                <h3>Matcha Lavender Elixir</h3>
                <p>Creamy iced matcha tea crafted with cold almond milk and natural lavender syrup, creating a serene, sophisticated beverage.  </p>
            </div>
            <div class="price">370LE</div>
                                <button class="add-to-cart"
                                data-id="20"
    data-name="Matcha Lavender Elixir"
    data-price="370">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="380" data-bestseller="5">
            <img src="images/pinapple.jpg">
            <div class="item-info">
                <h3>Smoked Pineapple & Ginger Fizz</h3>
                <p>A vibrant, subtly smoky blend of pineapple juice, fresh lime, and spicy ginger syrup, topped with sparkling water.  </p>
            </div>
            <div class="price">380LE</div>
                                <button class="add-to-cart"
                                data-id="21"
    data-name="Smoked Pineapple & Ginger Fizz"
    data-price="380">
    Add to Order
</button>
        </div>
        <div class="menu-item" data-price="350" data-bestseller="4">
            <img src="images/passion.jpg">
            <div class="item-info">
                <h3>Passion Fruit</h3>
                <p>A tangy and refreshing tropical flavor with a sweet-sour balance.  </p>
            </div>
            <div class="price">350LE</div>
                                <button class="add-to-cart"
                                data-id="22"
    data-name="Passion Fruit"
    data-price="350">
    Add to Order
</button>
        </div>

        <div class="menu-item" data-price="250" data-bestseller="1">
            <img src="images/grape.jpg">
            <div class="item-info">
                <h3>Sparkling Grape Juice</h3>
                <p>Drink with a light sparkle and clean , sweet grape flavor</p>
            </div>
            <div class="price">250LE</div>
                                <button class="add-to-cart"
                                data-id="23"
    data-name="Sparkling Grape Juice"
    data-price="250">
    Add to Order
</button>
            </div>


        
        <div class="menu-item" data-price="280" data-bestseller="2">
            <img src="images/pink.webp">
            <div class="item-info">
                <h3>Rose lemonade </h3>
                <p>A delicate blend of roses and fresh lemon ,elegant taste </p>
            </div>
            <div class="price">280LE</div>
                                <button class="add-to-cart"
                                data-id="24"
              data-name="Rose lemonade"
            data-price="280">
               Add to Order
</button>
        </div>
        </div>
        
    </section>

    <footer class="menu-footer">
    <div class="footer-inner">
        <h3>Thank You for Visiting</h3>
        <p>123 Food Street, Alexandria, Egypt</p>
        <p>Call: 01111111</p>
        <p>Open: 10:00 AM – 11:00 PM</p>

        <div class="footer-line"></div>

        <p class="copyright">© 2025 Gourmet plate. All Rights Reserved.</p>
    </div>
</footer>


<div id="reservation-alert" class="custom-modal">
    <div class="modal-content">
        <h3 class="modal-title"></h3> 
        <p class="modal-message"></p>
        <button class="modal-confirm-btn">Done</button>
    </div>
<script src="main.js"></script>

</body>

</html>