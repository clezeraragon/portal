<!DOCTYPE html>
<html>

<head>
    <title>Login | Isonhei Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/animate-custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" />
    <!-- end of page level css -->

</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <!-- Notifications -->
            @include('notifications')
                
            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toforgot"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form action="{{ route('post-forgot-password-confirm') }}" autocomplete="on" method="post" role="form">
                                <h3 class="black_bg">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="Isonhei">
                                    <br>Redefinir senha
                                </h3>

                                <input type="hidden" name="passwordResetCode" value="{{{ $passwordResetCode }}}">

                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                    <label style="margin-bottom:0px;" for="password" class="youpasswd">
                                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        Nova Senha
                                    </label>
                                    <input id="password" name="password" required type="password" placeholder="eg. X8df!90EO" />
                                    <div class="col-sm-12">
                                        {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                                    <label style="margin-bottom:0px;" for="passwor_confirm" class="youpasswd">
                                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        Confimar Nova Senha
                                    </label>
                                    <input id="password_confirm" name="password_confirm" required type="password" placeholder="eg. X8df!90EO" />
                                    <div class="col-sm-12">
                                        {{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <p class="login button">
                                    <input type="submit" value="Enviar" class="btn btn-success" />
                                </p>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/vendors/livicons/minified/livicons-1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom.js') }}"></script>
    <!-- end of global js -->

    <!-- begining of page level js -->
    <!-- InputMask -->
    <script src="{{ asset('assets/js/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>


</body>
</html>