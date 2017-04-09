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
            border:1px solid red;
            width:100%;
            height:300px;
        }
        .img-lateral{
            height:300px;
        }
        .coluna-1{
            float:left;
            width:51px;
            background:;
        }
        .coluna-2{
            text-align: center;
            float:left;
            width:180px;
            background:;
            margin-top: 15px;
        }
        .coluna-3{
            float:left;
            width:470px;
            background:;
        }
        .img-logo-cliente{
            width: 140px;
            border:1px solid #8d9aa5;
            /*padding: 25px;*/
        }
        .coluna-3-ln1{
            height: 210px;
        }
        .coluna-3-ln2{
            height:90px;
            background:;
        }
        .dados_rodape{
            float:left;
            width:446px;
            height:130px;
            background:;
        }
        .box-logo-isonhei{
            text-align: center;
            float:right;
            background:;
            width:200px;
            height:90px;
            font-size: 11px;
        }
        .img-logo-isonhei{
            width:120px;
        }

        h3 {
            font-size: 20px;
            color: #3d566e;
            font-weight: bold;
            margin-top: 12px;
            margin-bottom: 5px;
        }
        p {
            color: #8d9aa5;
            font-size: 13px;
        }


    </style>
</head>
<body>

<div class="container">
    <div class="coluna-1">
        <img src="{{ asset("/portal/images/cupom/voucher/lateral-cupom.jpg")}}" class="img-lateral">
    </div>
    <div class="coluna-2">
        <img src="{{ asset($path_logo_cliente)}}" class="img-logo-cliente">
    </div>
    <div class="coluna-3">
        <div class="coluna-3-ln1">
            <h3>{{$cupom_titulo}}</h3>
            <p>
                {{$cupom_dsc}}
            </p>
            <p>
                <strong>Regras:</strong>
                {{$cupom_regras}}
            </p>
        </div>
        <div class="coluna-3-ln2">
            <div class="dados_rodape">
                <p><strong>CÓDIGO: </strong>{{ $cupom_voucher }}</p>
                <p><strong>VÁLIDADE ATÉ: </strong>{{ $cupom_validade }}</p>
            </div>
            <div class="box-logo-isonhei">
                <img src="{{ asset("/portal/images/general/logo-isonhei.png")}}" class="img-logo-isonhei">
                www.isonhei.com.br
            </div>
        </div>
    </div>


</div>

</body>
</html>