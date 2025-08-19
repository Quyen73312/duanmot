<?php
date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ Việt Nam
$order_date_vietnam = date('Y-m-d H:i:s');
?>
<link rel="stylesheet" href="./../assets/Css/Pay.css">
<div class="content padding-container text-center">
    <h3 class="title-page-name commom-title text-center">Thanh toán</h3>
    <p class="text-center color-text"> Giỏ hàng của bạn , hãy chọn những thứ mình muốn </p>
    <form class="cart-box" action="index.php?url=luu-thanh-toan" method="POST">
        <div class="">
            <h4 class="title-form">Điền thông tin của bạn</h4>
            <input type="text" hidden value="<?=$user["kh_id"]?>" name="kh_id"> 
            <input type="text" value="<?=$user["kh_name"]?>" name="kh_name" class="input-contact" placeholder="Tên của bạn ">
            <input type="text" value="<?=$user["kh_email"]?>"  name="kh_email" class="input-contact" placeholder="Email của bạn">
            <input type="hidden" name="order_date" value="<?= $order_date_vietnam ?>">

            <div class="form-grid-input">
                <input type="text" class="input-contact" name="kh_address" placeholder="Địa chỉ của bạn ">
                <input type="text" class="input-contact" name="kh_phone"  value="<?=$user["kh_phone"]?>" placeholder="Số điện thoại của bạn">
            </div>
            <textarea class="input-contact-textarea" name="kh_content" placeholder="Nội dung" name=""></textarea>
        </div>
        <div class="total-money">
            <div class="order-box">
                <h4 class="title-form-order">Đơn hàng</h4>
                <h3 class="plus-cart">Sản phẩm</h3>
                <?php if(isset($cart)){ ?>
                <?php $total=0; foreach ($cart as $key => $value) { 
                    $total+=$value['price'] * $value['number']?>
                <div class="plus-cart-provisional" style="padding: 10px 0px">
                    <h4><?=$value["name"]?>(<?=$value["number"]?>)</h4>
                    <h5><?=number_format($value['price'] * $value['number'] ,0,",",".")?>đ</h5>
                </div>
                <?php  } ?>
                <?php  } ?>
                <div class="plus-cart-provisional">
                    <h3 class="total-name" style="color: #8E0007">Tổng tiền</h3>
                    <h4 class="total-price"><?=number_format( $total ,0,",",".")?></h4>
                </div>
                <p class="order-note">Sau khi quý khách đặt hàng. Chúng tôi sẽ gửi thông tin đơn hàng qua Email và gọi
                    điện xác nhận đơn hàng. Sau đó sẽ tiến hành vận chuyển hàng. Quý khách thanh toán khi nhận được hàng
                </p>
                <button href="" name="submit" type="submit" class="btn btn-block rounded-lg btn-primary font-weight-bold my-3 py-3">Đặt Hàng</button>
            </div>
        </div>
    </form>
</div>