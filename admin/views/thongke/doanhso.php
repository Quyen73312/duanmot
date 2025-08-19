<div class="container my-5 warper">
    <h3>Quản lý các thuộc tính</h3>
    <div class="row">
        <div class="col-4">
            <?php if (  isset($propertie)) { ?>
            <form action="index.php?url=propertie-edit-save" method="POST">
                <input hidden type="text" name="id" value="<?=$propertie[0]["kt_id"] ?>">
                <div class="mb-3">
                    <label class="form-label">Thuộc tính</label>
                    <input type="text" value="<?=$propertie[0]["kt_name"] ?>" name="kt_name" class="form-control"
                        placeholder="Tên thuộc tính">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kiểu hiển thị</label>
                    <select name="kieu_display" value="<?=$propertie[0]["kieu_display"] ?>" class="form-select">
                        <option <?php if ($propertie[0]["kieu_display"] == 1) {
                            echo  'selected';
                        }?> value="1">Tên</option>
                        <option <?php if ($propertie[0]["kieu_display"] == 2) {
                            echo  'selected';
                        }?> value="2">Màu</option>
                    </select>
                </div>
                <div class="mb-3 input-code-color">
                    <label class="form-label">Mã màu :</label>
                    <br>
                    <input name="ma_color" value="<?=$propertie[0]["ma_color"] ?>" type="color" placeholder="Mã màu">
                </div>
                <button class="btn btn-success">Thêm thuộc tính</button>
            </form>
            <?php  }else { ?>
            <form action="index.php?url=propertie-add-save" method="POST">
                <div class="mb-3">
                    <label class="form-label">Thuộc tính</label>
                    <input type="text" name="kt_name" class="form-control" placeholder="Tên thuộc tính">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kiểu hiển thị</label>
                    <select name="kieu_display" class="form-select">
                        <option value="1">Tên</option>
                        <option value="2">Màu</option>
                    </select>
                </div>
                <div class="mb-3 input-code-color">
                    <label class="form-label">Mã màu :</label>
                    <br>
                    <input name="ma_color" type="color" placeholder="Mã màu">
                </div>
                <button class="bg-main">Thêm thuộc tính</button>
            </form>
            <?php } ?>

        </div>
        <div class="col-8">
            <table class="table mt-3">
                <thead class="table-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Hiển thị</th>
                        <th width="80px" scope="col">Sửa</th>
                        <th width="80px" scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; foreach( $size as $item ){ ?>
                    <tr>
                        <td><?= $index++  ?></td>
                        <td><?= $item["kt_name"] ?></td>
                        <?php if($item["kieu_display"] == 1){ ?>
                        <td><?=  $item["kt_name"] ?> </td>
                        <?php }else{ ?>
                        <td>
                            <div
                                style="height:30px;width:30px;border-radius:50px;background-color:<?=  $item["ma_color"] ?> ">
                            </div>
                        </td>

                        <?php }?>
                        <td>
                            <a href="index.php?url=propertie-edit&id=<?=$item["kt_id"] ?>"
                                class="btn btn-warning">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có muốn xoá danh mục này ?')"
                                href="index.php?url=propertie-delete&id=<?=$item["kt_id"] ?>"
                                class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    <?php  } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    <?php if (isset( $propertie) && $propertie[0]["kieu_display"] == 2) { ?>
         $('.input-code-color').css("display", "block");
    <?php  }else{?>
    $('.input-code-color').css("display", "none");
    <?php  }?>
    $('.form-select').on('change', () => {
        if ($('.form-select').val() == 2) {
            $('.input-code-color').css("display", "block")
        } else {
            $('.input-code-color').css("display", "none");
        }
    });
})
</script>