<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách Sản Phẩm</h2>
        <hr>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
        
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="col-lg-1">id</th>
                                <th>Tên Nick</th>
                                <th>Pass Nick</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá Tiền</th>
                                <th>Sever</th>
                                <th>Hành Tinh</th>
                                <th>Loại Nick</th>
                                <th>Ảnh đại diện</th>
                                <th>Số Lượng Ảnh</th>
                                <th>Bông Tai</th>
                                <th>Mã CTV</th>
                                <th>Mô tả</th>
                                <th>Trạng Thái</th>
                                <th>Ngày Tạo </th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach($ds_sp as $index => $key):?>
                            <tr>
                                <td><?php echo $index+1;?></td>
                                <td><?= $key['username']?></td>
                                <td><?= $key['password']?></td>
                                <td><?= $key['name_product']?></td>
                                <td><?= $key['price']?></td>
                                <td><?= $key['server']?></td>
                                <td><?php if($key['planet'] == 0){echo "Namec";}
                                else if($key['planet'] == 1){echo "Trái Đất";}
                                else if($key['planet']==2){echo"Xayda";}?></td>


                                <td><?php if($key['category'] == 0){echo "Nick Tầm Trung";}
                                else if($key['category'] == 1){echo "Nick VIP";}
                                else if($key['category']==2){echo"Nick VIP PRO";}
                                ?></td>
                                <td><img style="padding: 10px" width="80" height="80" src="<?=PUBLIC_ASSETS. $key['image_thumnail']?> " alt=""></td>
                                <td><img style="padding: 10px" width="80" height="80" src="<?=PUBLIC_ASSETS. $index['image']?>" alt=""></td>
                                <td><?php if($key['porata'] == 0){echo "Không có bông tai";}else if($key['porata'] == 1){echo "Có bông tai";}?></td>
                                <td><?= $key['cp_ctv']?> </td>
                                <td><?= $key['description']?> </td>
                                <td><?= $key['status']?> </td>
                                <td><?= $key['create_at']?></td>
                                <td><a href="<?= ADMIN_URL . 'sp-edit-form?id=' . $key['id'] ?>">Sửa</a></td>
                                <td><a href="<?= ADMIN_URL . 'delete-sp?id=' . $key['id'] ?>">Xóa</a></td>
                            </tr>
                    <?php endforeach;?>
                        </tbody>
                    </table>
                
        </div>
    </div>
</div>