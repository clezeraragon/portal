<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@section('description')@show">
    <meta name="keywords" content="@section('keywords')@show">
    <title>@section('title')@show</title>

    <link rel="shortcut icon" href="{{ asset('portal/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('portal/images/favicon.ico') }}" type="image/x-icon">
    <!-- bootstrap styles-->
    <link href="{{ asset('/portal/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/iCheck/skins/all.css') }}" rel="stylesheet"/>
    {{HTML::style("portal/css/slider/slider.css")}}
    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

    <!-- Modal Promoção -->
    {{HTML::style(asset("assets/css/custom/modalPromo.css"))}}
    <!-- ionicons font -->
    {{HTML::style("portal/css/ionicons.min.css")}}

    <!-- animation styles -->
    {{HTML::style("portal/css/animate.css")}}
    <!-- custom styles -->

    <!-- loader login -->
    {{HTML::style("assets/css/custom/loader.css")}}

    {{HTML::style("portal/css/custom-blue.css")}}
    {{HTML::style("portal/css/custom.css")}}
    <!-- owl carousel styles-->

    {{HTML::style("portal/css/owl.carousel.css")}}

    {{HTML::style("portal/css/owl.transitions.css")}}
    <!-- magnific popup styles -->

    {{HTML::style("portal/css/magnific-popup.css")}}

    <!-- css custom plugin checkeEditor para exibir no template-->
    {{HTML::style("assets/css/custom/CustomEditCheckEditor.css")}}

    @yield('header_styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

{{--Google Analytics--}}
@include('portal.layouts.google_analytics')

<!-- preloader start -->
<div id="preloader">
    <div id="status"></div>
</div>
<!-- preloader end -->

<!-- Modal Promoção -->
{{--<div class="hidden-xs modalPromo">--}}

{{--</div>--}}
{{--<div class="hidden-xs conteudoPromo">--}}
        {{--<span class="fecharPromo">--}}
          {{--x--}}
        {{--</span>--}}

    {{--<div>--}}
        {{--<a href="http://www.isonhei.com.br/mes-criancas-isonhei">--}}
            {{--{{HTML::image('portal/images/modal-promo/promo.jpg')}}--}}
        {{--</a>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- Fim Modal Promoção -->

<!-- wrapper start -->
<div class="wrapper">
    <!-- header toolbar start -->
    {{--@include('portal.layouts.header_toolbar')--}}
    <!-- header toolbar end -->

    <!-- sticky header start -->
    <div class="sticky-header">
        <!-- header start -->
        @include('portal.layouts.header')
        <!-- header end -->
        <!-- nav and search start -->
        <div class="nav-search-outer">
            <!-- nav start -->
            @include('portal.layouts.menu')

            <!--nav end-->
        </div>
        <!-- nav and search end-->
    </div>
    <!-- sticky header end -->
    <!-- top sec start -->

    @yield('conteudo')

    <!-- data end -->

    <!-- Footer start -->
    @include('portal.layouts.footer')
    {{--@yield('footer')--}}
    <!-- Footer end -->
    @include('portal.layouts.register')
    {{-- login --}}
    @include('portal.layouts.login')
    <!-- disparo de email caso o usuário perder -->
    @include('portal.layouts.verificar_ativacao')

    {{-- lembrar Senha --}}
    @include('portal.layouts.forgot')
    {{--@yield('log-in')--}}
    {{--@include('portal.layouts.forgot-confirm')--}}

</div>
<!-- Painel Interno Usuario Fidelidade-->
<!-- jQuery -->
<script src="{{ asset('/portal/js/jquery.min.js') }}"></script>
<!--jQuery eaportal/sing-->
<script src="{{ asset('/portal/js/jquery.easing.1.3.js') }}"></script>
<!-- bootstraportal/b js -->
<script src="{{ asset('/portal/js/bootstrap.js') }}"></script>
<!--style swiportal/tcher-->
<script src="{{ asset('/portal/js/style-switcher.js') }}"></script>
<!--wow animation-->
<script src="{{ asset('/portal/js/wow.min.js') }}"></script>
<!-- time andportal/ date -->
<script src="{{ asset('/portal/js/moment.min.js') }}"></script>
<!--news tickportal/er-->
<script src="{{ asset('/portal/js/jquery.ticker.js') }}"></script>
<!-- owl caroportal/usel -->
<script src="{{ asset('/portal/js/owl.carousel.js') }}"></script>
<!-- magnificportal/ popup -->
<script src="{{ asset('/portal/js/jquery.magnific-popup.js') }}"></script>
<!-- weather portal/-->
{{--<script src="portal/js/jquery.simpleWeather.min.js') }}"></script>--}}
<!-- calendarportal/-->
<script src="{{ asset('/portal/js/jquery.pickmeup.js') }}"></script>
<!-- go to toportal/p -->
<script src="{{ asset('/portal/js/jquery.scrollUp.js') }}"></script>
<!-- scroll bportal/ar -->
<script src="{{ asset('/portal/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('/portal/js/jquery.nicescroll.plus.js') }}"></script>
<!--masonry--portal/>
<script src="portal/js/masonry.pkgd.js"></script>
<!--media queportal/ries to js-->
<script src="{{ asset('/portal/js/masonry.pkgd.js') }}"></script>
<script src="{{ asset('/portal/js/enquire.js') }}"></script>

<!--data-->
<script src="{{ asset('/portal/js/jquery-mask/jquery.mask.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('/portal/js/jquery.maskMoney.js') }}"></script>

<!--custom geral-->
<script src="{{ asset('/portal/js/custom/custom.js') }}"></script>

<!--custom fuportal/nctions-->
<script src="{{ asset('/portal/js/custom-fun.js') }}"></script>

<!-- js para carregamento de videos da home -->
{{--<script src="{{ asset('/portal/js/video.home.js') }}"></script>--}}

<!-- Modal promo -->
{{--<script src="{{asset('/assets/js/modalPromo.js')}}"></script>--}}
<!-- Fim do modal promo -->


@yield('footer_scripts')

<script language="JavaScript">
    $('.open-popup-link').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#email'
    });

    $(document).ready(function () {
        $(".row #circularG").hide(),
                $("form#ajaxform").submit(function () {
                    $("#circularG").show();
                    var formID = $(this).attr('id');
                    var formDetails = $('#' + formID);
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'post',
                        cache: true,
//              dataType: 'json',
                        data: formDetails.serialize(),
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val() // pegar o token do formulario
                        },

                        beforeSend: function () {
                            console.log('Send before the request');
                            $("#validation-errors").hide().empty();


                        },
                        success: function (data) {
                            console.log(data);

                            // pega o redirect do formulario
//                    function(data) {
//                        if (data.redirect) {
//                            // data.redirect contains the string URL to redirect to
//                            window.location.href = data.redirect;
//                        }
//                    }
                            if (data.success == true) {
                                $("#circularG").hide();
                                $("#notification").append('<div class="alert alert-success"><strong>' + data[0] + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><div>');
                                $.magnificPopup.close();
                                document.getElementById("ajaxform").reset();


                            } else if (data.success == false) {

                                var arr = data.errors;
                                $.each(arr, function (index, value) {
                                    if (value.length != 0) {

                                        $("#" + index + "-errors").append('<div class="alert-register alert-error"><strong style="font-size: xx-small;color: #ff0000">' + value + '</strong><div>');
                                        $("#" + index + "-errors").slideDown();
                                        $("#circularG").hide();

                                    }
                                    $("form#ajaxform").submit(function () {
                                        $("#" + index + "-errors").hide('<div class="alert-register alert-error"><strong>' + value + '</strong><div>').empty();

                                    });

                                });
                                $("#validation-errors").show();
                            } else if ($("form[name='ajax']")) {
                                if (data.exponoivas == true) {
                                    window.location.href = "/painel/expo-noivas";
                                } else {
                                    setTimeout(function () {
                                        //window.location.href = data.redirect;
                                        window.location.reload();
                                    }, 600);
                                }

                            }
                        },
                        error: function (xhr, textStatus, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                        }
                    });
                    return false;
                });
    });


</script>

@if( Session::has('login'))
    <script>
        jQuery(window).load(function () {
            jQuery.magnificPopup.open({
                items: {src: '#log-in'}, type: 'inline'
            }, 0);
        });
    </script>
@endif

@if( Session::has('create-account'))
    <script>
        jQuery(window).load(function () {
            jQuery.magnificPopup.open({
                items: {src: '#create-account'}, type: 'inline'
            }, 0);
        });
    </script>
@endif
@if( Session::has('ativar'))
    <script>
        jQuery(window).load(function () {
            jQuery.magnificPopup.open({
                items: {src: '#ativar'}, type: 'inline'
            }, 0);
        });
    </script>
@endif
@if( Sentry::check())
    <script>
        $(document).ready(function () {
            $('#cadastro').hide();
        });
    </script>
@endif

</body>
</html>