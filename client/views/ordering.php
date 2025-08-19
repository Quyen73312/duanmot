<!-- thank_you.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        /* body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        } */

        .thank-you-container {
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        /* h1, p {
            color: #333;
            margin: 10px 0;
        } */

        .fa-check-circle {
            color: #4CAF50;
            font-size: 48px;
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <i class="fas fa-check-circle"></i>
        <h1>Đặt hàng thành công!</h1>
        <p>Cảm ơn bạn đã đặt hàng! Sự ủng hộ của bạn quan trọng với chúng tôi. Chúng tôi hy vọng bạn sẽ thích sản phẩm và luôn sẵn lòng hỗ trợ nếu có bất kỳ vấn đề gì.</p>

        <!-- Nút "Tiếp tục mua hàng" và "Đơn hàng của bạn" -->
        <button id="continueShopping">Tiếp tục mua hàng</button>
        <button id="viewOrderHistory">Đơn hàng của bạn</button>
    </div>

    <script>
        // thank_you.js
$(document).ready(function() {
    // Hiển thị đoạn lời cảm ơn khi đặt hàng thành công
    showThankYouMessage();
});

function showThankYouMessage() {
    $('.thank-you-container').fadeIn('slow');
}

// Nút "Tiếp tục mua hàng"
$('#continueShopping').on('click', function() {
    window.location.href = "index.php";
});

// Nút "Đơn hàng của bạn"
$('#viewOrderHistory').on('click', function() {
    window.location.href = "index.php?url=lich-su";
});
    </script>
</body>
</html>
