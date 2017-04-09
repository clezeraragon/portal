@extends('sonhador/basico/layout')

{{-- page level styles --}}
@section('header_styles')

@stop

{{-- Page content --}}
@section('conteudo')

    <!--  -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Confirmação de Compra de Cota
            </h1>
        </div>
        <div class="col-lg-12">
            <p>
                Confira os dados abaixo para a compra da cota selecionada.
            </p>
            <br>
        </div>
        <div class="col-lg-12">

            <div class="checkout-box-img">
                <img class="checkout-box-img" src="{{ asset($cota->path_img)}}" >
            </div>
            <div class="checkout-box-texto">
                <p class="checkout-cota-titulo">{{$cota->produto}}</p>
                <p>Quantidade: 1</p>
                <p>Valor: R$ {{ Util::number($cota->vl_unit, 2) }}</p>
            </div>

        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <br>
        <hr>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p>
                Deixe uma mensagem para o(s) sonhador(es).
            </p>
            <br>
        </div>

        <div class="col-lg-12">

            @include('notifications')

            {{--<div class="col-lg-2"></div>--}}
            <div class="col-lg-12 box-form-recado">
                {{ Form::open(array('url' => Route("post-sonhador-pedido-cota") , 'method' => 'post',  'class' => 'form-horizontal')) }}

                {{ Form::hidden('cota_id', $cota->id , array('required')) }}

                <!-- Text input-->
                <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                    {{ Form::label('nome', '* Nome', array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-6">
                        {{ Form::text('nome', Input::old('nome'), array('placeholder' => 'Informe seu nome completo','class' => 'form-control input-md', 'required')) }}
                        {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group {{ $errors->first('email', 'has-error') }}">
                    {{ Form::label('email', '* E-mail', array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-6">
                        {{ Form::email('email', Input::old('email'), array('placeholder' => 'Informe seu e-mail correto','class' => 'form-control input-md', 'required')) }}
                        {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group {{ $errors->first('cpf', 'has-error') }}">
                    {{ Form::label('cpf', '* CPF', array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-6">
                        {{ Form::text('cpf', Input::old('cpf'), array('placeholder' => '000.000.000-00', 'id' => 'cpf', 'class' => 'form-control input-md', 'required')) }}
                        {{ $errors->first('cpf', '<span class="text-danger">:message</span>') }}
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group {{ $errors->first('mensagem', 'has-error') }}">
                    {{ Form::label('mensagem', '* Mensagem', array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-6">
                        {{ Form::textarea('mensagem', Input::old('recado'), array('placeholder' => 'Deixe uma mensagem', 'class' => 'form-control', 'required', 'size' => '30x4')) }}
                        {{ $errors->first('mensagem', '<span class="text-danger">:message</span>') }}
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="cadastrar"></label>
                    <div class="col-md-6" align="right">
                        <a href="/sonhador/{{$data['id']}}" class="btn btn-default">Cancelar</a>
                        {{ Form::submit('Confirmar Pedido', array('class' => 'btn btn-success')) }}
                    </div>
                </div>

                {{ Form::close() }}
            </div>
            {{--<div class="col-lg-2"></div>--}}
        </div>
    </div>

    <div class="row">
        <br>
        <hr>
    </div>

    <!--  -->
    <div class="row">
        <div class="col-lg-12">

            <!-- INICIO CODIGO PAGSEGURO -->
            <center>
                <a href="https://pagseguro.uol.com.br" target="_blank"><img alt="Logotipos de meios de pagamento do PagSeguro" src="https://p.simg.uol.com.br/out/pagseguro/i/banners/pagamento/todos_estatico_550_100.gif" title="Este site aceita pagamentos com Visa, MasterCard, Diners, American Express, Hipercard, Aura, Elo, PLENOCard, PersonalCard, BrasilCard, FORTBRASIL, Cabal, Mais!, Avista, Grandcard, Sorocred, Bradesco, Itaú, Banco do Brasil, Banrisul, Banco HSBC, saldo em conta PagSeguro e boleto." border="0"></a>
            </center>
            <!-- FINAL CODIGO PAGSEGURO -->

        </div>
    </div>

@stop

@section('footer_scripts')

    <script src="{{ asset('/portal/js/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            $("#cpf").inputmask("999.999.999-99");
        });

    </script>

@stop
