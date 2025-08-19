<link rel="stylesheet" href="./../assets/Css/product-detail.css">
<style>
    .sizeActive {
        background-color: #000;
        color: #ffff;
    }

    .colorActive {
        border: 4px solid green;
    }
    .form-control-cmtt {
                display: flex;
                justify-content: start;
                align-items: center;
            }

            .cmtt__item {
                display: flex;
                justify-content: start;
                align-items: start;
                margin: 20px;

            }

            .form-control-input-box {
                padding-bottom: 5px;
                border-bottom: 1px solid #ccc;
                display: flex;
                margin-left: 20px;
                width: 100%;
            }

            .form-control-input {
                outline: none;
                border: none;
                width: 100%;
                font-size: 15px;
            }

            .form-cmtt {
                margin: 0px 20px;
            }

            .avatar-cmtt {
                width: 40px;
                height: 40px;
                border-radius: 50px
            }

            .cmtt__content {
                text-align: justify;
                background-color: #F1F1F1;
                margin-top: 5px;
                padding: 10px;
                border-radius: 10px;
            }

            .all__cmtt::-webkit-scrollbar {
                width: 3px;
                background-color: rgb(235, 232, 232);
            }

            .all__cmtt::-webkit-scrollbar-thumb {
                background-color: #999;
                border-radius: 6px;
            }

            .all__cmtt {
                height: 400px;
                overflow-y: auto;
            }

            .cmtt__info {
                margin-left: 15px;
            }

            .btn__submit {
                cursor: pointer;
                color: #999;
                background-color: #ffff;
                border: none;
                font-size: 18px;
            }

            .btn__submit:hover {
                color: #555;
            }

            .cmtt__content-box {
                display: flex;
                justify-content: start;
                align-items: center;
            }

            .cmtt__delete {
                margin-left: 10px;
                color: #8E0007;
            }

         

            #product-carousel {
            max-width: 100%;
            margin: 0 auto;
        }

        .carousel-inner {
            position: relative;
            width: 100%;
            height: auto;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #expandedImg {
            width: 100%;
            height: auto;
        }

        #zoom-lens {
            position: absolute;
            width: 300px;
            height: 300px;
            border: 2px solid #fff;
            background: rgba(0, 0, 0, 0.2);
            visibility: hidden;
            pointer-events: none;
            background-size: 1000px 1000px;
            background-repeat: no-repeat;
            margin-left: 500px;
        }

        #cursor-overlay {
            position: fixed;
            width: 60px;
            height: 50px;
            border: 2px solid #fff;
            background: rgba(0, 0, 0, 0.2);
            visibility: hidden;
            pointer-events: none;
        }
            
    </style>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang Chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Cửa Hàng</a>
                    <span class="breadcrumb-item active">Chi tiết sản phẩm</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
    <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light product-container">
                        <img id="expandedImg" src="./../upload/<?=$product[0]["sp_image"]?>" >
                        
                        <div id="cursor-overlay"></div>
                     </div>
                     
                       
                    
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <form action="index.php?url=add-gio-hang" method="POST" class="h-100 bg-light p-30">
                            <input type="text" name="id" hidden value="<?=$product[0]["sp_id"]?>">
                    <div >
                        <h3 class="product-name"><?=$product[0]["sp_name"]?></h3>
                        <hr>
                        <div class="product-item_price-wraper">
                        <div class="product-price-main">
                            <?=number_format($product[0]['sp_sale'],0,",",".")?>đ
                        </div>
                        <div class="product-price_sale color-text">
                            <?=number_format(trim($product[0]['sp_price']),0,",",".")?>đ
                        </div>
                    </div>
                    <div id="zoom-lens"></div>
                      
                        <div class="text_drank_size">
                            <p class="text_size">Sizes:</p>
                            <form>
                                <?php foreach ($size as $key) { ?>
                                    
                                    <div class="product_detail_input">
                                        <input type="radio" class="input_size" name="size" id="<?= $key['kt_id'] ?>" value="<?=$key['kt_name']?>">
                                        <label class="name_size"  for="<?= $key['kt_id'] ?>"><?= $key['kt_name'] ?></label>
                                    </div>
                                <?php } ?>
                                
                            </form>
                        </div>
                        <div class="product-atribute_box">
                        <p>Màu sắc : </p>
                        <ul class="product-atribute_list-color">
                            <?php  
                                foreach ($color as $key) {
                            ?>
                                <label onClick="chooseColor()" for="color-<?=$key["ma_color"]?>" class="color_label"
                                    style="background-color: <?=$key["ma_color"]?>"></label>
                                <input id="color-<?=$key["ma_color"]?>" hidden name="color" value="<?=$key["kt_name"]?>" type="radio">
                            <?php  }  ?>             
                        </ul>
                    </div>
                    <div class="d-flex mb-3">
                        <p class="alert-product-number">Còn <?=$product[0]['sp_quantity']?> sản phẩm</p>
                        <p style="color : #8E0007;font-weight:bold; margin-top: 15px; margin-left: 30px;"><?=$error?></p>
                    </div>
                    
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="number-input">
                                <a class="btn-control" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                    class="minus"><i class="fa fa-minus"></i>
                                </a>
                            <input class="quantity" min="0" name="quantity" value="1" type="number">

                            <a class="btn-control" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                class="plus"><i class="fa fa-plus"></i>
                            </a>
                        </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Thêm giỏ hàng</button>
                           
                    </button>
                        </div>

                    </div>
                </div>
            </form>
            </div>
        </div>
 
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Đánh giá</a>
                        <!-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a> -->
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Mô tả sản phẩm</h4>
                            <?=$product[0]['sp_description'] ?>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Đánh giá</h4>
                            <?php if(isset($_SESSION["user"])){ ?>
                                <form action="?url=binh-luan" method="POST" class="form-cmtt">
                                    <input type="text" value="<?=$product[0]['sp_id']?>" name="sp_id" hidden>
                                    <div class="form-control-cmtt">
                                        <img class="avatar-cmtt" src="./../upload/<?=$_SESSION["user"]["kh_avatar"]?>" alt="">
                                        <div class="form-control-input-box">
                                            <input class="form-control-input" name="content" type="text"
                                                placeholder="Đánh giá của bạn ...">
                                            <button class="btn__submit" type="submit"> <i class='fas fa-arrow-alt-circle-right' style='font-size:36px'></i></i></button>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                                <div class="all__cmtt">
                                    <?php foreach ($comments as $key) { ?>
                                    <div class="cmtt__item">
                                        <img class="avatar-cmtt" src="./../upload/<?= $key["kh_avatar"]?>" alt="">
                                        <div class="cmtt__info">
                                            <h5 class="cmtt__user"><?= $key["kh_name"]?></h5>
                                            <div class="cmtt__content-box">
                                                <p class="cmtt__content"><?= $key["content"]?>
                                                </p>
                                                <?php if(isset($_SESSION["user"])){
                                                    if($_SESSION["user"]["kh_id"] ==  $key["kh_id"]){ ?>
                                                    <a  onclick="return confirm('Bạn có muốn xoá danh mục này ?')"  href="index.php?url=binh-luan-delete&id=<?= $key["cntt_id"]?>"   class="cmtt__delete"><i class="fa-solid fa-xmark"></i>xóa</a>
                                                    <?php   } ?>
                                                <?php   } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php  } ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <style>
        .img-fluid {
        max-width: 100%;
        height: 400px;
    }
    </style>
    <div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Sản phẩm liên quan</span>
    </h2>
    <div class="row px-xl-5">
        <?php
        // Kiểm tra xem biến $productRelate đã được khởi tạo và có giá trị không
        if (isset($productRelate) && is_array($productRelate) && !empty($productRelate)) {
            foreach ($productRelate as $item) {
        ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <!-- ảnh sản phẩm  -->
                            <a href="index.php?url=san-pham-chi-tiet&id=<?= $item["sp_id"] ?>"><img class="img-fluid w-100" src=".././upload/<?= $item["sp_image"] ?>" alt=""></a>
                        </div>
                        <div class="text-center py-4">
                            <!-- tên sản phẩm -->
                            <a class="h6 text-decoration-none text-truncate" href="index.php?url=san-pham-chi-tiet&id=<?= $item["sp_id"] ?>">
                                <p><?= $item["sp_name"] ?></p>
                            </a>

                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <!-- gia sản phẩm -->
                                <h5 class="color_price">
                                    <?= number_format($item['sp_sale'], 0, ",", ".") ?>đ
                                </h5>
                                <h6 class="text-muted ml-2">
                                    <del><?= number_format($item['sp_price'], 0, ",", ".") ?>đ </del>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<div class="col-12"><p>Không có sản phẩm liên quan.</p></div>';
         }?>
        
       
    
        
    </div>
</div>

    <!-- Products End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        function chooseColor() {
        const colors = document.querySelectorAll('.color_label');
        colors.forEach(element => {
        element.classList.remove("colorActive");
        element.addEventListener('click', () => {
        element.classList.add("colorActive");
        })
    });
}
    </script>
    <script src="./../assets/js/tab-slider.js"></script>
    <script src="./../assets/js/tab-component.js"></script>
    <script src="./../assets/js/list-cart.js"></script>
    <script src="./../assets/js/click-dropdown.js"></script>
    <script src="./../assets/js/back-top.js"></script>
    <!-- <script src="./../assets/js/ajax.js"></script> -->
    <!-- Đảm bảo bạn đã bao gồm thư viện jQuery trước khi sử dụng mã này -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    // Hàm thực hiện yêu cầu AJAX để cập nhật số lượng sản phẩm
    function updateProductQuantityAjax(productId, updatedQuantity) {
        $.ajax({
            type: "POST",
            url: "update_quantity.php", // Điều chỉnh đường dẫn tương ứng
            data: { id: productId, quantity: updatedQuantity },
            success: function(response) {
                console.log("Số lượng sản phẩm đã được cập nhật thành công!");
                // Có thể thực hiện các hành động khác sau khi cập nhật thành công
            },
            error: function(error) {
                console.error("Lỗi khi cập nhật số lượng sản phẩm: " + error);
                // Xử lý lỗi nếu có
            }
        });
    }
    var productContainer = document.getElementById('product-carousel');
        var productImage = document.getElementById('expandedImg');
        var zoomLens = document.getElementById('zoom-lens');
        var cursorOverlay = document.getElementById('cursor-overlay');

        productContainer.addEventListener('mouseover', function () {
            zoomLens.style.visibility = 'visible';
            cursorOverlay.style.visibility = 'visible';
        });

        productContainer.addEventListener('mousemove', function (event) {
            var rect = productContainer.getBoundingClientRect();
            var scaleX = productImage.width / rect.width;
            var scaleY = productImage.height / rect.height;
            var x = event.clientX - rect.left;
            var y = event.clientY - rect.top;

            // Cập nhật vị trí zoom lens
            var lensX = (x * scaleX   + 10) / scaleX;
            var lensY = (y * scaleY  - 50) / scaleY;
            zoomLens.style.backgroundImage = 'url(' + productImage.src + ')';
            zoomLens.style.backgroundPosition = '-' + lensX + 'px -' + lensY + 'px';

            // Cập nhật vị trí của lớp phủ con trỏ
            cursorOverlay.style.left = event.clientX - cursorOverlay.clientWidth / 2 + 'px';
            cursorOverlay.style.top = event.clientY - cursorOverlay.clientHeight / 2 + 'px';
        });

        productContainer.addEventListener('mouseout', function () {
            zoomLens.style.visibility = 'hidden';
            cursorOverlay.style.visibility = 'hidden';
        });

    
</script>
    
