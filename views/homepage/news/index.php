<div class="row">
    <div class="col-md-9">
        <div class="art-list">
            <?php foreach($news as $n): ?>
            <div class="a-item">
                <div>
                    <a href="<?= CLIENT_URL . 'tin-tuc/detail?id=' . $n['id'] ?>">
                        <img src="<?=PUBLIC_ASSETS. $n['image']?>" alt="" width="200" height="120">
                    </a>
                </div>
                <div class="info">
                    <div class="article_title ">
                        <h4>
                            <a href="<?= CLIENT_URL . 'tin-tuc/detail?id=' . $n['id'] ?>"><?= $n['title']?></a>
                        </h4>
                    </div>
                    <div class="article_cat_date">
                        <div style="display: inline-block;margin-right: 15px">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?= $n['created_at']?>
                        </div>
                        <div style="display: inline-block">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            người đăng: <?= $n['username'] ?>
                        </div>
                    </div>
                    <div class="article_description hidden-xs"></div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="col-md-3">
        <div class="c-content-ver-nav">
            <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
                <h3 class="c-font-bold c-font-uppercase">Danh mục</h3>
                <div class="c-line-left c-theme-bg"></div>
            </div>
            <ul class="c-menu c-arrow-dot1 c-theme">
                <li><a href="">Tất cả (16)</a></li>
                <li><a href="">Ưu Đãi Của Shop7Sao.Com (1)</a></li>
                <li><a href="">Độ Uy Tín Của Shop7Sao.Com (4)</a></li>
                <li><a href="">Xem thêm video tham gia sự kiện (11)</a>
                </li>
                <li><a href="">Sự Kiện Tại Shop7sao (0)</a></li>
            </ul>
        </div>
    </div>
</div>
<br>