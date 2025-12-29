document.addEventListener('DOMContentLoaded', function () {

    /* ========= Smooth Scroll ========= */
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    /* ========= Custom Alert ========= */
    const customAlert = document.getElementById('reservation-alert');
    const alertTitle = customAlert?.querySelector('.modal-title');
    const alertMessage = customAlert?.querySelector('.modal-message');
    const confirmBtn = customAlert?.querySelector('.modal-confirm-btn');

    function showCustomAlert(title, message) {
        if (!customAlert) return;
        alertTitle.innerText = title;
        alertMessage.innerText = message;
        customAlert.classList.add('is-visible');
        confirmBtn.onclick = () => customAlert.classList.remove('is-visible');
    }

    /* ========= Menu Item Click Alert ========= */
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', () => {
            const name = item.querySelector('h3')?.innerText;
            const price = item.querySelector('.price')?.innerText;
            if (name && price) {
                showCustomAlert(name, `Price: ${price}`);
            }
        });
    });

    /* ========= Cart Logic ========= */
    let cart = [];
    const taxRate = 0.14;

    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', e => {
            e.stopPropagation();

            cart.push({
                id: Number(btn.dataset.id),
                name: btn.dataset.name,
                price: Number(btn.dataset.price)
            });

            updateCart();
        });
    });

    function updateCart() {
        const cartList = document.getElementById('cart-items');
        if (!cartList) return;

        cartList.innerHTML = '';
        let subtotal = 0;

        cart.forEach(item => {
            subtotal += item.price;
            const li = document.createElement('li');
            li.textContent = `${item.name} - ${item.price} LE`;
            cartList.appendChild(li);
        });

        document.getElementById('subtotal').innerText = subtotal.toFixed(2);
        document.getElementById('tax').innerText = (subtotal * taxRate).toFixed(2);
        document.getElementById('total').innerText = (subtotal * (1 + taxRate)).toFixed(2);
    }

    /* ========= Checkout ========= */
    const checkoutBtn = document.getElementById('checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {

            if (cart.length === 0) {
                alert("Cart is empty");
                return;
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            window.location.href = "payment.php";
        });
    }

});
