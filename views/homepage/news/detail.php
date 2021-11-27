<div class="row">
    <?php foreach($nd as $nd):?>
    <div class="col-md-9">
        <h2 class="article-title title_custom"><?= $nd['title']?></h2>
        <div class="article_cat_date">
            <div style="display: inline-block;margin-right: 15px"><i class="fa fa-calendar" aria-hidden="true"></i>
                <?= $nd['created_at']?></div>

            <div style="display: inline-block">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                người đăng: <?= $nd['username'] ?>
            </div>
        </div>
        <div class="article-content">
            <p><?= $nd['content']?>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="col-md-3">
        <!-- BEGIN: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
        <div class="c-content-ver-nav">
            <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
                <h3 class="c-font-bold c-font-uppercase">Danh mục</h3>
                <div class="c-line-left c-theme-bg"></div>
            </div>
            <ul class="c-menu c-arrow-dot1 c-theme">
                <li><a href="/blog">Tất cả (16)</a></li>
                <li><a href="/blog/uu-dai-cua-shop7saocom">Ưu Đãi Của Shop7Sao.Com (1)</a></li>
                <li><a href="/blog/do-uy-tin-cua-shop7saocom">Độ Uy Tín Của Shop7Sao.Com (4)</a></li>
                <li><a href="/blog/xem-them-video-tham-gia-su-kien">Xem thêm video tham gia sự kiện (11)</a></li>
                <li><a href="/blog/su-kien-tai-shop7sao">Sự Kiện Tại Shop7sao (0)</a></li>
            </ul>
        </div>
    </div>
</div>