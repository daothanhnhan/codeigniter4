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
        </div>
    </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
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