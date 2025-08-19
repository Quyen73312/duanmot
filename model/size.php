<?php 
require_once 'connect.php'; // Đường dẫn đúng đến file connect.php

function getSizeAll(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM size");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

function getSizeWhereType($type){
    $conn = connect();
    $stmt = $conn->prepare("SELECT  * FROM size WHERE size.kieu_display = ".$type."");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


function deleteSize($id){
    $conn = connect();
    $sql = "DELETE FROM size WHERE size.kt_id = ".$id;
    $conn->exec($sql);
}


function getFindCate($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT  * FROM size WHERE size.kt_id = ".$id."");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

function insertSize($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO size (kt_name , kieu_display , ma_color) VALUES ('".$data['kt_name']."' ,".$data['kieu_display']." , '".$data["ma_color"]."' )");
    $stmt->execute();
}

function updateSize($data){
    $conn = connect();
    $stmt = $conn->prepare("UPDATE  size  
    SET kt_name = '".$data["kt_name"]."', kieu_display=".$data["kieu_display"].", ma_color='".$data["ma_color"]."'  WHERE size.kt_id = ".$data["id"]."");
    $stmt->execute();
}
?>