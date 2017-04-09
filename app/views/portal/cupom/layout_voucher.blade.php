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
            width:1000px;
            height:437px;
        }
        .coluna-1{
            float:left;
            width:74px;
            background:;
        }
        .coluna-2{
            text-align: center;
            float:left;
            width:280px;
            background:;
            margin-top: 25px;
        }
        .coluna-3{
            float:left;
            width:646px;
            background:;
        }
        .img-logo-cliente{
            width: 230px;
            border:1px solid #8d9aa5;
            /*padding: 25px;*/
        }
        .coluna-3-ln1{
            height: 307px;
        }
        .coluna-3-ln2{
            width:646px;
            height:130px;
            background:;
        }
        .dados_rodape{
            float:left;
            width:400px;
            height:130px;
            background:;
        }
        .box-logo-isonhei{
            text-align: center;
            float:right;
            background:;
            width:246px;
            height:130px;
        }
        .img-logo-isonhei{
            width:180px;
        }

        h3 {
            font-size: 20px;
            color: #3d566e;
            font-weight: bold;
            /*margin-top: 10px;*/
            margin-bottom: 10px;
        }
        p {
            color: #8d9aa5;
        }


    </style>
</head>
<body>

<div class="container">
    <div class="coluna-1">
        {{HTML::image("/portal/images/cupom/voucher/lateral-cupom.jpg",'',array(''=>''))}}
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
            </div>
        </div>
    </div>


</div>

</body>
</html>