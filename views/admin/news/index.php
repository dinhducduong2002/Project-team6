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
            <a href="<?= ADMIN_URL . 'news/add' ?>">add news</a>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="col-lg-1">Stt</th>
                        <th>id_user</th>
                        <th>image</th>
                        <th>title</th>
                        <th>content</th>
                        <th>stutus</th>
                        <th>created_at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($news as $index => $key):?>
                    <tr>
                        <td><?php echo $index+1;?></td>
                        <td><?= $key['id_user']?></td>
                        <td><img src="<?=PUBLIC_ASSETS . $key['image']?>" alt="" width="100"></td>
                        <td><?= $key['title']?></td>
                        <td><?= $key['content']?></td>
                        <td><?php 
                                if($key['status'] == 0){
                                    echo "hiện thị";
                                }
                                else if($key['status'] == 1){
                                    echo "không hiện thị";
                                }
                            ?></td>
                        <td><?= $key['created_at']?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= ADMIN_URL . 'news/edit?id=' . $key['id'] ?>">Sửa</a>
                            <a class="btn btn-danger" href="<?= ADMIN_URL . 'news/delete?id=' . $key['id'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</div>