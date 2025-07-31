<?= $this->extend('home/layout') ?>

<?= $this->section('content') ?>
<div class="gb-content">
<?= $this->include('/home/other/breadcrumb') ?>

<div class="gb-single-blog_ruouvang">
    <div class="container">
        <div class="row">
            <div class="col-md-8 gb-single-blog_ruouvang-right">
                <div class="gb-single-blog_ruouvang-right-img">
                    <img src="/uploads/post/<?= $post['image'] ?>" alt="<?= $post['title'] ?>" class="img-responsive">
                </div>
                <div class="gb-single-blog_ruouvang-right-title">
                    <h2><?= $post['title'] ?></h2>
                </div>
                <div class="gb-single-blog_ruouvang-right-info">
                    <ul>
                        <li><i class="fa fa-user" aria-hidden="true"></i><a href="#"> Admin</a></li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i><a href="#"> <?= date('Y-m-d', strtotime($post['created_at'])) ?></a></li>
                        <li><i class="fa fa-folder-open-o" aria-hidden="true"></i><a href="#"> Design, Graphic</a></li>
                        <li><i class="fa fa-comment-o" aria-hidden="true"></i><a href="#"> 5 comments</a></li>
                    </ul>
                </div>
                <div class="gb-single-blog_ruouvang-right-text">
                    <?= $post['content'] ?>
                </div>

                <div class="gb-single-blog_ruouvang-share">
                    <div class="row">
                        <div class="col-md-5 gb-single-blog_ruouvang-share-left">
                            <ul>
                                <li><a href="#">Finance</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Photo</a></li>
                            </ul>
                        </div>
                        <div class="col-md-5 col-md-offset-2 gb-single-blog_ruouvang-share-right">
                            <ul>
                                <li><span><i class="fa fa-share-alt" aria-hidden="true"></i> share</span></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--bình luận-->
                <div class="gb-nhan-xet-baiviet">

    <!--NHẬN XÉT HEADER-->
    <div class="gb-nhan-xet-baiviet-header">
        <h3>NHẬN XÉT VỀ BÀI VIẾT</h3>
        <div class="gb-form-nhan-xet">
            <div class="fb-comments" data-href="http://tuan2.com"></div>
        </div>
    </div>
</div>

<div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; width: 0px; height: 0px;"><div></div></div></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
                <!--tin tức liên quan-->
                <link rel="stylesheet" href="/home/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/home/plugin/owl-carouse/owl.theme.default.min.css">


<div class="gb-tintuc-lienquan">
    <!--HEADER PRODUICT TOP-->
    <div class="gb-product-top">
        <div class="gb-tintuc-lienquan-title">Tin tức liên quan</div>
    </div>
    <!--SHOW PRODUCT ITEM-->
    <div class="gb-product-show">
        <div class="gb-tintuc-lienquan-three-item owl-carousel owl-theme">
                <?php foreach ($post_relate as $post_item) : ?>
                        <div class="item">
                <div class="gb-tintuc-item">
                    <div class="item-img">
                        <a href="/tin-tuc/<?= $post_item['slug'] ?>">
                            <img src="/uploads/post/<?= $post_item['image'] ?>" alt="<?= $post_item['title'] ?>" class="img-responsive">
                        </a>
                    </div>
                    <div class="item-text">
                        <h2><a href="/tin-tuc/<?= $post_item['slug'] ?>"><?= $post_item['title'] ?></a></h2>
                        <time> <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> <?= date_1($post_item['created_at']) ?></time>
                        <p>
                            <?= $post_item['description'] ?>
                        </p>
                        <div class="btn-doctiep">
                            <a href="/tin-tuc/<?= $post_item['slug'] ?>">Đọc tiếp</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>   
                    </div>
    </div>
</div>

<script src="/home/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-tintuc-lienquan-three-item').owlCarousel({
            loop:true,
            autoplay: true,
            responsiveClass:true,
            nav:true,
            navText:[],
            dots:false,
            margin:30,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:3
                }
            }
        });
    });
</script>
            </div>
            <div class="col-md-4 gb-blog-left">
                <?= $this->include('home/sidebar/sidebar_news'); ?>     
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>
    