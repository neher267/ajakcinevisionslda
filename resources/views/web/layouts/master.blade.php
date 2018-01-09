<!DOCTYPE html>
<html>
    <head>
        <title>{{config('app.name')}}</title>
        <link href="{{asset('public/web_resource/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
        
        <!-- gallery -->
        <link rel="stylesheet" href="{{asset('public/web_resource/css/flexslider.css')}}" type="text/css" media="screen" />
        <!-- end gallery -->
        
        <!-- Custom Theme files -->
        <link href="{{asset('public/web_resource/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  media="all" />
        <!-- Custom Theme files -->
        <script src="{{asset('public/web_resource/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/web_resource/js/jquery.leanModal.min.js')}}"></script>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="The News Reporter Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->

    </head>
    <body>
        <!-- header-section-starts -->
        <div class="container">	
            <div class="news-paper">
                <div class="header">
                    <div class="header-left">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <h6>&nbsp;</h6>
                                <h1><span>{{config('app.name')}}</span></h1>
                            </a>
                        </div>
                    </div>
                    <div class="social-icons">
                        <li><a href="#"><i class="twitter"></i></a></li>
                        <li><a href="#"><i class="facebook"></i></a></li>
                        <li><a href="#"><i class="rss"></i></a></li>
                        <li>
                            <div class="facebook"><div id="fb-root"></div>
                                <div id="fb-root"></div>
                            </div>
                        </li>
                        <script>
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
                        </script>

                        <div class="fb-like" data-href="https://www.facebook.com/Computer-Science-Engineering-257756997718454/?fref=ts" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="header-right">
                        <div class="top-menu">
                            @include('web.layouts.top-menu')
                        </div>
                        <!---pop-up-box---->  
                        <link href="{{asset('public/web_resource/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
                        <script src="{{asset('public/web_resource/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
                        <!---//pop-up-box---->
                        <div id="small-dialog1" class="mfp-hide">
                            <div class="signup">
                                <h3>Subscribe</h3>
                                <h4>Enter Your Valid E-mail</h4>
                                <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = '';
                                        }" />
                                <div class="clearfix"></div>
                                <input type="submit"  value="Subscribe Now"/>
                            </div>
                        </div>	

                        <script>
                            $(document).ready(function () {
                                $('.popup-with-zoom-anim').magnificPopup({
                                    type: 'inline',
                                    fixedContentPos: false,
                                    fixedBgPos: true,
                                    overflowY: 'auto',
                                    closeBtnInside: true,
                                    preloader: false,
                                    midClick: true,
                                    removalDelay: 300,
                                    mainClass: 'my-mfp-zoom-in'
                                });

                            });
                        </script>	
                        <div class="search">
                            <form>
                                <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = '';
                                        }"/>
                                <input type="submit" value="">
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <span class="menu"></span>
                <div class="menu-strip">
                    @include('web.layouts.menu')
                </div>
                <!-- script for menu -->
                <script>
                    $("span.menu").click(function () {
                        $(".menu-strip").slideToggle("slow", function () {
                            // Animation complete.
                        });
                    });
                </script>
                <!-- script for menu -->
                <div class="clearfix"></div>
                <div class="main-content">		
                    @yield('content')	
                    <div class="clearfix"></div>
                </div>
                <div class="footer text-center">
                    <div class="bottom-menu">
                        @include('web.layouts.menu')
                    </div>
                    <div class="copyright text-center">
                        <p>Cinevision24 &copy; 2015 All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>

        <!--        scripts            -->
        <!--        start slider            -->

        <script src="{{asset('public/web_resource/js/responsiveslides.min.js')}}"></script>
        <script>
                    // You can also use "$(window).load(function() {"
                    $(function () {
                        $("#conference-slider").responsiveSlides({
                            auto: true,
                            manualControls: '#slider3-pager',
                        });
                    });
        </script>
        <!--        end slider            -->
        <!--        start Gallery            -->
        <script type="text/javascript" src="{{asset('public/web_resource/js/jquery.flexisel.js')}}"></script>

        <script type="text/javascript">
            $(window).load(function () {
                $("#flexiselDemo1").flexisel({
                    visibleItems: 3,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 2
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        
        <script type="text/javascript">
            $(window).load(function () {
                            $("#flexiselDemo").flexisel({
                                visibleItems: 3,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 2
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });

                        });
        </script>
        <script type="text/javascript">
            $(window).load(function () {
                            $("#flexiselDemo2").flexisel({
                                visibleItems: 3,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 2
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });

                        });
        </script>
        
        <!--        end Gallery            -->        


    </body>
</html>
