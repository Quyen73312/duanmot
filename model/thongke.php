<?php
require_once 'connect.php'; // Đường dẫn đúng đến file connect.php

function load_doanhthu(){
    $conn = connect();
    $stmt = $conn->prepare("
        SELECT order_date, SUM(hd_id) AS doanhso
        FROM `order`
        GROUP BY order_date
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function load_doanhthu_gg(){
    $conn = connect();
    $stmt = $conn->prepare("
        SELECT SUM(hd_id) AS doanhso
        FROM `order`
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function thongke(){
    $conn = connect();
    $stmt = $conn->prepare("
        SELECT
            YEAR(o.order_date) AS nam,
            MONTH(o.order_date) AS thang,
            c.dm_name AS tendanhmuc,
            p.sp_name AS tensanpham,
            SUM(od.sp_quantity) AS soluongban,
            SUM(od.sp_quantity * CAST(p.sp_sale AS DECIMAL(15,0))) AS doanhthu
        FROM `order` o
        JOIN orderdetail od ON o.hd_id = od.hd_id
        JOIN product p ON od.sp_id = p.sp_id
        JOIN category c ON p.dm_id = c.dm_id
        GROUP BY YEAR(o.order_date), MONTH(o.order_date), c.dm_id, p.sp_id
        ORDER BY YEAR(o.order_date) DESC, MONTH(o.order_date) DESC, doanhthu DESC
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function spbanchay(){
    $conn = connect();
    $stmt = $conn->prepare("
        SELECT
            p.sp_id,
            p.sp_name AS product_name,
            c.dm_name AS category_name,
            p.sp_price,
            p.sp_sale,
            p.sp_quantity,
            p.sp_description,
            p.kt_id,
            p.dm_id,
            p.sp_image,
            SUM(od.sp_quantity) AS total_sold
        FROM product p
        JOIN orderdetail od ON p.sp_id = od.sp_id
        JOIN category c ON p.dm_id = c.dm_id
        GROUP BY p.sp_id
        ORDER BY total_sold DESC
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function thongke2(){
    $conn = connect();
    $stmt = $conn->prepare("
        SELECT
            DATE_FORMAT(STR_TO_DATE(o.order_date, '%Y-%m-%d %H:%i:%s'), '%Y-%m') AS month_year,
            SUM(od.sp_quantity * p.sp_sale) AS total_revenue_month,
            DATE_FORMAT(STR_TO_DATE(o.order_date, '%Y-%m-%d %H:%i:%s'), '%Y') AS year,
            SUM(od.sp_quantity * p.sp_sale) AS total_revenue_year
        FROM `order` o
        JOIN orderdetail od ON o.hd_id = od.hd_id
        JOIN product p ON od.sp_id = p.sp_id
        GROUP BY month_year, year
        ORDER BY year, month_year
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
