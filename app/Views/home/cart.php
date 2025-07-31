<?= $this->extend('home/layout') ?>

<?= $this->section('content') ?>
<div class="gb-content">
<?= $this->include('/home/other/breadcrumb') ?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/home/css/cart.css">
<div class="card" id="card-view">
            <div class="row">
                <div class="col-md-12 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted"><?= $total_item ?> items</div>
                        </div>
                    </div>
                    <?php foreach ($carts as $cart) : ?>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="/uploads/product/<?= $cart['product_img'] ?>"></div>
                            <div class="col">
                                <div class="row text-muted"><?= $cart['product_name'] ?></div>
                                <div class="row">Size: <?= $cart['product_size'] ?></div>
                            </div>
                            <div class="col">
                                <a href="javascript:void()" onclick="change_quantity('minus', <?= $cart['product_id'] ?>, '<?= $cart['product_size'] ?>')">-</a>
                                <a class="border"><?= $cart['product_quantity'] ?></a>
                                <a href="javascript:void()" onclick="change_quantity('plus', <?= $cart['product_id'] ?>, '<?= $cart['product_size'] ?>')">+</a>
                            </div>
                            <div class="col d-none d-sm-block"><?= number_format($cart['product_price']) ?> đ</div>
                            <div class="col"><?= number_format($cart['product_price']*$cart['product_quantity']) ?> đ <span class="close" onclick="del_item_cart(<?= $cart['product_id'] ?>, '<?= $cart['product_size'] ?>')">&#10005;</span></div>
                        </div>
                    </div>
                <?php endforeach ?>

                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right"><?= number_format($total_cart) ?> đ</div>
                    </div>

                    <a href="/thanh-toan" class="btn">CHECKOUT</a>
                    
                    <div class="back-to-shop"><a href="/tat-ca-san-pham">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                
            </div>
            
        </div>
</div>
<script>
function change_quantity (state, product_id, product_size) {
    $.ajax({
        url: '/cart-change-quantity',
        data: {
            state: state,
            product_id: product_id,
            product_size: product_size
        },
        dataType: 'html',
        success: function(response) {
            $('#card-view').html(response);
        }
    });
}

function del_item_cart (product_id, product_size) {
    $.ajax({
        url: '/del-item-cart',
        data: {
            product_id: product_id,
            product_size: product_size
        },
        dataType: 'html',
        success: function(response) {
            $('#card-view').html(response);
        }
    });
}
</script>
<?= $this->endSection() ?>
    