<div class="container mt-4 warper" style="height: 550px ;">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Quản lý hóa đơn</h3>
    </div>
  
    <table class="table mt-3">
        <thead class="table-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã Đơn Hàng</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col text-center" width="100px">Chi tiết</th>
                <th scope="col text-center" width="100px">Trạng Thái</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1; foreach( $order as $item){ 
                ?>
                
            <tr>
                <td><?= $index++?></td>
                <td><?= $item['order_code'] ?></td>
                <td><?=$item['kh_name']?></td>
                <td><?=$item['kh_email']?></td>
                <td><?=$item['kh_address']?></td>
                <td><?=$item['kh_phone']?></td>
                <td><?= $item['order_date'] ?></td>
                <td>
                    <a
                        href="index.php?url=order-detail&id=<?=$item['hd_id']?>" class="btn btn-success">Chi tiết</a>
                </td>
                
                <td>
                <form action="index.php?url=update_order" method="POST">
                        <select class="form-control" name="newStatus[<?= $item['hd_id'] ?>]">
                            <option value="1" <?= ($item['order_status'] == '1') ? 'selected' : '' ?>>Chờ xác nhận</option>
                            <option value="2" <?= ($item['order_status'] == '2') ? 'selected' : '' ?>>Đã xác nhận</option>
                            <option value="3" <?= ($item['order_status'] == '3') ? 'selected' : '' ?>>Đang giao</option>
                            <option value="4" <?= ($item['order_status'] == '4') ? 'selected' : '' ?>>Hoàn thành</option>
                            <option value="6" <?= ($item['order_status'] == '6') ? 'selected' : '' ?>>Đã hủy</option>
                        </select>
                </td>

                <td>
                    
                        <input type="hidden" name="orderId" value="<?= $item['hd_id'] ?>">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form> 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
            
    <div class="d-flex justify-content-between align-items-center">
        <h3>Hoá đơn chờ xác nhận huỷ</h3>
    </div>
    <table class="table mt-3">
        <thead class="table-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã Đơn Hàng</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col text-center" width="100px">Chi tiết</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1; foreach( $cancelledOrders as $item){ 
                ?>
                
            <tr>
                <td><?= $index++?></td>
                <td><?= $item['order_code'] ?></td>
                <td><?=$item['kh_name']?></td>
                <td><?=$item['kh_email']?></td>
                <td><?=$item['kh_address']?></td>
                <td><?=$item['kh_phone']?></td>
                <td><?= $item['order_date'] ?></td>
                <td>
                    <a
                        href="index.php?url=order-detail&id=<?=$item['hd_id']?>" class="btn btn-success">Chi tiết</a>
                </td>
                
                <td>
                <form action="index.php?url=update_order" method="POST">
                    <input type="hidden" name="newStatus[<?= $item['hd_id'] ?>]" value="6">
                    <input type="hidden" name="orderId" value="<?= $item['hd_id'] ?>">
                    <button type="submit" class="btn btn-primary">Xác nhận Huỷ</button>
                </form>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>