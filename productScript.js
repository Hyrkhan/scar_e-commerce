const urlParams = new URLSearchParams(window.location.search);
const productId = urlParams.get('id');

let product = null;

if (productId) {
    fetch(`get_product.php?id=${encodeURIComponent(productId)}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                window.location.href = 'index.html';
                return;
            }
            product = data;

            document.getElementById('product-name').textContent = product.productName;
            document.getElementById('product-price').textContent = "₱ " + parseFloat(product.productPrice).toFixed(2);
            document.getElementById('product-img').src = product.productImage;
            document.getElementById('product-img').alt = product.productName;
            document.getElementById('product-description').textContent = product.productDescription;

            const benefitsList = document.getElementById('product-benefits');
            benefitsList.innerHTML = '';
            if (Array.isArray(product.keyBenefits)) {
                product.keyBenefits.forEach(benefit => {
                    const li = document.createElement('li');
                    li.textContent = benefit;
                    benefitsList.appendChild(li);
                });
            }
        });
} else {
    window.location.href = 'index.html';
}

// Add to Cart logic
document.addEventListener('DOMContentLoaded', function () {
    const addToCartBtn = document.querySelector('.add-to-cart');
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function () {
            const quantity = parseInt(document.getElementById('quantity').value);

            if (!product) {
                alert('Product not loaded.');
                return;
            }

            const data = {
                product_id: productId,
                name: product.productName,
                price: product.productPrice,
                image: product.productImage,
                quantity: quantity
            };

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    alert('Added to cart!');
                } else {
                    alert(result.message || 'Error adding to cart.');
                }
            })
            .catch(error => {
                alert('Error adding to cart.');
                console.error('Error:', error);
            });
        });
    }
});