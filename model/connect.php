<?php
if (!function_exists('connect')) {
function connect() {
    $host = "localhost";
    $dbname = "duanmot";
    $username = "root";
    $password = "";
    $charset = "utf8mb4";

    try {
        $conn = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=$charset",
            $username,
            $password
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Kết nối thất bại: " . $e->getMessage());
    }
}
}