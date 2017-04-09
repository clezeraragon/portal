<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Confirmação Pedido | iSonhei</title>

</head>

<body>

<div class="container container-box">

</div>

<script src="{{ asset('/portal/js/jquery.min.js') }}"></script>

@if(Config::get('pagseguro.environment') == "sandbox")
    <!--Para integração em ambiente de testes no Sandbox use este link-->
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
@endif
@if(Config::get('pagseguro.environment') == "production")
    <!--Para integração em ambiente de produção use este link-->
    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
@endif

<script>

    $( document ).ready(function() {

        var code = "{{$code}}";

        PagSeguroLightbox({

            code: code
            }, {
                success: function (transactionCode) {

                    //alert("success - " + transactionCode);
                    window.location.replace("{{ URL::route("sonhador-pedido-cota-obrigado") }}/" + code + "/" + transactionCode);
                },
                abort: function () {

                    //alert("abort");
                    window.location.replace("{{ URL::route("site-do-sonhador") }}/" + "{{$site_id}}");
                }
            }
        );
    });

</script>

</body>

</html>