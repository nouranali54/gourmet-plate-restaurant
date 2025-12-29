<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment</title>

  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="payment.css">
</head>

<body>

  <div class="payment-container">

    <h1 class="logo">Gourmet Plate</h1>
    <p class="subtitle">Secure Payment</p>

   <form class="payment-card" method="POST" action="process_payment.php">



      <label>Card Number</label>
      <input type="text" placeholder="1234 5678 9012 3456">

      <label>Card Holder</label>
      <input type="text" placeholder="Ahmed Reda">

      <div class="row">
        <div>
          <label>Expiry</label>
          <input type="text" placeholder="MM / YY">
        </div>

        <div>
          <label>CVV</label>
          <input type="password" placeholder="***">
        </div>
      </div>

      <button type="submit">Pay Now</button>
      <input type="hidden" name="cart" id="cart-data">


    </form>

  </div>
<script>
    const cart = localStorage.getItem("cart");
    if (cart) {
        document.getElementById("cart-data").value = cart;
    }
</script>

</body>
</html>
