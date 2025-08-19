<div class="container mt-4 warper" style="height: 550px ;">
    <h3>Quản lý bình luận</h3>
    
      
    <table class="table mt-3">
        <thead class="table-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Nội dung</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                    $index = 1; foreach($comments as $item){  ?>
            <tr>
                 <td><?= $index++?></td>
                 <td><?=$item['kh_name']?></td>
                 <td><img width="50px" class="rounded-circle" src="../upload/<?=$item['kh_avatar']?>"  alt=""></td>
                 <td><?=$item['content']?></td>
                 <td>
                    <!-- <a onclick="return confirm('Bạn có muốn xoá danh mục này ?')"  href="index.php?url=product-cmtt-delete&id=<?=$item['cntt_id']?>"  class="btn btn-danger">Xóa</a> -->
                 </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>