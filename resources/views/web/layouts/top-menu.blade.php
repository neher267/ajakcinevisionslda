<ul>        
    <li><a href="{{url('/')}}">Home</a></li> |  
    <li><a href="{{url('/about')}}">About Us</a></li> |   
    <li><a href="{{url('/contact')}}">Contact Us</a></li>  |   
    <li><a id="modal_trigger" href="#modal" class="btn1">Login</a>

        <div id="modal" class="popupContainer" style="display:none;">
            <header class="popupHeader">
                <span class="header_title">Login</span>
                <span class="modal_close"><i class="fa fa-times"></i></span>
            </header>

            <section class="popupBody">
                <!-- Social Login -->
                <div class="social_login">
                    <div class="">
                        <a href="#" class="social_box fb">
                            <span class="icon"><i class="fa fa-facebook"></i></span>
                            <span class="icon_title">Connect with Facebook</span>

                        </a>

                        <a href="#" class="social_box google">
                            <span class="icon"><i class="fa fa-google-plus"></i></span>
                            <span class="icon_title">Connect with Google</span>
                        </a>
                    </div>

                    <div class="centeredText">
                        <span>Or use your Email address</span>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                        <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
                    </div>
                </div>

                <!-- Username & Password Login form -->
                <div class="user_login">
                    <form action="{{url('/login')}}" method="POST">
                        {{ csrf_field() }}

                        @if(Session('error'))
                        <div class="alert alert-danger">
                            {{ Session('error') }}
                        </div>
                        @endif 
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="checkbox">
                            <input id="remember" type="checkbox" />
                            <label for="remember">Remember 22 me on this computer</label>
                        </div>

                        <div class="action_btns">
                            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                            <input type="submit" value="Login" class="btn btn_red  pull-right" style="color: #cf0000; font-weight: 600; ">
                        </div>
                    </form>
                    <a href="#" class="forgot_password">Forgot password?</a>
                </div>

                <!-- Register Form -->
                <div class="user_register">
                    <form action="{{url('/register')}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="example@example.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile no">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password_conformation" class="form-control" placeholder="Password Conformation">
                            </div>
                        </div>

                        <div class="action_btns">
                            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                            <div class="one_half last">
                                <input type="submit" class="btn btn_red" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <script type="text/javascript">
            $("#modal_trigger").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});

            $(function () {
                // Calling Login Form
                $("#login_form").click(function () {
                    $(".social_login").hide();
                    $(".user_login").show();
                    return false;
                });

                // Calling Register Form
                $("#register_form").click(function () {
                    $(".social_login").hide();
                    $(".user_register").show();
                    $(".header_title").text('Register');
                    return false;
                });

                // Going back to Social Forms
                $(".back_btn").click(function () {
                    $(".user_login").hide();
                    $(".user_register").hide();
                    $(".social_login").show();
                    $(".header_title").text('Login');
                    return false;
                });

            })
        </script></li> |   
    <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog1">Subscribe</a></li>
</ul>