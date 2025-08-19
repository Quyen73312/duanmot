$(document).ready(function () {
    $('.add-to-cart-btn').click(function () {
        var productId = $(this).data('product-id');
        var size = $('#size').val();
        var color = $('#color').val();
        var quantity = $('#quantity').val();

        $.ajax({
            type: 'POST',
            url: 'add-to-cart.php',
            data: {
                action: 'add-gio-hang',
                id: productId,
                size: size,
                color: color,
                quantity: quantity
            },
            dataType: 'json',
            success: function (response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    alert(response.message);
                    $('#product-quantity').text(response.productQuantity);
                }
            },
            error: function () {
                alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
            }
        });
    });
});
