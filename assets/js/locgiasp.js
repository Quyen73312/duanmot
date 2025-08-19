// JavaScript for filtering products based on price range
const priceRangeInput = document.getElementById('price-range');
const priceValueInput = document.getElementById('price-value');

priceRangeInput.addEventListener('input', updatePriceValue);

function updatePriceValue() {
    const selectedPrice = priceRangeInput.value;
    priceValueInput.value = selectedPrice;
    
    // Filter products based on the selected price
    filterProducts(selectedPrice);
}

function filterProducts(selectedPrice) {
    const productItems = document.querySelectorAll('.product-item');

    productItems.forEach(item => {
        const itemPrice = parseFloat(item.dataset.price);
        
        // If the item price is less than or equal to the selected price, show the item; otherwise, hide it.
        if (itemPrice <= selectedPrice) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}