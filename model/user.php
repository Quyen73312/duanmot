<?php
require_once 'connect.php'; // Đường dẫn đúng đến file connect.php


// Đang ký
function register($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO user (kh_name, kh_email , kh_avatar , kh_password , kh_phone) VALUES ('".$data["kh_name"]."' ,' ".$data["kh_email"]."' ,'".$data["kh_avatar"]." ',  '".$data["kh_password"]."' ,  '".$data["kh_phone"]."')");
    $stmt->execute();
}

// Đang ký
function getAllUser(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


// Gọi user theo email
function getUserFind($email){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM user WHERE kh_email = '".$email."'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


//Update quyền user
function updateUser($data){
    $conn = connect();
    $stmt = $conn->prepare("UPDATE  `user`  
    SET `role` =  ". $data["role"]." WHERE `kh_id` = ". $data["id"]."");
    $stmt->execute();
}



// Gọi user theo id
function getUserId($id){
    // dd($email);
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM user WHERE kh_id = $id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


