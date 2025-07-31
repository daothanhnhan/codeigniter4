<div class="gb-content">
    
<!--CONTENT-->
<div class="Content-Main">
    <!--SLIDESHOW-->
    <link rel="stylesheet" href="/home/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/home/plugin/owl-carouse/owl.theme.default.min.css">
<link rel="stylesheet" href="/home/plugin/animsition/css/animate.css">
<div class="gb-slideshow_ruouvang">
    <div class="container">
        <div class="gb-slideshow_ruouvang-slide owl-carousel owl-theme">
             <?php foreach ($home_slides as $slide) : ?>
            <div class="item">
                <img src="/uploads/slide/<?= $slide['image'] ?>" alt="slideshow" class="img-responsive">
            </div>
            <?php endforeach ?>
            <div class="item">
                <img src="/images/slide3.jpg" alt="slideshow" class="img-responsive">
            </div>
                
        </div>
    </div>
</div>

<script src="/home/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function (){
        $('.gb-slideshow_ruouvang-slide').owlCarousel({
            loop:true,
            margin:0,
            navSpeed:500,
            nav:true,
            dots: false,
            autoplay: true,
            rewind: true,
            navText:[],
            items:1,
            responsive:{
                0:{
                    nav:false
                },
                767:{
                    nav:true
                }
            }
        });
    });
</script>
    <!--BANNER-->
    <div class="gb-banner-4-ruouvang">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="gb-banner-1-ruouvang">
    <a href=""><img src="/images/banner1.jpg" alt="banner1" class="img-responsive"></a>
</div>            </div>
            <div class="col-sm-4">
                <div class="gb-banner-2-ruouvang">
    <a href=""><img src="/images/banner2.jpg" alt="banner2" class="img-responsive"></a>
</div>            </div>
            <div class="col-sm-4">
                <div class="gb-banner-3-ruouvang">
    <a href=""><img src="/images/banner3.jpg" alt="banner3" class="img-responsive"></a>
</div>            </div>
        </div>
    </div>
</div>
    <!--SEARCH-->
    <div class="container">
    <div class="searchnc">
        <form name="form" method="GET" id="form_search" action="/index.php">
            <input type="hidden" name="page" value="bo-loc">
            <div class="box-1 form-group">
                <select id="hang" name="hang"  class="form-control" required>
                    <option value="">Chọn thương hiệu</option>
                    <option value="1">ADIDAS</option>
                    <option value="2">NIKE</option>
                    <option value="3">THƯƠNG HIỆU KHÁC</option>
                    <!-- <option value="5">SALE OFF</option>
                    <option value="4">HÀNG ĐẶT TRƯỚC</option> -->
                </select>
                <div class="clear"></div>
            </div>
            <div class="box-1 form-group">
                <select id="gioitinh" name="gioitinh"  class="form-control">
                    <option value="">Giới tính</option>
                    <option value="1">NAM</option>
                    <option value="0">NỮ</option>
                </select>
            </div>
            <div class="box-1 form-group">
                <select name="size" id="size"  class="form-control">
                    <option value="">Chọn size</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                </select>
            </div>
            <div class="box-1 form-group">
                <select id="gia" name="gia"  class="form-control">
                    <option value="">Khoảng giá</option>
                    <option value="1">DƯỚI 1.000.000</option>
                    <option value="2">1.000.000 ĐẾN 1.500.000</option>
                    <option value="3">TRÊN 1.500.000</option>
                </select>
                <div class="clear"></div>
            </div>

            <div class="box-1 btntim  form-group">
                <input type="submit" value="TÌM KIẾM" class="form-control">
            </div>
            <!--otim-->
            <div class="clear"></div>
        </form>
    </div>
</div>
    <!--SẢN PHẨM TIÊU BIỂU-->
    <link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">
<div class="gb-tieubieu-product_ruouvang">
    <div class="container">
        <div class="gb-tieubieu-product_ruouvang-title">
            <h3>SẢN PHẨM TIÊU BIỂU</h3>
        </div>
        <div class="row">
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/variations-of-passages"><img src="/images/product2.jpg" alt="variations of passages" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/variations-of-passages">variations of passages</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">5,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('54', 'variations of passages', '5000')">Mua hàng</a>                    </div>
                </div>
            </div>
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/lorem-ipsum-available"><img src="/images/product3.jpg" alt="Lorem Ipsum available" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/lorem-ipsum-available">Lorem Ipsum available</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">0 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('53', 'Lorem Ipsum available', '0')">Mua hàng</a>                    </div>
                </div>
            </div>
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/the-majority-have-suffered"><img src="/images/product4.jpg" alt="the majority have suffered" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/the-majority-have-suffered">the majority have suffered</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">0 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('52', 'the majority have suffered', '0')">Mua hàng</a>                    </div>
                </div>
            </div>
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/alteration-in-some-form"><img src="/images/product5.jpg" alt="alteration in some form" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/alteration-in-some-form">alteration in some form</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">1,400,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('51', 'alteration in some form', '1400000')">Mua hàng</a>                    </div>
                </div>
            </div>
            <hr style="width:100%;border:0;" />            <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/there-isnt-anything-embarrassing"><img src="/images/product4.jpg" alt="there isn't anything embarrassing" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/there-isnt-anything-embarrassing">there isn't anything embarrassing</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">180,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('44', 'there isn't anything embarrassing', '180000')">Mua hàng</a>                    </div>
                </div>
            </div>
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/all-the-lorem-ipsum-generators"><img src="/images/product6.jpg" alt="All the Lorem Ipsum generators" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/all-the-lorem-ipsum-generators">All the Lorem Ipsum generators</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">205,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('42', 'All the Lorem Ipsum generators', '205000')">Mua hàng</a>                    </div>
                </div>
            </div>
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/on-the-internet-tend"><img src="/images/product7.jpg" alt="on the Internet tend" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/on-the-internet-tend">on the Internet tend</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old" style="color: #d3d3d3;"><del>13,500,000 VNĐ</del></span>
    <span class="prices_ruouvang-old">11,475,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('41', 'on the Internet tend', '11475000')">Mua hàng</a>                    </div>
                </div>
            </div>
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/repeat-predefined-chunks"><img src="/images/product8.jpg" alt="repeat predefined chunks" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/repeat-predefined-chunks">repeat predefined chunks</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">135,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('40', 'repeat predefined chunks', '135000')">Mua hàng</a>                    </div>
                </div>
            </div>
            <hr style="width:100%;border:0;" />            <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/making-this-the-first-true"><img src="/images/product1.jpg" alt="making this the first true" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/making-this-the-first-true">making this the first true</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">135,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('39', 'making this the first true', '135000')">Mua hàng</a>                    </div>
                </div>
            </div>
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/generator-on-the-internet"><img src="/images/product2.jpg" alt="generator on the Internet" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/generator-on-the-internet">generator on the Internet</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">135,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('38', 'generator on the Internet', '135000')">Mua hàng</a>                    </div>
                </div>
            </div>
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/it-uses-a-dictionary"><img src="/images/product3.jpg" alt="It uses a dictionary" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/it-uses-a-dictionary">It uses a dictionary</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old">135,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('37', 'It uses a dictionary', '135000')">Mua hàng</a>                    </div>
                </div>
            </div>
                        <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/latin-words-combined"><img src="/images/product4.jpg" alt="Latin words, combined" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/latin-words-combined">Latin words, combined</a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
    <span class="prices_ruouvang-old" style="color: #d3d3d3;"><del>7,600,000 VNĐ</del></span>
    <span class="prices_ruouvang-old">6,840,000 VNĐ</span>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        <!--MUA HÀNG-->
                        <a href="javascript:void(0)" class="btn-muahang" onclick="load_url('36', 'Latin words, combined', '6840000')">Mua hàng</a>                    </div>
                </div>
            </div>
            <hr style="width:100%;border:0;" />        </div>
    </div>
</div>
<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function (){
        $('.gb-tieubieu-product_ruouvang-slide').owlCarousel({
            loop:true,
            margin:30,
            navSpeed:500,
            nav:true,
            dots: false,
            autoplay: true,
            rewind: true,
            navText:[],
            responsive:{
                0:{
                    items:1,
                    nav: false
                },
                600:{
                    items: 3,
                    nav:true
                },
                992:{
                    items: 4,
                    nav:true
                }
            }
        });
    });
</script>
    <!--ĐỊA CHỈ-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <link rel="stylesheet" href="/plugin/slickNav/slicknav.css"/>
<link rel="stylesheet" href="/plugin/slick/slick.css"/>
<link rel="stylesheet" href="/plugin/slick/slick-theme.css"/>
<div class="gb-video_sanpham_ruouvang">
    <div class="uni-single-car-gallery-images">
        <div class="slider slider-for">
                        <div class="slide-item">
                <iframe width="560" height="450" src="https://www.youtube.com/embed/c8wwHSpodYs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
                        <div class="slide-item">
                <iframe width="560" height="450" src="https://www.youtube.com/embed/dtYJYOmm2h8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
                        <div class="slide-item">
                <iframe width="560" height="450" src="https://www.youtube.com/embed/c8wwHSpodYs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
                        <div class="slide-item">
                <iframe width="560" height="450" src="https://www.youtube.com/embed/c8wwHSpodYs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
                    </div>
        <div class="slider slider-nav">
                        <div class="slide-item-nav"><img src="/images/product1.jpg" alt="" class="img-responsive" data-zoom-image="images/singler-car/img1.jpg"></div>
                        <div class="slide-item-nav"><img src="/images/product2.jpg" alt="" class="img-responsive" data-zoom-image="images/singler-car/img1.jpg"></div>
                        <div class="slide-item-nav"><img src="/images/product3.jpg" alt="" class="img-responsive" data-zoom-image="images/singler-car/img1.jpg"></div>
                        <div class="slide-item-nav"><img src="/images/product4.jpg" alt="" class="img-responsive" data-zoom-image="images/singler-car/img1.jpg"></div>
                    </div>
    </div>
</div>

<script src="/plugin/slick/scripts.js"></script>
<script src="/plugin/slick/slick.js"></script>
<script src="/plugin/slickNav/jquery.slicknav.js"></script>

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
                        <li>
                <div class="gb-item-recent-posts_ruouvang">
                    <div class="gb-item-recent-posts_ruouvang-img">
                        <a href="/contrary-to-popular-belief"><img src="/images/image-1-770x550.jpg" alt="Contrary to popular belief"></a>
                    </div>
                    <div class="gb-item-recent-posts_ruouvang-text">
                        <h2><a href="/contrary-to-popular-belief">Contrary to popular belief</a></h2>
                        <div class="gb-news-blog_ruouvang-item-text-des">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                </div>
            </li>
                        <li>
                <div class="gb-item-recent-posts_ruouvang">
                    <div class="gb-item-recent-posts_ruouvang-img">
                        <a href="/simply-random-text"><img src="/images/image-2-770x550.jpg" alt=" simply random text"></a>
                    </div>
                    <div class="gb-item-recent-posts_ruouvang-text">
                        <h2><a href="/simply-random-text"> simply random text</a></h2>
                        <div class="gb-news-blog_ruouvang-item-text-des">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                </div>
            </li>
                        <li>
                <div class="gb-item-recent-posts_ruouvang">
                    <div class="gb-item-recent-posts_ruouvang-img">
                        <a href="/it-has-roots-in-a-piece"><img src="/images/image-3-770x550.jpg" alt="It has roots in a piece"></a>
                    </div>
                    <div class="gb-item-recent-posts_ruouvang-text">
                        <h2><a href="/it-has-roots-in-a-piece">It has roots in a piece</a></h2>
                        <div class="gb-news-blog_ruouvang-item-text-des">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                </div>
            </li>
                        <li>
                <div class="gb-item-recent-posts_ruouvang">
                    <div class="gb-item-recent-posts_ruouvang-img">
                        <a href="/lisp-intensive-treatment"><img src="/images/image-4-770x550.jpg" alt="Lisp Intensive Treatment"></a>
                    </div>
                    <div class="gb-item-recent-posts_ruouvang-text">
                        <h2><a href="/lisp-intensive-treatment">Lisp Intensive Treatment</a></h2>
                        <div class="gb-news-blog_ruouvang-item-text-des">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                </div>
            </li>
                    </ul>
    </div>
</div>            </div>
        </div>
    </div>

    <!--BANNER-->
    <div class="gb-banner-5-ruouvang">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="gb-banner-5-ruouvang-1">
                    <img src="/images/jbanner-1.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="gb-banner-5-ruouvang-2">
                    <img src="/images/jbanner-2.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="gb-banner-5-ruouvang-3">
                    <img src="/images/jbanner-3.jpg" alt="" class="img-responsive">
                </div>
                <div class="gb-banner-5-ruouvang-4">
                    <img src="/images/jbanner-4.jpg" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>