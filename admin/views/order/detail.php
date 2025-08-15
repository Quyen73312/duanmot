<div class="container mt-4 warper" style="height: 550px ;">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Hóa đơn chi tiết</h3>
    </div>
    <ul class="list-group">
        <li class="list-group-item"><h6>Tên người nhận: <?=$order[0]["kh_name"]?></h6></li>
        <li class="list-group-item"><h6>Email : <?=$order[0]["kh_email"]?></h6></li>
        <li class="list-group-item"><h6>Điện thoại : <?=$order[0]["kh_phone"]?></h6></li>
        <li class="list-group-item"><h6>Địa chỉ : <?=$order[0]["kh_address"]?></h6></li>
    </ul>
    <table class="table mt-3">
        <thead class="table-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $index = 1;$total=0; foreach($orderDetail as $item){ 
                $total+=$item['sp_price'] * $item['sp_quantity']; ?>
            <tr>
                <td><?= $index++?></td>
                <td><?=$item['sp_name']?></td>
                <td><img width="70px" src="../upload/<?=$item['sp_image']?>" alt=""></td>
                <td><?=number_format($item['sp_price'],0,",",".")?>đ</td>
                <td><?=$item['sp_quantity']?></td>
                <td><?=number_format($item['sp_price'] * $item['sp_quantity'],0,",",".")?>đ</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <h4 style="color: #8E0007">Tổng tiền : <?=number_format($total,0,",",".")?>đ</h4>
</div>