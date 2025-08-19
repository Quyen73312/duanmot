<?php 
require_once 'connect.php'; // Đường dẫn đúng đến file connect.php

// Gọi tất cả sản phẩm ra ngoài
function getProductAll(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM product INNER JOIN category  ON product.dm_id = category.dm_id ORDER BY product.sp_id DESC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Lọc theo danh mục
function getProductWhereCate($cate ){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM product INNER JOIN category  ON product.dm_id = category.dm_id WHERE product.dm_id = ".$cate."");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Lọc theo kích thước
function getProductWhereSize($size){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM product WHERE product.kt_id = ".$size."");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


// Xóa sản phẩm
function deleteProduct($id){
    $conn = connect();
    $sql = "DELETE FROM product WHERE product.sp_id = ".$id;
    $conn->exec($sql);
}

// Gọi phần tử chỉ định theo id
function getProductFind($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT  * FROM product WHERE product.sp_id = ".$id."");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Thêm sản phẩm
function insertProduct($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO product 
    (sp_name, sp_image, sp_price, sp_sale, sp_quantity, dm_id, sp_description, kt_id)
     VALUES ('".$data["sp_name"]."' , '".$data["sp_image"]."' ,' ".$data["sp_price"]."' ,'".$data["sp_sale"]." ',  ".(int)$data["sp_quantity"]." , ".(int)$data["dm_id"]." ,  '".$data["sp_description"]."' ,".(int)$data["kt_id"].")");
    $stmt->execute();
}

// Update sản phẩm
function updateProduct($data , $id){
    $conn = connect();
    $stmt = $conn->prepare("UPDATE  product  
    SET sp_name = '".$data["sp_name"]."', sp_image= '".$data["sp_image"]."', sp_price=' ".$data["sp_price"]."' , sp_sale ='".$data["sp_sale"]." ', sp_quantity= ".(int)$data["sp_quantity"].", dm_id= ".(int)$data["dm_id"].", sp_description='".$data["sp_description"]."', kt_id=".(int)$data["kt_id"]."  WHERE product.sp_id = ".(int)$id."");
    $stmt->execute();
}

// Tìm kiếm sản phẩm
function searchProduct($key_world){
    $conn = connect();
    $stmt = $conn->prepare("SELECT  * FROM product WHERE product.sp_name LIKE '%$key_world%'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


// Bình luận sản phẩm
function commentProduct($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO `comment`(`sp_id`, `kh_id`, `content`) VALUES (".(int)$data["sp_id"].",".(int)$data["kh_id"].",'".$data["content"]."')");
    $stmt->execute();
}

function getCommentProduct($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT  * FROM `comment` INNER JOIN `user` ON comment.kh_id =  user.kh_id WHERE comment.sp_id = ".(int)$id."");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

function deleteCmtt($id){
    $conn = connect();
    $sql = "DELETE FROM comment WHERE comment.cntt_id = ".(int)$id;
    $conn->exec($sql);
}






