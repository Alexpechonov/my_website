<!DOCTYPE html>
<html>
<head>
    <title>Error 404</title>
    {{ Html::style('css/404/style.css') }}
    <link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- For-Mobile-Apps-and-Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Flat Error Page Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //For-Mobile-Apps-and-Meta-Tags -->
    {{ Html::script('js/404/jquery-1.11.1.min.js') }}
</head>
<body>
<div class="main">
    <div class="agile">
        <div class="agileits_main_grid">
            <div class="agileits_main_grid_left">
                <h1>BSUIR Community</h1>
            </div>
            <div class="agileits_main_grid_right">
                <div class="menu">
                    <span class="menu-icon"><a href="#">{{ Html::image('images/404/menu-icon.png') }}</a></span>
                    <ul class="nav1">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">Registration</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">F.A.Q.</a></li>
                    </ul>
                    <!-- script-for-menu -->
                    <script>
                        $( "span.menu-icon" ).click(function() {
                            $( "ul.nav1" ).slideToggle( 300, function() {
                                // Animation complete.
                            });
                        });
                    </script>
                    <!-- /script-for-menu -->
                </div>
            </div>
            <div class="clear"> </div>
        </div>
        <div class="w3l">
            <div class="text">
                <h1>PAGE NOT FOUND</h1>

                <p>You have been tricked into click on a link that can not be found. Please check the url or go to <a href="{{ url('/') }}">main page</a> and see if you can locate what you are looking for</p>
            </div>
            <div class="image">
                {{ Html::image('images/404/smile.png') }}
            </div>
            <div class="clear"></div>
        </div>
        <div class="footer">
            <p>&copy; 2016 BSUIR Community. All Rights Reserved</p>
        </div>
        <div class="wthree">
            <div class="back">
                <a href="{{ URL::previous() }}">Back to home</a>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>