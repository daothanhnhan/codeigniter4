<?= $this->extend('home/layout') ?>

<?= $this->section('content') ?>
<div class="gb-content">
<?= $this->include('/home/other/breadcrumb') ?>

<div class="gb-page-blog_ruouvang">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                        <?php foreach ($posts as $post) : ?>
                                        <div class="col-sm-6">
                        <div class="gb-news-blog_ruouvang-item">
                            <div class="gb-news-blog_ruouvang-item-img">
                                <a href="/tin-tuc/<?= $post['slug'] ?>"><img src="/uploads/post/<?= $post['image'] ?>" alt="<?= $post['title'] ?>" class="img-responsive"></a>
                                <div class="caption caption-large">
                                    <time class="the-date"><?= date("Y-m-d", strtotime($post['created_at'])) ?></time>
                                </div>
                            </div>
                            <div class="gb-news-blog_ruouvang-item-text">
                                <div class="gb-news-blog_ruouvang-item-title">
                                    <h3><a href="/simply-random-text"><?= $post['title'] ?></a></h3>
                                </div>
                                <div class="gb-news-blog_ruouvang-item-text-des">
                                    <p><?= $post['description'] ?></p>
                                </div>
                            </div>
                            <div class="gb-news-blog_ruouvang-item-button">
                                <a href="/tin-tuc/<?= $post['slug'] ?>">
                                    <button type="button" class="btn gb-btn-readmore">ĐỌC TIẾP</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                                  </div>
                <div style="text-align: center;">
                    <?= $pager->links() ?>
                </div>
            </div>
            <div class="col-md-4">
                <?= $this->include('home/sidebar/sidebar_news') ?> 
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>
    