<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $head_des ?>"> 
    <meta name="keywords" content="<?= $head_keyword ?>">
    <title><?= $head_title ?></title>
    <meta property="og:image" content="<?= $og_image ?>" />
    <link rel="icon" href="/uploads/config/<?= $head_icon ?>" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="/home/plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/home/plugin/bootstrap/css/bootstrap-theme.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css'>
    <link rel="stylesheet" href="/home/plugin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/home/css/style-ruouvang.css">
    <!-- <script src="/home/plugin/jquery/jquery-2.0.2.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/home/plugin/bootstrap/js/bootstrap.js"></script>
    <?= $embed_code_header ?>
</head>

<body>

<?= $this->include('home/header') ?>
<?= $this->renderSection('content') ?>
<?= $this->include('home/footer') ?>

<script type="text/javascript" src="https://web.cmbliss.com/webtools/hotline/js/hotline.js"></script>
<script type="text/javascript">
    $("body").hotline({phone:"<?= $header_phone ?>",p_bottom:true,bottom:0,p_left:true,left:0,bg_color:"#e60808",abg_color:"rgba(230, 8, 8, 0.7)",show_bar:true,position:"fixed",});
</script>

<script type="text/javascript">
    function add_cart_item (id, name, price) {
        var name1 = encodeURIComponent(name);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
           // document.getElementById("demo").innerHTML = this.responseText;
           // alert(this.responseText);
           // alert('thanh cong.');
           // window.location.href = "/gio-hang";
           if (confirm('Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không')) {
                  window.location = '/gio-hang';
              }else{
                  // location.reload();
              }  
          }
        };
        xhttp.open("POST", "/add-cart", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("product_id="+id+"&product_name="+name1+"&product_price="+price+"&product_quantity=1&action=add&product_size=&product_img=");
        // xhttp.send();        
    }
</script>
<?= $embed_code_footer ?>
</body>

</html>

