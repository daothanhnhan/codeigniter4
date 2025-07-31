<?= $this->extend('home/layout') ?>

<?= $this->section('content') ?>
<div class="gb-content">
<?= $this->include('/home/other/breadcrumb') ?>

<div id="Content-Payment">
    <div class="Center-Width">
        <div class="Infor-Width">
            <div class="box_payment">
            <div class="container">
                            <h1 class="title-cart">THANH TOÁN</h1>
    <?php if (is_array(session('errors'))) : ?>
        <?php foreach (session('errors') as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endforeach ?>
    <?php endif ?>
                 <div class="row" id="Content-mainSlide">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="title_form">
                            <h1 style="margin:0px; font-size:22px;padding-bottom: 15px;">Địa chỉ giao hàng</h1>
                        </div>
                        <br>
                        <form action="/thanh-toan" method="POST" role="form" id="formPayment">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="inputTxtName">Họ tên</label>
                                <input type="text" class="form-control" name="txtName" id="inputTxtName" placeholder="Nhập Họ Tên" required="required">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="txtEmail" id="inputTxtEmail" placeholder="Nhập Email" required="required">
                            </div>
                            <div class="form-group">
                                <label for="">Điện thoại <span style="color:#C03;">(*)</span></label>
                                <input type="tel" class="form-control" name="txtPhone" id="inputTxtPhone" placeholder="Nhập Số Điện Thoại" required="required">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ <span style="color:#C03;">(*)</span></label>
                                <input type="text" class="form-control" name="txtAddress" id="inputTxtAddress" placeholder="Nhập Địa Chỉ Nhận Hàng" required="required">
                            </div>
                            <div class="form-group">
                                <label for="">Ghi chú   </label>
                                <textarea name="txtNote" id="inputTxtNote" class="form-control" rows="3" placeholder="Ghi chú đơn hàng"></textarea>
                            </div>
                        
                            <button type="submit" name="complete-cart" class="btn btn-primary" id="submitPayment" style="padding:3px 30px; font-weight:bold; font-size:16px; margin-bottom:15px;">Hoàn Tất Mua Hàng</button>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 infor_cart">
                        <div class="title_form">
                            <p style="font-size:22px;padding-bottom: 20px;">Thông tin đơn hàng</p>
                        </div>
                        <br>
                        <div class="table-responsive" id="order_table">  
                               <table class="table table-bordered">  
                                    <tbody><tr>  
                                         <th width="60%" style="font-weight: bold;">Sản phẩm</th>  
                                         <th width="40%" style="font-weight: bold;">Đơn giá</th>  
                                    </tr>  
                                    <?php foreach ($carts as $cart) : ?>
                                    <tr>  
                                         <td><?= $cart['product_name'] ?></td>   
                                         <td align="right"><?= number_format($cart['product_price']*$cart['product_quantity']) ?> đ</td>  
                                    </tr>  
                                    <?php endforeach ?>
                                    <tr>  
                                         <td align="left" style="font-weight: bold;">Tổng tiền</td>  
                                         <td align="right" style="font-weight: bold;"><?= number_format($total_price) ?> đ</td>  
                                    </tr>    
                                      
                               </tbody></table>  
                          </div>
                        <!-- <a class="btn btn-default pull-right" href="/gio-hang" role="button" style="background-color:#48BD2B; border:none; font-weight:bold; color:#fff;">Mua Hàng Tiếp</a> -->
                    </div>
                </div>
            </div>
               
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>
    