<div class="container warper" >
    <h3 class="mt-3">Quản trị danh mục</h3>
    <div class="row mt-2">
        <div class="col-4 mt-3">
                  
            <?php if(isset($cate)){?>
                <form method="POST" action="index.php?url=category-edit-save">
                    <input type="text" hidden name="id" value="<?= $cate[0]["dm_id"]?>">
                <div class="mb-3 border-right ">
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <input value="<?= $cate[0]["dm_name"]?>" type="text" class="form-control" name="dm_name" placeholder="Tên danh mục ..." id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <p class="text-danger"><?=$error?></p>
                </div>
                <button type="submit" class="btn btn-warning">Sửa danh mục</button>
            </form> 
            <?php }else{ ?>
                <form method="POST" action="index.php?url=category-add">
                <div class="mb-3 border-right ">
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" name="dm_name" placeholder="Tên danh mục ..." id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <p class="text-danger"><?=$error?></p>
                </div>
                <button type="submit" class="btn btn-info">Thêm danh mục</button>
            </form>
            <?php } ?>
        </div>
        <div class="col-8">
            <p class="float-end">Tổng số : <?php echo count($cates) ?></p>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col text-center" width="100px">Sửa</th>
                        <th scope="col text-center" width="100px">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $index = 1; foreach($cates as $item){  ?>
                    <tr>
                        <th scope="row"><?=$index++ ?></th>
                        <td><?= $item['dm_name'] ?></td>
                        <td><a href="index.php?url=category-edit&id=<?=$item['dm_id']?>" class="btn btn-warning">Sửa</a></td>
                        <td><a href="index.php?url=category-delete&id=<?=$item['dm_id']?>" onclick="return confirm('Bạn có muốn xoá danh mục này ?')" class="btn btn-danger">Xoá</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    <?php if(isset($_SESSION['back_url'])){ ?>
        console.log('http://localhost/PHP_1/admin/' + <?=$_SESSION['back_url']?>);
        window.location = 'http://localhost/PHP_1/admin/' + <?=$_SESSION['back_url'] ?>
    <?php }
    unset($_SESSION['back_url']);
    ?>
</script>