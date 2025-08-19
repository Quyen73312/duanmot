<?php
session_start();
ob_start();
    include('../model/category.php');
    include('../model/connect.php');
    include('../model/product.php');
    include('../model/size.php');
    include('../model/order.php');
    include('../model/thongke.php');
    include('../model/user.php');
    include('../helper/baseUrl.php');
    include('../helper/dd.php');
    include('../helper/route-menu-admin.php');

    include('./views/layouts/header.php');
    if(isset($_GET['url'])&&($_GET['url']!="")){
        switch($_GET['url']){
            //  Lưu đăng ký
        case 'dang-ky-save':
            if(isset($_POST)){
                if(!empty($_FILES["kh_avatar"])){
                    $fileName =  $_FILES["kh_avatar"]["name"];
                    move_uploaded_file( $_FILES["kh_avatar"]["tmp_name"]  ,'../upload/' .   $fileName );
                }
                $_POST['kh_avatar'] = $fileName;
                $_POST['kh_password'] = password_hash( $_POST['kh_password']  , PASSWORD_DEFAULT);
                register($_POST);
                header("location:".BASE_CLIENT."?dang-nhap");
                die;
            }
            break;

        case 'dang-nhap-save':
            if(isset($_POST)){
                if($_POST["email"] != '' && $_POST["password"] != ''){
                    for ($i=0; $i < count(getAllUser()); $i++) { 
                        if(trim(getAllUser()[$i]["kh_email"]) == trim($_POST["email"])){
                            if(password_verify($_POST["password"] , getAllUser()[$i]["kh_password"])){
                                $_SESSION["user"] = getAllUser()[$i];
                               if (getAllUser()[$i]["role"] == 1) {
                                  header("location:".BASE_CLIENT."");
                               }else{
                                  header("location: ../admin/index.php");
                               }
                            }
                        }else{
                            header("location:".BASE_CLIENT."?dang-nhap");
                        }
                    }
                    
                }else{
                    header("location:".BASE_CLIENT."?dang-nhap");
                }
            }
            break;
           // Trang danh sách danh mục
        case 'category':
            
            $error= '';
            $cates = getCateAll();
            include('./views/category/index.php');
            break;
         // Thêm danh mục
        case 'category-add':
           $cates = getCateAll();
            if(empty($_POST['dm_name'])){
                $error = 'Error';
            }else{
                insertCate($_POST['dm_name']);
            }

           header("location:".BASE_ADMIN."category");
           break;
          // Xóa danh mục
        case 'category-delete':
            $cates = getCateAll();
            if(isset($_GET['id'])){
              
              deleteCate($_GET['id']);
            }else{
              echo 'Error';
              die;
            }
            header("location:".BASE_ADMIN."category");
            break;
        // Sửa danh mục
        case 'category-edit':
            $error= '';
            $cates = getCateAll();
            if($_GET['id']){
               $cate = getFind($_GET['id']);
            //    dd($cate);
               include('./views/category/index.php');
            }else{
                echo 'ERROR';
                die;
            }
            break;
        // Trang lưu sửa
        case 'category-edit-save':
            $cates = getCateAll();
    
            if(!empty($_POST['dm_name']) && !empty($_POST['id'])){
                updateCate($_POST['dm_name'] ,$_POST['id']);
            }else{
                echo 'Chưa nhập gì !!!';
            die;
            }
            header("location:".BASE_ADMIN."category");
            break;
        // Trang sản phẩm
        case 'product':
            $product = getProductAll();
            include('./views/product/index.php');
        break;

        // Trang sản phẩm bình luận
        case 'product-cmtt':
          if(isset($_GET['id'])){
            $comments = getCommentProduct($_GET['id']);
          }
            include('./views/product/comment.php');
        break;

          // Xóa sản phẩm
          case 'product-cmtt-delete':
            if(isset($_GET['id'])){
               deleteCmtt($_GET['id']);
              header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            //   include('./views/product/comment.php');
          break;
        // Trang thêm sản phẩm
        case 'product-form-add':
            $size = getSizeAll();
            $cate = getCateAll();
            include('./views/product/form.php');
        break;
          // Lưu thêm sản phẩm
        case 'product-form-add-save':
            $size = getSizeAll();
            $cate = getCateAll();
            $errorName = '';
            $errorImage = '';
            $errorPrice = '';
            $errorCate = '';
            $errorPriceSale = ''; 
            $errorQuantity = '';
            $errorSize = '';
           
            if(!empty($_POST["sp_price"]) && !empty($_POST["sp_sale"])){
                if((int)$_POST["sp_price"]    < (int)$_POST["sp_sale"]){
                    $errorPriceSale = 'Giá giảm phải nhỏ hơn giá gốc !!!';
                }
            }
            if(!isset($_FILES["sp_image"]["name"])){
                $errorImage = "Bạn chưa chọn ảnh !!!";
            }
            if(empty($_POST["sp_price"])){
                $errorPrice = 'Bạn chưa nhập giá !!!';
            }
            if(empty($_POST["dm_id"])){
                $errorCate = 'Bạn chưa chọn danh mục !!!';
            }
            if( empty($_POST["kt_id"])){
                $errorSize = "Bạn chưa chọn kích thước !!!";
            }
            if(empty($_POST["sp_quantity"])){
                $errorQuantity = 'Chưa nhập số lượng !!!';
            }
            if(empty($_POST["sp_name"])){
                    $errorName = "Bạn chưa nhập tên sản phẩm !!!";
            }

            if(empty($errorSize) &&  empty($errorName) && empty($errorImage) && empty($errorPrice) && empty($errorCate) && empty($errorQuantity) && empty($errorPriceSale) ){
                $fileName =  $_FILES["sp_image"]["name"];
                move_uploaded_file( $_FILES["sp_image"]["tmp_name"]  ,'../upload/' .   $fileName );
                $_POST['sp_image'] =$fileName;
                insertProduct($_POST);
                header("location:".BASE_ADMIN."product");
            }else{
                include('./views/product/form.php');
            }
        break;
        case 'product-delete':
            if(isset($_GET['id'])){
                deleteProduct($_GET['id']);
              }else{
                echo 'Error';
                die;
              }
              header("location:".BASE_ADMIN."product");
              break;
        break;
        case 'product-edit':
            $size = getSizeAll();
            $cate = getCateAll();
            
            if(isset($_GET['id'])){
                $product = getProductFind($_GET['id']);
                include('./views/product/edit.php');
              }else{
                echo 'Error';
                die;
              }
              break;
        break;
        case 'product-edit-save':
            $size = getSizeAll();
            $cate = getCateAll();
            $errorName = '';
            $errorImage = '';
            $errorPrice = '';
            $errorCate = '';
            $errorPriceSale = ''; 
            $errorQuantity = '';
            $errorSize = '';
            $product = getProductFind($_POST['sp_id']);
            if(!empty($_POST["sp_price"]) && !empty($_POST["sp_sale"])){
                if((int)$_POST["sp_price"]    <  (int)$_POST["sp_sale"]){
                    $errorPriceSale = 'Giá giảm phải lớn hơn giá gốc !!!';
                }
            }
            if(!isset($_FILES["sp_image"]["name"])){
                $errorImage = "Bạn chưa chọn ảnh !!!";
            }
            if(empty($_POST["sp_price"])){
                $errorPrice = 'Bạn chưa nhập giá !!!';
            }
            if(empty($_POST["dm_id"])){
                $errorCate = 'Bạn chưa chọn danh mục !!!';
            }
            if( empty($_POST["kt_id"])){
                $errorSize = "Bạn chưa chọn kích thước !!!";
            }
            if(empty($_POST["sp_quantity"])){
                $errorQuantity = 'Chưa nhập số lượng !!!';
            }
            if(empty($_POST["sp_name"])){
                    $errorName = "Bạn chưa nhập tên sản phẩm !!!";
            }

            if(empty($errorSize) &&  empty($errorName) && empty($errorImage) && empty($errorPrice) && empty($errorCate) && empty($errorQuantity) && empty($errorPriceSale)){
                $fileName =  $_FILES["sp_image"]["name"];
            
                move_uploaded_file( $_FILES["sp_image"]["tmp_name"]  ,'../upload/' .   $fileName );
                $_POST['sp_image'] =$fileName;
                // dd($_POST);
                updateProduct($_POST , $_POST['sp_id']);
                header("location:".BASE_ADMIN."product");
              }else{
                include('./views/product/edit.php');
              }
           
              break;
        break;
        case 'order':
            $order = orderAll();

            $cancelledOrders = [];

            // Lọc danh sách đơn hàng có trạng thái chờ huỷ
            foreach ($order as $item) {
                if ($item['order_status'] == '5') {
                    $cancelledOrders[] = $item;
                }
            }

            include('./views/order/index.php');
            break;
            case 'update_order':
                $order = orderAll();
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['newStatus']) && is_array($_POST['newStatus'])) {
                        foreach ($_POST['newStatus'] as $orderId => $newStatus) {
                            // Gọi hàm để cập nhật trạng thái
                            updateOrderStatus($orderId, $newStatus);
                        }
                    }
                }
                
                header("location:".BASE_ADMIN."order");
                break;

        case 'order-delete-save':
            if(isset($_GET['id'])){
                orderDelete($_GET['id']);
            }
            header("location:".BASE_ADMIN."order");
            break; 

        // Chi tiết hóa đơn
        case 'order-detail':
            if(isset($_GET['id'])){
               $order =  getOrderByID($_GET['id']);
               $orderDetail = getOrderDetailByID($_GET['id']);
               include('./views/order/detail.php');
            }
            break;
            // Quản lý thuộc tính
        case 'propertie':
            $size = getSizeAll();
            include('./views/propertie/index.php');
            break;
        // Lưu thuộc tính thuộc tính
        case 'propertie-add-save':
            insertSize($_POST);
            header("location:".BASE_ADMIN."propertie");
            break;
         // Lưu thuộc tính thuộc tính
        case 'propertie-delete':
            if(isset($_GET['id'])){
                deleteSize($_GET['id']);
              }else{
                echo 'Error';
                die;
              }
            header("location:".BASE_ADMIN."propertie");
            break;
           // Trang sửa thuộc tính
        case 'propertie-edit':
            if(isset($_GET['id'])){
                $propertie =  getFindCate($_GET['id']); 
                $size = getSizeAll();              
              }else{
                echo 'Error';
                die;
              }
              include('./views/propertie/index.php');
            break;
        case 'propertie-edit':
            if(isset($_GET['id'])){
                $propertie =  getFindCate($_GET['id']); 
                $size = getSizeAll();              
            }else{
                 echo 'Error';
                die;
        }
            include('./views/propertie/index.php');
            break;
        case 'propertie-edit-save':
            // dd($_POST);
            if(!empty($_POST)){
                updateSize($_POST);       
            }else{
                 echo 'Error';
                die;
            }
            header("location:".BASE_ADMIN."propertie");

            break;
            case 'account':
                $user = getAllUser();
        
                include('./views/account/index.php');
                break;
    
            case 'account-edit':
                $user = getUserId((int)$_GET['id']);
        
                include('./views/account/edit.php');
                break;
    
    
            case 'account-edit-save':
                updateUser($_POST);
                header("location:".BASE_ADMIN."account");
                break;
                case 'thong-kee':
                    $listthongke = thongKe();
                    $size = getSizeAll();
                    include ('./views/thongke/doanhso.php');
                  
                    break;

                case 'bieudo':
                    $chart = cateChart();
                    include('./views/thongke/thongkesp.php');
                    break;
                    case 'bieudo2':
                        $sanphambanchay = spbanchay();
                        include('./views/thongke/spbanchay.php');
                        break;
                        case 'bieudo3':
                            $tongdoanhthu = thongke2();
                            $size = getSizeAll();
                            include('./views/thongke/doanhso.php');
                            break;
            
        }
    }else if(isset($_SESSION["user"])){
        // Trang chính
        // $chart = cateChart();
        include('./views/main.php');
    }else{
        header("location:".BASE_CLIENT."?dang-nhap");
    }

    include "./views/layouts/footer.php";
    ob_end_flush();
