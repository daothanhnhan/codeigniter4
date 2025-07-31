<!--ĐỊA CHỈ-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <link rel="stylesheet" href="/home/plugin/slickNav/slicknav.css"/>
<link rel="stylesheet" href="/home/plugin/slick/slick.css"/>
<link rel="stylesheet" href="/home/plugin/slick/slick-theme.css"/>
<div class="gb-video_sanpham_ruouvang">
    <div class="uni-single-car-gallery-images">
        <div class="slider slider-for">
            <?php foreach ($home_videos as $video) : ?>
            <div class="slide-item active">
                <?= $video['content'] ?>            
            </div>
            <?php endforeach ?>
        </div>
                        
        <div class="slider slider-nav">
            <?php foreach ($home_videos as $video) : ?>
            <div class="slide-item-nav">
                <img src="/uploads/video/<?= $video['image'] ?>" alt="" class="img-responsive" data-zoom-image="/uploads/video/<?= $video['image'] ?>">
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<script src="/home/plugin/slick/scripts.js"></script>
<script src="/home/plugin/slick/slick.js"></script>
<script src="/home/plugin/slickNav/jquery.slicknav.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            speed: 500,
            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
            slide: 'div'
        });
    });
</script>            </div>
            <div class="col-sm-6">
                <div class="gb-tintucmoinhat-blog_ruouvang">
    <h3>Tin tức mới nhất</h3>
    <div class="gb-blog-left-recent-posts_ruouvang">
        <ul>
            <?php foreach ($home_posts as $post) : ?>
                        <li>
                <div class="gb-item-recent-posts_ruouvang">
                    <div class="gb-item-recent-posts_ruouvang-img">
                        <a href="/tin-tuc/<?= $post['slug'] ?>">
                            <img src="/uploads/post/<?= $post['image'] ?>" alt="<?= $post['title'] ?>">
                        </a>
                    </div>
                    <div class="gb-item-recent-posts_ruouvang-text">
                        <h2><a href="/tin-tuc/<?= $post['slug'] ?>"><?= $post['title'] ?></a></h2>
                        <div class="gb-news-blog_ruouvang-item-text-des">
                            <p><?= $post['description'] ?></p>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach ?>     
                    </ul>
    </div>
</div>            </div>
        </div>
    </div>