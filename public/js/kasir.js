let cart = [];

function addToCart(name, price, id, image) {
    const existingProductIndex = cart.findIndex(item => item.id === id);

    if (existingProductIndex > -1) {
        cart[existingProductIndex].quantity += 1;
        cart[existingProductIndex].subtotal = cart[existingProductIndex].quantity * price;
    } else {
        cart.push({
            id: id,
            name: name,
            price: price,
            quantity: 1,
            subtotal: price,
            image: image
        });
    }

    updateCartUI();
}

function updateCartUI() {
    let cartTableBody = document.getElementById('cartTableBody');
    cartTableBody.innerHTML = ''; // Clear current cart

    let totalPrice = 0;

    cart.forEach(item => {
        const row = `
            <tr>
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>Rp ${item.price.toFixed(2)}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="removeFromCart(${item.id})">Hapus</button>
                </td>
            </tr>
        `;
        cartTableBody.innerHTML += row;
        totalPrice += item.subtotal;
    });

    document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
    document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);
    document.getElementById('cartData').value = JSON.stringify(cart); // Serialize the cart data
}

function calculateChange() {
    const totalPrice = parseFloat(document.getElementById('totalPriceInput').value);
    const uangCustomer = parseFloat(document.getElementById('uang_customer').value);

    if (isNaN(totalPrice) || isNaN(uangCustomer)) {
        document.getElementById('changeAmount').textContent = '0.00';
        return;
    }

    const changeAmount = uangCustomer - totalPrice;

    if (changeAmount >= 0) {
        document.getElementById('changeAmount').textContent = changeAmount.toFixed(2);
    } else {
        document.getElementById('changeAmount').textContent = '0.00'; // No negative change
    }
}

// Event listener to trigger calculation when customer inputs money
document.getElementById('uang_customer').addEventListener('input', calculateChange);

function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    updateCartUI();
}

// Clear Cart functionality
document.getElementById('clearCartBtn').addEventListener('click', function() {
    cart = [];
    updateCartUI();
});
