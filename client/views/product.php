
    <div class="title-box text-center">
        <h3 style="color:red">Tất cả sản phẩm</h3>
    </div>
    
<div class="container-fluid">
    <?php  if(isset( $key_word)){ ?>
    <p class="search">Kết quả tìm kiếm : <span style="color:#000; font-weight:400; color:red" ><?=$key_word?></span></p>
    <?php  } ?>
        
        
        <div class="row px-xl-5">
            
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">GIÁ SẢN PHẨM</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                      

                        
                      
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">DANH MỤC SẢN PHẨM</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <!-- <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3"> -->
                           
                                <?php foreach($cates as $key){ ?>
                                    <li class="list_size"><a href="index.php?url=san-pham&cate=<?=$key['dm_id'] ?>"><?=$key['dm_name'] ?></a></li>
                                <?php } ?>
                            </ul>
                        <!-- </div> -->
                        
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">SIZE SẢN PHẨM</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        
                        

                        <?php foreach($size as $key){ ?>
                            <li class="list_size">
                                <a href="index.php?url=san-pham&size=<?= $key['kt_id'] ?>">
                                    <i ></i><?=$key["kt_name"] ?>
                                </a>
                            </li> 
                        <?php } ?>
                        
                        
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-san-pham col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                    
                                    
                                        <p class="tong_sanpham">Tổng sản phẩm : <?=count($products)?></p>
                                    
                                
                            </div>
                        </div>
                    </div>
                    <?php foreach($products as $item) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1" >
                        <div class="product-item bg-light mb-4" >
                            <div class="product-img position-relative overflow-hidden">
                                <a href="index.php?url=san-pham-chi-tiet&id=<?=$item["sp_id"] ?>">
                                    <img class="img-fluid w-100" src="./../upload/<?=$item["sp_image"] ?>" alt="">
                                </a>
                                
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="index.php?url=san-pham-chi-tiet&id=<?=$item["sp_id"] ?>">
                                    <p><?=$item["sp_name"] ?></p>
                                </a>

                                <div class="d-flex align-items-center justify-content-center mt-2">
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
                    <?php } ?>
                   
                    <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>

                            