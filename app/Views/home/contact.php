<?= $this->extend('home/layout') ?>

<?= $this->section('content') ?>
<div class="gb-content">
<?= $this->include('/home/other/breadcrumb') ?>

<div class="gb-lienhe">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="gb-gioithieu-company">
    <h2><?= $footer_name ?></h2>
    <div class="gb-dress-intro">
        <ul>
            <li>
                <div class="icons">
                    <i class="fa fa-map-signs" aria-hidden="true"></i>
                </div>
                <p>Địa chỉ: <?= $header_address ?></p>
            </li>
            <li>
                <div class="icons">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                </div>
                <p>HOTLINE: <?= $header_phone ?></p>
            </li>
            <li>
                <div class="icons">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
                <p><?= $footer_email ?></p>
            </li>
        </ul>
    </div>
    <div class="gb-support-intro">
        <ul>
            <li>
                <div class="icons">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                </div>
                <p>Tư Vấn 24/7</p>
            </li>
            <li>
                <div class="icons">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                </div>
                <p>Hỗ Trợ Nhiệt Tình</p>
            </li>
            <li>
                <div class="icons">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                </div>
                <p>Cung Cấp Thông Tin Chính Xác</p>
            </li>
        </ul>
    </div>
</div>            </div>
            <div class="col-md-6">
                <div class="gb-form-lienhe">
    <h3>Thông tin liên hệ</h3>
    
    <?php if (is_array(session('errors'))) : ?>
        <?php foreach (session('errors') as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endforeach ?>
    <?php endif ?>
    
    <form action="/lien-he" method="post" id="dmca-report-form">
    	<?= csrf_field() ?>
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" name="name" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="tel" name="phone" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea class="input-xlarge form-control" name="note" rows="6"></textarea>
        </div>
        <div class="form-group">
            <div id="g-recaptcha" data-callback="recaptchaCallback"></div>
        </div>

        <button class="btn btn-gui" type="submit" name="lien_he" id="submit-btn">Gửi thông điệp</button>
    </form>
</div>            </div>
            <div class="col-md-6">
                <div class="gb-map_ruouvang-between">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.002900557301!2d106.9087052153936!3d10.963152892194922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174ddf820de9b5d%3A0xf8a60dd603269d26!2zS2h1IFBow7TMgSA1LCBUw6JuIEjDsmEsIFRwLiBCacOqbiBIw7JhLCDEkOG7k25nIE5haSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1542265416992" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
</div>            </div>
        </div>
    </div>
</div>
</div>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
<script>
// For captcha
var onloadCallback = function() {
    grecaptcha.render('g-recaptcha', {
        'sitekey' : '6LeIzXYUAAAAALQFJrpzvQogMlTxWQzhCy6kC3hc'
    });
};
var recaptchaCallback = function () {
    let submit = document.getElementById('submit-btn')
    submit.classList.remove('disabled');
}
form = document.getElementById('dmca-report-form');
form.addEventListener('submit', function (e){
    if (grecaptcha && grecaptcha.getResponse().length !== 0) {
        this.submit();
    } else {
        alert('Xin vui lòng xác nhận tôi không phải người máy');
        e.preventDefault();
    }
    
})
</script>
<!-- https://www.google.com/u/0/recaptcha/admin/ -->
<?= $this->endSection() ?>
    