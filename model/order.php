    <?php
// Thêm sản phẩm
require_once 'connect.php'; // Đường dẫn đúng đến file connect.php

function insertOrder($data){
    $conn = connect();

    // Xử lý dữ liệu đầu vào
    $kh_name    = isset($data["kh_name"]) ? trim($data["kh_name"]) : '';
    $kh_email   = isset($data["kh_email"]) ? trim($data["kh_email"]) : '';
    $kh_phone   = isset($data["kh_phone"]) ? trim($data["kh_phone"]) : '';
    $kh_address = isset($data["kh_address"]) && trim($data["kh_address"]) !== '' ? trim($data["kh_address"]) : 'Không cung cấp';
    $kh_content = isset($data["kh_content"]) ? trim($data["kh_content"]) : '';
    $kh_id      = isset($data["kh_id"]) ? intval($data["kh_id"]) : 0;
    $order_date = isset($data["order_date"]) ? trim($data["order_date"]) : date("Y-m-d H:i:s");

    // Nếu chưa có order_code thì tự sinh
    $order_code = isset($data["order_code"]) && trim($data["order_code"]) !== '' 
        ? trim($data["order_code"]) 
        : strtoupper(uniqid("ORD"));

    try {
        $stmt = $conn->prepare("
            INSERT INTO `order`
            (`kh_name`, `kh_email`, `kh_phone`, `kh_address`, `kh_content`, `kh_id`, `order_status`, `order_date`, `order_code`)
            VALUES (:kh_name, :kh_email, :kh_phone, :kh_address, :kh_content, :kh_id, 1, :order_date, :order_code)
        ");

        $stmt->bindParam(':kh_name', $kh_name, PDO::PARAM_STR);
        $stmt->bindParam(':kh_email', $kh_email, PDO::PARAM_STR);
        $stmt->bindParam(':kh_phone', $kh_phone, PDO::PARAM_STR);
        $stmt->bindParam(':kh_address', $kh_address, PDO::PARAM_STR);
        $stmt->bindParam(':kh_content', $kh_content, PDO::PARAM_STR);
        $stmt->bindParam(':kh_id', $kh_id, PDO::PARAM_INT);
        $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
        $stmt->bindParam(':order_code', $order_code, PDO::PARAM_STR);

        $stmt->execute();

        return $conn->lastInsertId();

    } catch (PDOException $e) {
        die("Lỗi insertOrder: " . $e->getMessage());
    }
}


// Cập nhật trạng thái đơn hàng
function updateOrderStatus($orderId, $newStatus) {
    $conn = connect();
    try {
        $stmt = $conn->prepare("UPDATE `order` SET `order_status` = :newStatus WHERE `hd_id` = :orderId");
        $stmt->bindParam(':newStatus', $newStatus, PDO::PARAM_INT);
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error updating order status: " . $e->getMessage();
    }
}

// Lấy đơn hàng của người dùng
function getUserOrders($userId) {
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM `order` WHERE `kh_id` = :userId ORDER BY `order_date` DESC");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Trạng thái đơn hàng
function getStatusText($status) {
    switch ($status) {
        case '1': return 'Chờ xác nhận';
        case '2': return 'Đã xác nhận';
        case '3': return 'Đang giao';
        case '4': return 'Hoàn thành';
        case '5': return 'Chờ hủy';
        case '6': return 'Đã hủy';
        default:  return 'Chờ xác nhận';
    }
}

// Lấy tất cả hóa đơn
function orderAll(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM `order`");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Lấy hóa đơn theo ID
function getOrderByID($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM `order` WHERE `hd_id` = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Lấy chi tiết hóa đơn theo ID
function getOrderDetailByID($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM `orderdetail` WHERE `hd_id` = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Xóa hóa đơn
function orderDelete($id){
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM `order` WHERE `hd_id` = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// Thêm hóa đơn chi tiết và trừ số lượng tồn kho
function insertOrderDetail($data, $orderId) {
    $conn = connect();

    // Giảm số lượng tồn kho
    $quantityToDeduct = (int)$data["number"];
    $productId = (int)$data["id"];

    $stmtDeduct = $conn->prepare("UPDATE product SET sp_quantity = sp_quantity - :quantity WHERE sp_id = :productId");
    $stmtDeduct->bindParam(':quantity', $quantityToDeduct, PDO::PARAM_INT);
    $stmtDeduct->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmtDeduct->execute();

    // Thêm chi tiết đơn hàng
    $stmtInsert = $conn->prepare("
        INSERT INTO `orderdetail`
        (`sp_name`, `sp_image`, `sp_price`, `sp_quantity`, `hd_id`, `sp_id`)
        VALUES (:name, :img, :price, :quantity, :orderId, :productId)
    ");
    $stmtInsert->bindParam(':name', $data["name"], PDO::PARAM_STR);
    $stmtInsert->bindParam(':img', $data["img"], PDO::PARAM_STR);
    $stmtInsert->bindParam(':price', $data["price"], PDO::PARAM_STR);
    $stmtInsert->bindParam(':quantity', $data["number"], PDO::PARAM_INT);
    $stmtInsert->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $stmtInsert->bindParam(':productId', $data["id"], PDO::PARAM_INT);
    $stmtInsert->execute();
}
?>
