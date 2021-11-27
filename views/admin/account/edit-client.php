<div class="row">
    <div class="col-lg-6">

        <form role="form" method="post">
            <?php foreach($user_client as $key):?>
            <div class="form-group">
                <label>Số dư</label>
                <input name="balance" type="number" class="form-control" placeholder="Số dư" value="<?= $key['balance']?>">
            </div>

            <div class="form-group">
                <label for="Trạng thái">Trạng thái</label>
                <select name="status" class="form-control">
                        <option selected disabled value="0">Chọn</option>
                    <?php if($key['status'] == 0):?>
                        <option selected value="0">Khóa</option>
                        <option value="1">Hoạt động</option>
                    <?php elseif($key['status'] == 1):?>
                        <option selected value="1">Hoạt động</option>
                        <option value="0">Khóa</option>
                    <?php endif;?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="Phân quyền">Phân quyền</label>
                <select name="permission" class="form-control">
                    <option selected disabled >Chọn</option>
                    <?php if($key['permissiom'] == 0):?>
                        <option selected value="0">Admin</option>
                        <option value="1">Cộng tác viên</option>
                        <option value="2">Thành viên</option>
                    <?php elseif($key['permissiom'] == 1):?>
                        <option value="0">Admin</option>
                        <option selected value="1">Cộng tác viên</option>
                        <option value="2">Thành viên</option>
                    <?php elseif($key['permissiom'] == 2):?>
                        <option value="0">Admin</option>
                        <option value="1">Cộng tác viên</option>
                        <option selected value="2">Thành viên</option>
                    <?php endif;?>
                </select>
            </div>
            <button type="submit" name="btnEdit" class="btn btn-success">Cập nhật</button>
            <button type="reset" name="btnEdit" class="btn btn-danger">Hủy</button>
            <?php endforeach;?>
        </form>

    </div>
</div>