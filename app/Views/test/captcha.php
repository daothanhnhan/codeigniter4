<?php
  // if(isset($_POST['submit'])){
  //    $name;
  //    $captcha;
  //    if(isset($_POST['name'])){
  //       $name = $_POST['name'];
  //    }
  //    if(isset($_POST['g-recaptcha-response'])){
  //       $captcha = $_POST['g-recaptcha-response'];
  //    }
  //    if(!$captcha){
  //       echo '<h2>Hay xac nhan CAPTCHA</h2>';
  //    }else{
  //       $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeIzXYUAAAAALQFJrpzvQogMlTxWQzhCy6kC3hc&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
  //       if($response.success == false){
  //          echo '<h2>SPAM!</h2>';
  //       }else{
  //          echo '<h2>'.$name.' Khong phai robot :)</h2>';
  //       }
  //    }
  // }

?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<h1>Google reCAPTHA</h1>
<p>Rất xin lỗi vì mình không thể demo được code php, mình có coment đoạn code php ngay trên phần code html bạn có thể tham khảo.</p>
<form id="" action="/captcha" method="post">
  <?= csrf_field() ?>
  <input type="text" placeholder="Tên của bạn" required name="name"><br><br>
  <button name="submit">Gửi</button>
  <br><br>
  <div class="g-recaptcha" data-sitekey="6LeIzXYUAAAAALQFJrpzvQogMlTxWQzhCy6kC3hc"></div>
</form>
<!-- https://www.google.com/u/0/recaptcha/admin/ -->