<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách Sản Phẩm</h2> <a href="<?= ADMIN_URL . 'sp-add-form?id=' ?>">add</a>
        <hr>
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
                                <th>Số Dư</th>
                                <th>Loại Nick</th>
                                <th>Ảnh đại diện</th>
                                <th>Ảnh 1</th>
                                <th>Ảnh 2</th>
                                <th>Ảnh 3</th>
                                <th>Ảnh 4</th>
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
                                <td><?php echo number_format($key['planet'], 0, '', '.'); ?>đ</td>
                                <td><?php if($key['category'] == 0){echo "Nick Tầm Trung";}
                                else if($key['category'] == 1){echo "Nick VIP";}
                                else if($key['category']==2){echo"Nick VIP PRO";}
                                ?></td>
                                <td><img src="<?= PUBLIC_ASSETS. 'uploads/avtatars'. $key['image_thumnail']?>" alt=""></td>
                                <td><img src="<?= PUBLIC_ASSETS. 'uploads/avtatars'. $key['image1']?>" alt=""></td>
                                <td><img src="<?= PUBLIC_ASSETS. 'uploads/avtatars'. $key['image2']?>" alt=""></td>
                                <td><img src="<?= PUBLIC_ASSETS. 'uploads/avtatars'. $key['image3']?>" alt=""></td>
                                <td><img src="<?= PUBLIC_ASSETS. 'uploads/avtatars'. $key['image4']?>" alt=""></td>
                                <td><?php if($key['porata'] == 0){echo "Không có bông tai";}else if($key['porata'] == 1){echo "Có bông tai";}?></td>
                                <td><?= $key['cp_ctv']?> </td>
                                <td><?= $key['description']?> </td>
                                <td><?= $key['status']?> </td>
                                <td><?= $key['create_at']?></td>
                                <td><a href="<?= ADMIN_URL . 'sp_add?id=' . $key['id'] ?>">Sửa</a></td>
                                <td><a href="<?= ADMIN_URL . 'delete-sp?id=' . $key['id'] ?>">Xóa</a></td>
                            </tr>
                    <?php endforeach;?>
                        </tbody>
                    </table>
                
        </div>
    </div>
</div>