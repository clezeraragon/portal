<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>

    <style>
        body{
            font-family: 'Open Sans', sans-serif;
            color: #8d9aa5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .container{
            /*margin-left: 90px;*/
            margin:0 auto;
            display: block;
            width: 685px;
            height: 350px;
            margin-top: 170px;
            background-image: url("/portal/images/promocao/cupom-shop-club-guarulhos.jpg");
            background-repeat:no-repeat;

        }
        .img{
            width: 750px;
            height
        }
        #nome{
            margin-left: 135px;
            margin-top: 226px !important;
            width: 350px;
        }
        #cpf{
            margin-left: 135px;
            margin-top: 5px !important;
            width: 350px;
        }
        #email{
            margin-left: 135px;
            margin-top: 5px !important;
            width: 350px;
        }
        #telefone{
            margin-left: 135px;
            margin-top: 5px !important;
            width: 350px;
        }
    </style>
</head>
<body>

<div class="container">

    <div id="nome">{{Sentry::getUser()->first_name . " " . Sentry::getUser()->last_name}}</div>
    <div id="cpf">{{Sentry::getUser()->cpf }}</div>
    <div id="email">{{Sentry::getUser()->email }}</div>
    <div id="telefone">{{Sentry::getUser()->telefone }}</div>

</div>

</body>
</html>