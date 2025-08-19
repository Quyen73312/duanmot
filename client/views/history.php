<div class="container mt-4 warper">
    <div class="d-flex justify-content-between align-items-center">
        <h3 style="margin-bottom: 50px;color:red;">Lịch sử đơn hàng của bạn</h3>
    </div>
    <?php
    // Khởi tạo một mảng để lưu trữ số đếm cho mỗi danh mục
    $orderCounts = [0, 0, 0, 0, 0, 0];

    // Lặp qua từng danh mục
    for ($i = 0; $i < 6; $i++) {
        // Đếm số đơn hàng cho danh mục hiện tại
        $orderCounts[$i] = count(${"orders" . ($i + 1)});
    }
    ?>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <?php 
            $tabNames = ["Chờ Xác Nhận", "Đã Xác Nhận", "Đang Giao", "Hoàn Thành", "Chờ Xác Nhận Hủy", "Đã Hủy"];
            
            for ($i = 0; $i < 6; $i++) {
        ?>
            <li class="nav-item-his" role="presentation">
                <button class="nav-link <?= ($i == 0) ? 'active' : '' ?>" id="pills-<?= $i + 1 ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?= $i + 1 ?>" type="button" role="tab" aria-controls="pills-<?= $i + 1 ?>" aria-selected="<?= ($i == 0) ? 'true' : 'false' ?>">
                    <?= $tabNames[$i] ?> <span class="badge bg-success soluong-his"><?= $orderCounts[$i] ?></span>
                </button>
            </li>
        <?php } ?>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <?php 
            for($i = 0; $i < 6; $i++){
        ?>
            <div class="tab-pane fade <?php echo ($i == 0) ? 'show active' : ''; ?>" id="pills-<?= $i + 1 ?>" role="tabpanel" aria-labelledby="pills-<?= $i + 1 ?>-tab" tabindex="0">
                <table class="table mt-3">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col text-center" width="100px">Trạng Thái</th>
                            <th scope="col text-center" width="100px">Chi tiết</th>
                                <th scope="col">Huỷ Đơn Hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;

                        $lichsuOrder = ${"orders" . ($i + 1)};
                        if (!empty($lichsuOrder) && is_array($lichsuOrder)) {
                            foreach ($lichsuOrder as $order) {
                                ?>
                                <tr>
                                    <td><?= $index++ ?></td>
                                    <td><?= $order['kh_name'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><?= getStatusText($order['order_status']) ?></td>
                                    <td>
                                    <a href="index.php?url=order-detail&id=<?= $order['hd_id'] ?>" class="btn btn-success">Chi tiết</a>
                                    </td>
                                    <td>
                                        <?php if (!in_array($order['order_status'], [3, 4, 5, 6])) { ?>
                                            <form action="index.php?url=update_order" method="POST" onsubmit="return confirmCancellation()">
                                                <input type="hidden" name="newStatus[<?= $order['hd_id'] ?>]" value="5">
                                                <button type="submit" class="btn btn-danger">Huỷ</button>
                                            </form>

                                            <script>
                                                function confirmCancellation() {
                                                    var confirmation = confirm("Bạn có chắc chắn muốn huỷ đơn hàng?");
                                                    // if (confirmation) {
                                                    //     var reason = prompt("Vui lòng nhập lý do hủy:");
                                                    //     if (reason) {
                                                    //         document.getElementById("reason").value = reason;
                                                    //         return true;
                                                    //     } else {
                                                    //         return false;
                                                    //     }
                                                    // } else {
                                                    //     return false;
                                                    // }
                                                }
                                            </script>
                                        <?php } else { ?>
                                            
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>Không có đơn hàng</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
</div>





  </div>

  </table>
</div>