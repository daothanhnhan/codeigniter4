<!--SẢN PHẨM TIÊU BIỂU-->
    <link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">
<div class="gb-tieubieu-product_ruouvang">
    <div class="container">
        <div class="gb-tieubieu-product_ruouvang-title">
            <h3>SẢN PHẨM TIÊU BIỂU</h3>
        </div>
        <div class="row" style="display: flex;flex-wrap: wrap;">
            <?php foreach ($home_products as $product) : ?>
            <div class="col-sm-3">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/san-pham/<?= $product['slug'] ?>">
                            <img src="/uploads/product/<?= $product['image'] ?>" alt="<?= $product['title'] ?>" class="img-responsive">
                        </a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/san-pham/<?= $product['slug'] ?>"><?= $product['title'] ?></a></h2>
                        <!--PRICE-->
                        <?php if ($product['price_sale'] == 0) : ?>
                            <p class="prices_ruouvang">
    <span class="prices_ruouvang-old"><?= number_format($product['price']) ?> VNĐ</span>
</p>
                            <?php else : ?>
                            <p class="prices_ruouvang">
    <span class="prices_ruouvang-old" style="color: #d3d3d3;"><del><?= number_format($product['price']) ?> VNĐ</del></span>
    <span class="prices_ruouvang-old"><?= number_format($product['price_sale']) ?> VNĐ</span>
</p>
                            <?php endif ?>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <a href="/lien-he" class="btn-yeuthich">Liên hệ</a>                        
                        <!--MUA HÀNG-->
                        <?php if (empty($product['price_sale'])) : ?>
                        <a href="javascript:void(0)" class="btn-muahang" onclick="add_cart_item('<?= $product['id'] ?>', '<?= $product['title'] ?>', '<?= $product['price'] ?>')">Mua hàng</a>
                        <?php else : ?>
                        <a href="javascript:void(0)" class="btn-muahang" onclick="add_cart_item('<?= $product['id'] ?>', '<?= $product['title'] ?>', '<?= $product['price_sale'] ?>')">Mua hàng</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
                        
                        
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