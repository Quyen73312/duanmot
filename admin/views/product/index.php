<div class="container mt-4 warper" style="height: 550px ;">
    <div class="d-flex justify-content-between align-items-center">
         <h3>Quản lý sản phẩm</h3>
         <a href="?url=product-form-add" class="bg-main">
             Thêm sản phẩm
         </a>
    </div>
    <table class="table mt-3">
        <thead class="table-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Giá giảm</th>
                <th scope="col">SL</th>
                <th scope="col text-center" width="80px">CMTT</th>
                <th scope="col text-center" width="80px">Sửa</th>
                <th scope="col text-center" width="80px">Xoá</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                    $index = 1; foreach($product as $item){  ?>
            <tr>
                 <td><?= $index++?></td>
                 <td><?=$item['sp_name']?></td>
                 <td><img width="100px" src="../upload/<?=$item['sp_image']?>"  alt=""></td>
                 <td><?=number_format($item['sp_price'],0,",",".")?>đ</td>
                 <td><?=number_format(trim($item['sp_sale']),0,",",".")?>đ</td>
                 <td><?=$item['sp_quantity']?></td>
                 <td>
                    <a  href="index.php?url=product-cmtt&id=<?=$item['sp_id']?>"  class="btn btn-dark"><i class="fa-solid fa-eye"></i></a>
                 </td>
                 <td>
                    <a  href="index.php?url=product-edit&id=<?=$item['sp_id']?>"  class="btn btn-warning">Sửa</a>
                 </td>
                 <td>
                    <a onclick="return confirm('Bạn có muốn xoá danh mục này ?')"  href="index.php?url=product-delete&id=<?=$item['sp_id']?>"  class="btn btn-danger">Xóa</a>
                 </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>