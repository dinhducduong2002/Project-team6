<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách Sản Phẩm</h2>
        <hr>
        <div class="table-responsive">
            
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="col-lg-1">id</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Pass Sản Phẩm</th>
                                <th>Giá Tiền</th>
                                <th>Sever</th>
                                <th>Số Dư</th>
                                <th>Loại Nick</th>
                                <th>Ảnh</th>
                                <th>Bông Tai</th>
                                <th>Mã CTV</th>
                                <th>Mô tả</th>
                                <th>Ngày Tạo </th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach($ds_sp as $index => $key):?>
                            <tr>
                                <td><?php echo $index+1;?></td>
                                <td><?= $key['username']?></td>
                                <td><?= $key['password']?></td>
                                <td><?= $key['price']?></td>
                                <td><?= $key['server']?></td>
                                <td><?php echo number_format($key['planet'], 0, '', '.'); ?>đ</td>
                                <td><?php if($key['category'] == 0){echo "Nick Tầm Trung";}
                                else if($key['category'] == 1){echo "Nick VIP";}
                                else if($key['category']==2){echo"Nick VIP PRO";}
                                ?></td>
                                <td><img src="<?= PUBLIC_ASSETS. 'uploads/avtatars'. $key['images']?>" alt=""></td>
                                <td><?php if($key['porata'] == 0){echo "Không có bông tai";}else if($key['porata'] == 1){echo "Có bông tai";}?></td>
                                <td><?= $key['cp_ctv']?> </td>
                                <td><?= $key['description']?> </td>
                                <td><?= $key['create_at']?></td>
                                <td><a href="<?= ADMIN_URL . 'sp_add?id=' . $key['id'] ?>">Sửa</a></td>
                                <td><a href="<?= ADMIN_URL . 'sp_remove?id=' . $key['id'] ?>">Xóa</a></td>
                            </tr>
                    <?php endforeach;?>
                        </tbody>
                    </table>
                
        </div>
    </div>
</div>