<link rel="stylesheet" href="./../assets/Css/Cart.css">
    <div class="container-fluid">
        <div class="row2 px-xl-5">
            <div class="col-lg-car table-responsive mb-5">
            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                    <th>Xoá</th>
                </thead>
                <tbody>
                    <?php 
                    $index= 1;
                    $total = 0;
                    // if (isset($cart) && is_array($cart)) { // Kiểm tra xem $cart đã tồn tại và là một mảng không
                     foreach($cart as $key => $value){
                        $total+=$value['price'] * $value['number'];  ?>
                    <tr>
                        <td><?=$index++?></td>
                        <td class="cart_name-box">
                            <img class="cart_img"
                                src="./../upload/<?= $value["img"]?>"
                                alt="">
                            <div class="product_cart-info-rigth">
                                <p class="product_name" style="font-weight: bold"><?= $value["name"]?></p>
                               <span style="display: block; text-align: left;"><?= $value["size"]?></span>
                            </div>
                        </td>
                        <td>
                            <div class="number-input">
                                <!-- <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                    class="minus"><i class="fa fa-minus"></i>
                                </button>

                                <input class="quantity" min="0" name="quantity" value="<?=$value['number']?>" type="number">

                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                    class="plus"><i class="fa fa-plus"></i>
                                </button> -->
                                    <h4><?=$value['number']?></h4>
                            </div>
                        </td>
                        <td> <?=number_format($value['price'],0,",",".")?>đ</td>
                        <td> <?=number_format($value['price'] * $value['number'] ,0,",",".")?>đ</td>
                        <td>
                            <a href="index.php?url=xoa-gio-hang&id=<?=$value["id"]?>" class="btn btn-danger rounded-lg"><i class="fa fa-trash-o" style="font-size:24px"></i></a>
                        </td>
                    </tr>
                    <?php  }
                        // }else {
                        //     echo '<tr><td colspan="6">Không có sản phẩm trong giỏ hàng.</td></tr>';
                        // }
                    ?>
                </tbody>
            </table>
            <div class="btn-table-footer">
                <a href="index.php?url=san-pham">
                    <button  class="border border-danger rounded-lg text-danger" style="height:50px;width: 190px; fonts-size:24px"> <i class='fas fa-long-arrow-alt-left' style='font-size:16px'></i> Tiếp tục mua hàng</button>
                </a>
            </div>
            </div>
            
            <div class="col-lg-4">
            
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cộng giỏ hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tạm tính</h6>
                            <h6><?=number_format($total,0,",",".")?></h6>
                        </div>
                        <!-- <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí ship</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div> -->
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng tiền</h5>
                            <h5><?=number_format($total,0,",",".")?></h5>
                        </div>
                        <button class="btn btn-block rounded-lg btn-primary font-weight-bold my-3 py-3"><a style="color:#000;text-decoration: none;" href="index.php?url=thanh-toan">Tiền hành thanh toán</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    .btn-delete-cart{
    padding: 10px ;
    background-color:#ecacafd6;
    color: black;
    border-radius: 15px;
  }
  
    </style>
    <!-- Cart End -->


    