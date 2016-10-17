<!DOCTYPE html>
<html>
<head>
    <title>BSUIR Community</title>
    {{ Html::style('css/bootstrap.css') }}
    <!-- jQuery (Bootstrap's JavaScript plugins) -->
    {{ Html::script('js/jquery.min.js') }}
    <!-- Custom Theme files -->
    {{ Html::style('css/style.css') }}
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfont-->
    <!--animated-css-->
    {{ Html::style('css/animate.css') }}
    {{ Html::script('js/wow.min.js') }}
    <script>
        new WOW().init();
    </script>
    <!--/animated-css-->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
    <!---- start-smoth-scrolling---->
    {{ Html::script('js/move-top.js') }}
    {{ Html::script('js/easing.js') }}
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>
    <!---- start-smoth-scrolling---->
</head>
<body>
<!---->
<div class="banner">
    <div class="container">
        <div class="header">
            <div class="logo wow fadeInLeft" data-wow-delay="0.5s">
                <a href="{{ url('/') }}"><img src="images/logo.png" alt=""/></a>
            </div>
            <div class="top-menu">
                <span class="menu"></span>
                <ul>
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a class="scroll" href="#features">Features</a></li>
                    <li><a class="scroll" href="#about">About</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                </ul>
            </div>
            <!-- script-for-menu -->
            <script>
                $("span.menu").click(function(){
                    $(".top-menu ul").slideToggle("slow" , function(){
                    });
                });
            </script>
            <!-- script-for-menu -->

            <div class="clearfix"></div>
        </div>
        <div class="banner-info">
            <div class="col-md-6 banner-text wow fadeInRight" data-wow-delay="0.5s">
                <h3>introducing lucid theme</h3>
                <h1>Carefully crafted and beautiful landing page.</h1>
                <p>Etiam ullamcorper et turpis eget hendrerit. Praesent varius risus mi, at elementum magna ultricies accumsan.
                    Cras venenatis lacus sed dolor placerat tempus. Morbi blandit at neque ut imperdiet.</p>
                <a class="download" href="#">DOWNLOAD NOW</a>
                <a class="view hvr-bounce-to-left" href="#">VIEW FEATURES</a>
            </div>
            <div class="col-md-6 banner-pic wow fadeInLeft" data-wow-delay="0.5s">
                <img src="images/phn.png" alt=""/>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<div id="features" class="features">
    <div class="container">
        <div class="features-head">
            <h3>List of amazing features</h3>
        </div>
        <div class="features-section">
            <div class="col-md-4 feature-grid">
                <img class="wow bounceIn" data-wow-delay="0.4s" src="images/icon1.png" alt=""/>
                <h3>Teachers 300+</h3>
                <p>Fusce fermentum placerat magna ac pharetra. Aliquam euismod elit non ipsum lacinia consectetur.</p>
            </div>
            <div class="col-md-4 feature-grid">
                <img class="wow bounceIn" data-wow-delay="0.4s" src="images/icon2.png" alt=""/>
                <h3>Students 200+</h3>
                <p>Fusce fermentum placerat magna ac pharetra. Aliquam euismod elit non ipsum lacinia consectetur.</p>
            </div>
            <div class="col-md-4 feature-grid">
                <img class="wow bounceIn" data-wow-delay="0.4s" src="images/icon3.png" alt=""/>
                <h3>News 210+</h3>
                <p>Fusce fermentum placerat magna ac pharetra. Aliquam euismod elit non ipsum lacinia consectetur.</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<div id="about" class="about">
    <div class="container">
        <div class="about-top">
            <div class="col-md-6 about-device wow fadeInLeft" data-wow-delay="0.5s">
                <img src="images/phn2.png" alt=""/>
            </div>
            <div class="col-md-6 about-device-info wow fadeInRight" data-wow-delay="0.5s">
                <div class="device-text">
                    <h4>DIP INTO THE DETAILS</h4>
                    <h3>Beautiful on every device</h3>
                    <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.
                        Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>
                </div>
                <div class="about-list">
                    <ul>
                        <li><a href="#"><span class="abt1"></span>Awesome desgn</a></li>
                        <li><a href="#"><span class="abt2"></span>Fully responsive</a></li>
                        <li><a href="#"><span class="abt3"></span>Retina ready</a></li>
                        <li><a href="#"><span class="abt4"></span>Tons of features  and easy to use</a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<div class="footer text-center">
    <div class="container">
        <p class="wow bounceIn" data-wow-delay="0.4s">Copyright &copy; 2015 BSUIR Community | All rights reserved</p>
    </div>
</div>
<!---->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->

</body>
</html>