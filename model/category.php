<?php
require_once 'connect.php';

function getCateAll() {
    $conn = connect(); 
    $stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function cateChart() {
    $conn = connect();
    $stmt = $conn->prepare("
        SELECT dm_name, COUNT(product.dm_id) AS number_cate
        FROM product
        INNER JOIN category ON product.dm_id = category.dm_id
        GROUP BY product.dm_id
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Thêm danh mục
function insertCate($name) {
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO category (dm_name) VALUES (:name)");
    $stmt->bindParam(':name', $name);
    $stmt->execute();
}


function updateCate($name, $id) {
    $conn = connect();
    $stmt = $conn->prepare("UPDATE category SET dm_name = :name WHERE dm_id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function getFind($id) {
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM category WHERE dm_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Xóa danh mục
function deleteCate($id) {
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM category WHERE dm_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
