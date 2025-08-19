
<?php
    include("layouts/boxright.php")
?>
<div class="container-fluid pt-5 pb-3">
    
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản Phẩm Mới</span></h2>
        

            <div class="row px-xl-5">
                 <?php foreach($products as $item){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                                <!-- ảnh sản phẩm  -->
                                <a href="index.php?url=san-pham-chi-tiet&id=<?=$item["sp_id"] ?>">
                                    <img class="img-fluid w-100" src="./../upload/<?=$item["sp_image"] ?>" alt="">
                                </a>
                                <!-- <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                </div> -->
                        </div>
                        <div class="text-center py-4">
                            <!-- tên sản phẩm -->
                            <a class="h6 text-decoration-none text-truncate" href="index.php?url=san-pham-chi-tiet&id=<?=$item["sp_id"] ?>">
                                <p><?=$item["sp_name"] ?></p>
                            </a>

                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <!-- gia sản phẩm -->
                                
                                <h5 class="color_price">
                                    <?=number_format($item['sp_sale'],0,",",".")?>đ
                                </h5>
                                <h6 class="text-muted ml-2">
                                    <del><?=number_format($item['sp_price'],0,",",".")?>đ </del>
                                </h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- ========= -->
                <?php } ?>
            </div>

        
    </div>