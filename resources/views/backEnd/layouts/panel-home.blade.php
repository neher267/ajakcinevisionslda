<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>{{config('app.name')}}</title>
        <meta name="description" content="Bootstrap Metro Dashboard">
        <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <!-- end: Meta -->

        <!-- Favicon -->   
        <link rel="shortcut icon" href="{{asset('public/front_end/img/favicon (2).ico')}}" type="image/x-icon">
        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->
        
        <!-- Font-awesome -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- end: font-awesome -->
        
        <!-- start: CSS -->
        <link id="bootstrap-style" href="{{asset('public/backEnd/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/backEnd/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
        <link id="base-style" href="{{asset('public/backEnd/css/style.css')}}" rel="stylesheet">
        <link id="base-style-responsive" href="{{asset('public/backEnd/css/style-responsive.css')}}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
        <!--  Date Picker -->
        <link id="bootstrap-style" href="{{asset('public/backEnd/datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <!-- end: CSS -->
        
        <!-- start: Favicon -->
        <link rel="shortcut icon" href="#">
        <!-- end: Favicon -->

        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
        <script type="text/javascript" src="{{asset('public/backEnd/js/jquery-1.9.1.min')}}"></script>
    </head>

    <body>
        
        <!-- start: Header -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="{{URL::to('/')}}"><span>{{config('app.name')}}</span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">
                            
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i>{{ Sentinel::getUser()->first_name }} 
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-title">
                                        <span>Account Settings</span>
                                    </li>
                                    <li><a href="{{URL::to('/profile')}}"><i class="halflings-icon user"></i>Profile</a></li>
                                    
                                    <li>
                                        <form action="{{ url('/logout') }}" method="POST" id="logout-form" style="margin: 0px;">
                                            {{ csrf_field() }}
                                            <ul>
                                                <li>
                                                    <a href="#" onclick="document.getElementById('logout-form').submit()"><i class="halflings-icon home" style="margin-right: 5px;"></i>Logout</a>
                                                </li>
                                            </ul>
                                        </form> 
                                    </li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- start: Header -->

        <div class="container-fluid-full">
            <div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        @yield('panel-menu')
                    </div>
                </div>
                <!-- end: Main Menu -->

                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>

                <!-- start: Content -->
                <div id="content" class="span10">
<!--                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{ url('/') }}">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="{{URL::to('/customer/home')}}">Dashboard</a></li>
                    </ul>-->
                    <div class="row-fluid">
                        @yield('content')
                    </div>
                </div>
                <!-- end: Content -->
            </div>
        </div>

        <div class="clearfix"></div>

        <footer>
            <div style="width: 100%; text-align: center; color: white;">
                &copy; <?php echo date('Y').' '; ?><a href="{{url('/')}}"><span>Smart web</span></a>
            </div>
        </footer>

        <!-- start: JavaScript-->
        
        <script src="{{asset('public/backEnd/js/jquery-1.9.1.min.js')}}"></script>
        <script src="{{asset('public/backEnd/js/jquery-migrate-1.0.0.min.js')}}"></script>
        

        <script src="{{asset('public/backEnd/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.ui.touch-punch.js')}}"></script>

        <script src="{{asset('public/backEnd/js/modernizr.js')}}"></script>

        <script src="{{asset('public/backEnd/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.cookie.js')}}"></script>

        <script src='{{asset('public/backEnd/js/fullcalendar.min.js')}}'></script>

        <script src='{{asset('public/backEnd/js/jquery.dataTables.min.js')}}'></script>
        <script src="{{asset('public/backEnd/js/excanvas.js')}}"></script>
        <script src="{{asset('public/backEnd/js/jquery.flot.js')}}"></script>
        <script src="{{asset('public/backEnd/js/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('public/backEnd/js/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('public/backEnd/js/jquery.flot.resize.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.chosen.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.uniform.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.cleditor.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.noty.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.elfinder.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.raty.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.iphone.toggle.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.uploadify-3.1.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.gritter.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.imagesloaded.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.masonry.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.knob.modified.js')}}"></script>

        <script src="{{asset('public/backEnd/js/jquery.sparkline.min.js')}}"></script>

        <script src="{{asset('public/backEnd/js/counter.js')}}"></script>

        <script src="{{asset('public/backEnd/js/retina.js')}}"></script>

        <script src="{{asset('public/backEnd/js/custom.js')}}"></script>
        
        <script src="{{asset('public/backEnd/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script>
            function printer(id){
                var content = document.getElementById(id).innerHTML;
                document.body.style.margin = '9%';
                document.body.innerHTML = content;
                window.print();   
            }
        </script>
        <script>
            $(function () {

                $('#appro_delivery_date').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "dd-mm-yyyy",
                    startDate: '+1d',
                });
            });
        </script>
        <script>
            function confirmDelete(){
                return confirm('Are you sure want to delete it?');
            }
        </script>
        <!-- end: JavaScript-->

    </body>
</html>


