<div class="gb-timkiem-sidebar-ruouvang widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-ruouvang">Tìm kiếm</h3>
        <div class="widget-content">
            <form action="/tim-kiem-tin-tuc" method="get" accept-charset="utf-8">
                <div class="vk-newlist-banner-test-search">
                    <input type="text" name="q" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </aside>
</div>                <div class="gb-danhmuc-sidebar-ruouvang widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-ruouvang">Danh mục tin tức</h3>
        <div class="widget-content">
            <ul>
                <?php foreach ($sidebar_newscats as $newscat) : ?>
                <li>
                    <a href="/danh-muc-tin-tuc/<?= $newscat['slug'] ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?= $newscat['title'] ?></a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
    </aside>
</div>                <div class="gb-recenpost-sidebar-ruouvang widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-ruouvang">Bài viết mới nhất</h3>
        <div class="widget-content">
            <div class="gb-blog-left-recent-posts_ruouvang">
                <ul>
                    <?php foreach ($sidebar_post_new as $post) : ?>
                                        <li>
                        <div class="gb-item-recent-posts_ruouvang">
                            <div class="gb-item-recent-posts_ruouvang-img">
                                <a href="/tin-tuc/<?= $post['slug'] ?>">
                                    <img src="/uploads/post/<?= $post['image'] ?>" alt="new">
                                </a>
                            </div>
                            <div class="gb-item-recent-posts_ruouvang-text">
                                <h2><a href="/tin-tuc/<?= $post['slug'] ?>"><?= $post['title'] ?></a></h2>
                                <div class="gb-item-recent-post-time_ruouvang">
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i> <?= date('Y-m-d', strtotime($post['created_at'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach ?>
                                    </ul>
            </div>
        </div>
    </aside>
</div>