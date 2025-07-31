<div class="gb-timkiem-sidebar-ruouvang widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-ruouvang">Tìm kiếm</h3>
        <div class="widget-content">
            <form action="/tim-kiem-san-pham" method="get" accept-charset="utf-8">
                <div class="vk-newlist-banner-test-search">
                    <input type="text" name="q" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </aside>
</div>            
<link rel="stylesheet" href="/home/plugin/jquery-ui/jquery-ui.min.css">
<div class="gb-filterprices-sidebar-ruouvang widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-ruouvang">Lọc theo giá</h3>
        <div class="widget-content">
            <div class="uni-filter-price">
            <form action="/filter-price" method="get">
                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 2.22222%; width: 14.4444%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 2.22222%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 16.6667%;"></span></div>
                <div class="label-filter-price"><input type="text" id="amount" name="price" readonly=""></div>
                <button class="btn-filter-prince">SEARCH</button>

                <div class="clearfix"></div>
            </form>
            </div>
        </div>
    </aside>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/home/plugin/jquery-ui/jquery-ui.min.js"></script>

<script>
    $(document).ready(function () {
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 9000000,
                values: [ 200000, 1500000 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "đ" + ui.values[ 0 ] + " - đ" + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "đ" + $( "#slider-range" ).slider( "values", 0 ) +
                " - đ" + $( "#slider-range" ).slider( "values", 1 ) );
        } );
    });
</script>            <div class="gb-danhmuc-sidebar-ruouvang widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-ruouvang">Danh mục sản phẩm</h3>
        <div class="widget-content">
            <ul>
                <?php foreach ($sidebar_productcat as $productcat) : ?>
                <li>
                    <a href="/danh-muc-san-pham/<?= $productcat['slug'] ?>">
                        <i class="fa fa-angle-right" aria-hidden="true"></i> <?= $productcat['title'] ?></a>
                </li>
                <?php endforeach ?>
                <li><a href="/sale"><i class="fa fa-angle-right" aria-hidden="true"></i> Sale off</a></li>
            </ul>
        </div>
    </aside>
</div>                                    <div class="gb-product-sidebar-ruouvang widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-ruouvang">Sản phẩm mới nhất</h3>
        <div class="widget-content">
            <div class="gb-newlist-details">
                    <?php foreach ($sidebar_product_new as $product) : ?>
                                <div class="gb-product-sidebar_ruouvang-item">
                    <div class="gb-product-sidebar_ruouvang-item-img">
                        <a href="/san-pham/<?= $product['slug'] ?>"><img src="/uploads/product/<?= $product['image'] ?>" alt="review" class="img-responsive"></a>
                    </div>
                    <div class="gb-product-sidebar_ruouvang-item-info">
                        <h4><a href="/san-pham/<?= $product['slug'] ?>"><?= $product['title'] ?></a></h4>
                        <!--PRICE-->
                        <p class="prices_ruouvang">
	<span class="prices_ruouvang-old"><?= number_format($product['price']) ?> VNĐ</span>
</p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php endforeach ?>  
                                
                            </div>
        </div>
    </aside>
</div>