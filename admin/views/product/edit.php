<div class="container mt-4">
    <h3>Sửa sản phẩm</h3>
    <form   action="index.php?url=product-edit-save" method="POST" class="row" enctype='multipart/form-data' >
        <div class="col-6">
            <input type="text" hidden name="sp_id" value="<?=$product[0]["sp_id"]?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" value="<?=$product[0]["sp_name"]?>" name="sp_name" placeholder="Tên sản phẩm" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <p class="text-danger"><?= !empty($errorName) ? $errorName : ''  ?></p>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                <input type="file" accept="image/*"   id="imgInp"  class="form-control"  value="<?=$product[0]["sp_image"]?>" name="sp_image" id="exampleInputPassword1">
                <input type="text" class="form-control" hidden value="<?=$product[0]["sp_image"]?>" name="sp_image" id="exampleInputPassword1">
                <p class="text-danger"><?= !empty($errorImage) ? $errorImage : ''  ?></p>
                
            </div>
            <div class="">
                <img width="200px" id="blah" src="../upload/<?=$product[0]["sp_image"]?>" />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giá</label>
                <input type="text" class="form-control"  value="<?=$product[0]["sp_price"]?>" name="sp_price"  placeholder="Giá sản phẩm" id="exampleInputPassword1">
                <p class="text-danger"><?= !empty($errorPrice) ? $errorPrice : ''  ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giá giảm</label>
                <input type="text" class="form-control"  value="<?=$product[0]["sp_sale"]?>"  name="sp_sale"  placeholder="Giá sale" id="exampleInputPassword1">
                <p class="text-danger"><?= !empty($errorPriceSale) ? $errorPriceSale : ''  ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                <input type="number" class="form-control"  name="sp_quantity" value="<?=$product[0]["sp_quantity"]?>"   placeholder="Số lượng" id="exampleInputPassword1">
                <p class="text-danger"><?= !empty($errorQuantity) ? $errorQuantity : ''  ?></p>

            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Danh mục sản phẩm</label>
                <select class="form-control" value="<?= $product[0]["dm_id"]?>" name="dm_id" aria-label="Default select example">
                    <?php  foreach($cate as $item){ ?>
                    <option  <?php if($item["dm_id"] == $product[0]["dm_id"] ){
                       echo 'selected';
                    } ?>  value="<?=$item['dm_id']?>"><?= $item['dm_name'] ?></option>
                    <?php  } ?>
                </select> 
                <p class="text-danger"><?= !empty($errorCate) ? $errorCate : ''  ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Kích thước</label>
                <select class="form-control" value="<?= $product[0]["kt_id"]?>" name="kt_id" aria-label="Default select example">
                    <option selected hidden>Kích thước</option>
                    <?php  foreach($size as $item){ ?>
                    <option <?php if($item["kt_id"] == $product[0]["kt_id"] ){
                       echo 'selected';
                    } ?> value="<?=$item['kt_id']?>"><?= $item['kt_name'] ?></option>
                    <?php  } ?>
                </select>
                <p class="text-danger"><?= !empty($errorSize) ? $errorSize : ''  ?></p>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                <div class="form-floating">
                    <textarea class="form-control"   name="sp_description"  id="floatingTextarea2"
                        style="height: 120px"><?=$product[0]["sp_description"]?></textarea>
                    <label for="floatingTextarea2">Giới thiệu</label>
                </div>
            </div>
            <button class="btn float-end mt-2 btn-warning">Sửa sản phẩm</button>
        </div>

    </form>
</div>