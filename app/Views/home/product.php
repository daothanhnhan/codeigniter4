<?= $this->extend('home/layout') ?>

<?= $this->section('content') ?>
<div class="gb-content">

<script type="text/javascript">
   $(document).ready(function(data){  
      $('.btn_addCart').click(function(){  
         // var product_id = $(this).attr("id");
           var product_id = $('#product_id').val();
           var product_name = $('#product_name').val();  
           var product_price = $('#product_price').val();  
           var product_quantity = $('#product_num').val();
           var product_img = $('#product_img').val();
           var action = "add";
           var size = $('#size').val();
           // alert(size);return false;
           // var a = {a : 'a'};
           if(product_quantity > 0)  
           {                  
                 $.ajax({  
                     url:"/add-cart",  
                     method:"POST",  
                     dataType:"json",
                     data: {
                        product_id:product_id,
                        product_name:product_name,
                        product_img:product_img,
                        product_price:product_price,
                        product_quantity:product_quantity,
                        product_size:size,
                        action:action
                     },
                      
                     success:function(data)  
                     {  
                            console.log(data);
                          // $('#order_table').html(data.order_table);  
                          // $('.badge').text(data.cart_item);  
                          if (confirm('Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không')) {
                              window.location = '/gio-hang';
                          }else{
                              location.reload();
                              // window.location = '/gio-hang';
                          }  
                     },
                     error: function () {
                        alert('loi');
                     }  
                });  

           }  
           else  
           {  
                alert("Please Enter Number of Quantity")  
           }  
      });
   });
 </script>
<link rel="stylesheet" href="/home/plugin/slickNav/slicknav.css"/>
<link rel="stylesheet" href="/home/plugin/slick/slick.css"/>
<link rel="stylesheet" href="/home/plugin/slick/slick-theme.css"/>
<?= $this->include('/home/other/breadcrumb') ?>

<div class="gb-chitiet_sanpham_ruouvang">
    <div class="gb-chitiet_sanpham_ruouvang-body">
        <div class="container">
            <div class="gb-chitiet_sanpham_ruouvang-left">

                <!--chi titest sản phẩm-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="gb-chitiet_sanpham_ruouvang_left-img">
                            <div class="uni-single-car-gallery-images">
                                <div class="slider slider-for">
                                    <div class="slide-item"><img src="/uploads/product/<?= $product['image'] ?>" alt="" class="img-responsive img1" data-zoom-image="/uploads/product/<?= $product['image'] ?>"></div>

                                    <?php foreach ($product_img_sub as $img_sub) : ?>
                                    <div class="slide-item"><img src="/uploads/product/<?= $img_sub ?>" alt="1" class="img-responsive" data-zoom-image="/uploads/product/<?= $img_sub ?>"></div>
                                    <?php endforeach ?>
                                </div>
                                <div class="slider slider-nav">
                                    <div class="slide-item-nav"><img src="/uploads/product/<?= $product['image'] ?>" alt="1" class="img-responsive" data-zoom-image="/uploads/product/<?= $product['image'] ?>"></div>

                                    <?php foreach ($product_img_sub as $img_sub) : ?>
                                    <div class="slide-item-nav"><img src="/uploads/product/<?= $img_sub ?>" alt="1" class="img-responsive" data-zoom-image="/uploads/product/<?= $img_sub ?>"></div>
                                    <?php endforeach ?>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="gb-chitiet_sanpham_ruouvang_left-info">
                            <h1 class="product_title entry-title"><?= $product['title'] ?></h1>
                            <!-- .description -->
                            <div class="description">
                                <?= $product['description'] ?>
                            </div>
                            <!--ENTRY PRICE-->
                            <p class="prices_ruouvang">
                                <?php if (empty($product['price_sale'])) : ?>
    <span class="prices_ruouvang-old"><?= number_format($product['price']) ?> VNĐ</span>
    <?php else : ?>
    <span class="prices_ruouvang-old" style="color: #d3d3d3;"><del><?= number_format($product['price']) ?> VNĐ</del></span>
    <span class="prices_ruouvang-old"><?= number_format($product['price_sale']) ?> VNĐ</span>
    <?php endif ?>
</p>
                            <div class="gb-divider"></div>
                            <!-- <div class="gb-luuy-ruouvang">
                                <h4>Lưu ý</h4>
                                <p>Chúng tôi không bán hàng trực tuyến, trang web chỉ mang tính chất giới thiệu sản phẩm. Quý khách mua hàng xin liên hệ với chúng tôi</p>
                                <a href="tel:0967200588">Hotline: 0967 2005 88</a>
                            </div> -->
                            <div class="gb-chi-tiet-add-to-cart">
    <form class="cart" method="post" enctype="multipart/form-data">
        <div class="gb-selectsize">
            <div class="form-group">
                <label>Select size</label>
                <select class="form-control" name="size" id="size">
                    <option value="">Chọn...</option>
                    <?php foreach ($product_size as $size) : ?>
                    <option value="<?= $size ?>"><?= $size ?></option>
                <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="quantity">
            <div class="form-group">
                <label>Số lượng:</label>
                <input type="number" class="form-control qty number_cart" id="product_num" min="0" value="1">
                <input type="hidden" name="id" id="product_id" value="<?= $product['id'] ?>">
                <input type="hidden" name="name" id="product_name" value="<?= $product['title'] ?>">
                <input type="hidden" name="img" id="product_img" value="<?= $product['image'] ?>">
                <?php if (empty($product['price_sale'])) : ?>
                <input type="hidden" name="price" id="product_price" value="<?= $product['price'] ?>">
                <?php else : ?>
                <input type="hidden" name="price" id="product_price" value="<?= $product['price_sale'] ?>">
                <?php endif ?>
            </div>
        </div>
        <button type="button" name="add-to-cart" class="single_add_to_cart_button button alt btn_addCart">Add to cart</button>
        <div class="clearfix"></div>
    </form>
</div>                            <div class="gb-divider"></div>
                            <!--SHARE-->
                            <div class="footer-about-ruouvang-social">
    <ul>
        <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
    </ul>
</div>
                        </div>
                    </div>
                </div>

                <!--THÔNG SỐ VÀ MÔ TẢ-->
                <div class="gb-thongso-mota">
                    <div class="uni-shortcode-tabs-default">
                        <div class="uni-shortcode-tab-3">
                            <div class="tabbable-panel">
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs ">
                                        <li  class="active">
                                            <a href="#tab_default_32" data-toggle="tab">
                                                Mô tả sản phẩm</a>
                                        </li>
                                        <li>
                                            <a href="#tab_default_33" data-toggle="tab">
                                                Delivery</a>
                                        </li>
                                        <li>
                                            <a href="#tab_default_34" data-toggle="tab">
                                                Ask a Question</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_default_32">
                                            <?= $product['content'] ?>
                                        </div>
                                        <div class="tab-pane" id="tab_default_33">
                                            <p>Comes Beautifully Gift Boxed as shown. Delivered from the UK.</p>
                                        </div>
                                        <div class="tab-pane" id="tab_default_34">
                                            <!--                                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="1"></div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--realte product-->
                <link rel="stylesheet" href="/home/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/home/plugin/owl-carouse/owl.theme.default.min.css">
<div class="gb-home-product gb-home-product-relate">
    <div class="container">
        <div class="titleCategoryProduct_ruouvang">SẢN PHẨM LIÊN QUAN</div>
        <div class="gb-home-product-relate-slide owl-carousel owl-theme">
                <?php foreach ($product_relate as $product_item) :?>
                        <div class="item">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/san-pham/<?= $product_item['slug'] ?>"><img src="/uploads/product/<?= $product_item['image'] ?>" alt="<?= $product_item['title'] ?>" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/san-pham/<?= $product_item['slug'] ?>"><?= $product_item['title'] ?></a></h2>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
                            <?php if (empty($product_item['price_sale'])) : ?>
    <span class="prices_ruouvang-old"><?= number_format($product_item['price']) ?> VNĐ</span>
    <?php else : ?>
    <span class="prices_ruouvang-old" style="color: #d3d3d3;"><del><?= number_format($product_item['price']) ?> VNĐ</del></span>
    <span class="prices_ruouvang-old"><?= number_format($product_item['price_sale']) ?> VNĐ</span>
    <?php endif ?>
</p>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">

                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        
                        <!--MUA HÀNG-->
                        <?php if (empty($product_item['price_sale'])) : ?>
                        <a href="javascript:void(0)" class="btn-muahang" onclick="add_cart_item('<?= $product_item['id'] ?>', '<?= $product_item['title'] ?>', '<?= $product_item['price'] ?>')">Mua hàng</a>                    
                        <?php else : ?>
                        <a href="javascript:void(0)" class="btn-muahang" onclick="add_cart_item('<?= $product_item['id'] ?>', '<?= $product_item['title'] ?>', '<?= $product_item['price_sale'] ?>')">Mua hàng</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php endforeach ?> 
                        
                    </div>
    </div>
</div>

<script src="/home/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function (){
        var owl = $('.gb-home-product-relate-slide');
        owl.owlCarousel({
            loop:true,
            margin:30,
            navSpeed:500,
            nav:true,
            dots:false,
            autoplay: true,
            rewind: true,
            navText:[],
            items:4
        });
    });
</script>
            </div>
        </div>
    </div>
</div>

<!-- <script src="/home/plugin/slick/scripts.js"></script> -->
<script src="/home/plugin/slick/slick.js"></script>
<!-- <script src="/home/plugin/slickNav/jquery.slicknav.js"></script> -->

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
</script>
</div>
<?= $this->endSection() ?>
    