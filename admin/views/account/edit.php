<div class="container mt-4">
    <h3>Sửa thông tin user</h3>
    
    <form action="index.php?url=account-edit-save" method="POST">
    <input type="text" name="id" hidden value="<?=$user[0]["kh_id"]?>"> 
        <select class="form-select" name="role">
            <option value="1" <?=$user[0]["role"] == 1 ? 'selected' : '' ?>>Khách hàng</option>
            <option value="0" <?=$user[0]["role"] == 0 ? 'selected' : '' ?>>Quản trị</option>
        </select>
        <button class="btn btn-warning mt-2">Sửa</button>
    </form>

</div>