<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>500 Internal Error | iSonhei</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="robots" content="noindex, nofollow">

    <!-- bootstrap styles-->
    <link href="{{ asset('/portal/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
<!-- data Start -->
<section>
    <div class="container ">
        <div class="row ">
            <!-- left sec Start -->
            <div class="col-sm-16">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-md-offset-4 col-sm-offset-4" style="margin-top: 10px;margin-bottom: 20px;">
                        <div class="text-center">
                            <h1>Ops...</h1>
                            <h3>
                                Houve um erro inesperado. <Br>
                                Por favor tente novamente mais tarde.
                            </h3>
                            <h3>
                                Obrigado!
                            </h3>
                        </div>
                        <br>
                        <center>
                            {{--<span class="ion-sad wrong-icon "></span>--}}
                            {{HTML::image("/portal/images/icone-500.jpg", '500', array('class'=>'img-responsive'))}}
                        </center>
                        <br><br>
                        <div class="text-center">
                            <a class="btn btn-primary"  href="{{Route("portal")}}">Página Inicial</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- left sec End -->
        </div>
    </div>
</section>
<!-- Data End -->

    <!-- jQuery -->
    <script src="{{ asset('/portal/js/jquery.min.js') }}"></script>
    <!-- bootstraportal/b js -->
    <script src="{{ asset('/portal/js/bootstrap.js') }}"></script>

</body>
</html>