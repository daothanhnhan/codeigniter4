<?= $this->extend('home/layout') ?>

<?= $this->section('content') ?>
<div class="gb-content">
<?= $this->include('/home/other/breadcrumb') ?>

<div class="gb-page-sanpham_ruouvang">
    <div class="container">
        <div class="col-md-9">
            <div class="product-filter">
    <div class="product-filter-itemperpage">
        <form action="">
            <label>Items per page</label>
            <select name="" id="">
                <option value="">9</option>
                <option value="">12</option>
                <option value="">24</option>
                <option value="">48</option>
            </select>
        </form>
    </div>
    <div class="product-filter-itemperpage-ordering">
        <form class="woocommerce-ordering" method="get">
            <label>Sort by</label>
            <select name="orderby" class="orderby">
                <option value="menu_order" selected="selected">Shop đề cử</option>
                <option value="popularity">Bán chạy </option>
                <option value="rating">Giá </option>
                <option value="date">Mới </option>
                <option value="price">Price </option>
                <option value="price">Lượt yêu thích </option>
            </select>
        </form>
    </div>
    <div class="clearfix"></div>
    <!-- .woocommerce-ordering -->
</div>            <div class="row" style="display: flex;flex-wrap: wrap;">
					<?php foreach ($products as $product) : ?>
                                <div class="col-sm-4">
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
                                
                <hr style="width:100%;border:0;">            
            </div>
            <div style="text-align: center;">
            	<?= $pager->links() ?>
            </div>
        </div>
        <div class="col-md-3">
            <?= $this->include('home/sidebar/sidebar_product') ?>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>
    