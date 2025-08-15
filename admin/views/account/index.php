<div class="container warper">
    <h3 class="mt-3">Quản trị tài khoản</h3>
    <div class="row mt-2">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Quyền</th>
                    <th scope="col">Chỉnh sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; foreach ($user as $item) { ?>
                <tr>
                    <td><?=$index++ ?></td>
                    <td><?=$item['kh_name'] ?></td>
                    <td><img style="width:50px;height:50px;border-radius:50px" src="../upload/<?=$item['kh_avatar'] ?>" alt=""></td>

                    <td><?=$item['kh_email'] ?></td>
                    <td><?=$item['kh_phone'] ?></td>
                    <td><?=$item['role'] == 1 ? 'Khách hàng' : 'Quản trị' ?></td>
                    <td><a  href="index.php?url=account-edit&id=<?=$item['kh_id']?>" class="btn btn-warning">Sửa</a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>