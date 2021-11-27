<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách hóa đơn thanh toán</h2>
        <hr>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
        <form action="" method="post">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th class="col-lg-1">Mã CTV</th>
                        <th>Mã sản phẩm</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th class="col-lg-2">Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <?php if($_SESSION['user']['permission'] == 0):?>
                        <th>Chức năng</th>
                        <?php endif;?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_bill as $cate) : ?> 
                    <tr>
                        <td><?= $cate['id']?></td>
                        <td>#<?= $cate['id_ctv']?></td>
                        <td>#<?= $cate['id_product']?></td>
                        <td><?= $cate['name_account']?></td>
                        <td><?= $cate['password_account']?></td>
                        <td><?= $cate['name_product']?></td>
                        <td><?php echo number_format($cate['price'], 0, '', '.'); ?>đ</td>
                        <td>
                        <?php if($cate['status'] == 0){ ?><span style="color: green;"><?php echo "Hoàn thành";?></span><?php } ?>
                        <?php if($cate['status'] == 1){ ?><span style="color: red;"><?php echo "Hoàn lại tiền";?></span><?php } ?>
                        </td>
                        <td><?= $cate['updated_at']?></td>
                        <td>
                            <?php if($_SESSION['user']['permission'] == 0):?>
                                <?php if($cate['status'] == 0){ ?><button type="submit" class="btn btn-success" value="<?=$cate['id']?>" name="btn_update" >Hoàn lại tiền</button><?php } ?>
                                <a href="" onclick="return confirm('<?= ADMIN_URL ?>delete-bill?id=<?= $cate['id'] ?>','<?= $cate['id_product'] ?>')"> <button class="btn btn-danger">Xóa</button></a>
                            <?php endif;?>
                        </td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
        </div>
    </div>
</div>
<nav aria-label="...">
  <ul class="pagination pagination-sm">
    <li class="page-item">
      <a class="page-link" href="#" tabindex="-1">1</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
  </ul>
</nav>
