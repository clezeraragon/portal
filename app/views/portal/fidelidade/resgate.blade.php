
{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{ $data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('/portal/css/custom-fidelidade.css') }}" rel="stylesheet">

@stop

{{-- Page content --}}
@section('conteudo')

<!-- conteudo Start -->
<div class="container">

    @include('notifications')

    <!-- header Start -->
    <div class="container">
        <div class="page-header">
            <h1>{{ $data['title_pag']}}</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{Route('isonhei-club-loja')}}"> <span style="text-transform:lowercase !important;">i</span>Sonhei Store</a></li>
                <li class="active">Dados do Resgate</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data start -->
    <section>
        <div class="container ">
            <div class="row ">
                <!-- left sec start -->
                <div class="col-md-11 col-sm-11 col-xs-16 fid-box-resgate">
                    <div class="row">
                        <div class="col-md-11 col-sm-11 col-xs-11 fid-resgate-produto-box">
                            <h4 class="fid-resgate-header-produto">
                                PRODUTO
                            </h4>
                            <div class="fid-resgate-produto-img">
                                {{HTML::image($produto->path_img,'',array('class'=>'fid-resgate-produto-img'))}}
                            </div>
                            <div class="col-sm-10 col-xs-9 fid-resgate-produto-dados">
                                <h4>{{$produto->nome}}</h4>

                                <p class="hidden-xs">Produto oferecido e entregue por <strong><span class="color-red">{{$produto->fornecedor}}</span></strong></p>

                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 fid-resgate-pontos-box">
                            <h4 class="fid-resgate-header-produto">
                                PONTOS
                            </h4>
                            <div class="fid-resgate-pontos">
                                <div class="fid-resgate-pontos-de">
                                    @if($produto->de_pontos)
                                        De <strike><strong><span class="color-black">{{ number_format($produto->de_pontos, 0 , '','.') }}</span></strong></strike> por
                                    @endif
                                </div>
                                <div class="">
                                    <strong><span class="color-red fid-resgate-pontos-por">{{ number_format($produto->por_pontos, 0 , '','.') }}</span></strong>
                                    <strong><span class="color-black">pontos</span></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-16">

                            {{ Form::open(array('url' => Route('post-isonhei-club-resgate'))) }}
                            <fieldset>
                                <legend class="dados-entrega"><h4>DADOS PARA ENTREGA</h4></legend>
                                <legend class="confirme-dados-entrega hide-element" ><h4 class="color-red">CONFIRME SEUS DADOS PARA ENTREGA E VALOR DO FRETE</h4></legend>

                                {{ Form::hidden('produto_id', Input::old('produto_id', $produto->id), array('id' => 'produto')) }}
                                {{ Form::hidden('frete', Input::old('frete'), array('id' => 'frete')) }}

                                <!-- Text input-->
                                <div class="form-group col-md-8 {{ $errors->first('nome', 'has-error') }}">
                                    <div class="">
                                        {{ Form::text('nome', Input::old('nome'), array('id' => 'nome', 'placeholder' => 'Nome', 'class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group col-md-4 {{ $errors->first('telefone', 'has-error') }}">
                                    <div class="">
                                        {{ Form::text('telefone', Input::old('telefone'), array('id' => 'phone', 'placeholder' => 'Tel: (99) 999999999', 'maxlength' => '15','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('telefone', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group col-md-4 {{ $errors->first('cep', 'has-error') }}">
                                    <div class="">
                                        {{ Form::text('cep', Input::old('cep'), array('id' => 'cep', 'placeholder' => 'CEP','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('cep', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group col-md-12 {{ $errors->first('endereco', 'has-error') }}">
                                    <div class="">
                                        {{ Form::text('endereco', Input::old('endereco'), array('id' => 'endereco', 'placeholder' => 'Endereço','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('endereco', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group col-md-4 {{ $errors->first('numero', 'has-error') }}">
                                    <div class="">
                                        {{ Form::text('numero', Input::old('numero'), array('id' => 'numero', 'placeholder' => 'Número','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('numero', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group col-md-8 {{ $errors->first('complemento', 'has-error') }}">
                                    <div class="">
                                        {{ Form::text('complemento', Input::old('complemento'), array('id' => 'complemento', 'placeholder' => 'Complemento','class' => 'form-control input-md')) }}
                                        {{ $errors->first('complemento', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group col-md-4 {{ $errors->first('cidade', 'has-error') }}">
                                    <div class="">
                                        {{ Form::text('cidade', Input::old('cidade'), array('id' => 'cidade', 'placeholder' => 'Cidade','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('cidade', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group col-md-4 {{ $errors->first('estado', 'has-error') }}">
                                    <div class="">
                                        {{ Form::text('estado', Input::old('estado'), array('id' => 'estado', 'placeholder' => 'Estado','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('estado', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <div class="col-md-16" id="cep-erro">

                                </div>

                                <div class="col-md-16" id="procedimento-resgate" style="display: none;">

                                    <div class="frete"></div>
                                    <br>
                                    <h4>Procedimento de Resgate</h4>
                                    <ul>
                                        <li>O prazo de entrega é de até 30 dias corridos a partir da data do resgate, de acordo com a disponibilidade.</li>
                                        <li>O envio do produto será feito via Sedex a cobrar e a taxa de envio será de responsabilidade do usuário.</li>
                                        <li>Acompanhe em resgates no seu painel de usuário, o andamento do seu pedido.</li>
                                        <li>É de responsabilidade dos usuários em fornecer os dados corretamente para entrega do produto.</li>
                                        <li>Em caso de dúvida consulte as regras do <strong>iSonhei Club</strong> ou entre em contato.</li>
                                    </ul>

                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="regate-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Confirmação de Resgate</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Para resgatar o produto selecionado os pontos serão subtraídos do seu saldo.</p>
                                            </div>
                                            <div class="modal-footer">
                                                {{ Form::submit('Confirmar', array( 'class' => 'btn  btn-primary')) }}
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->

                                <!-- Button -->
                                <div class="form-group">
                                    <div class="col-md-16" align="right">

                                        <span id="confirmar" class='btn btn-lg btn-primary btn-resgate'>Confirmar</span>
                                        <span id="alterar" class='btn btn-lg btn-primary btn-resgate' style="display: none;">Alterar os Dados</span>
                                        <span id="finalizar" class='btn btn-lg btn-primary btn-resgate'data-toggle="modal" data-target="#regate-modal" style="display: none;">Finalizar Pedido</span>


                                    </div>
                                </div>

                            </fieldset>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <!-- left sec end -->

                <!-- right sec start -->
                @include("elements.menu-lateral.dinamico.banner-dinamico-sonhador")
                {{--<div class="col-sm-5 hidden-xs right-sec">--}}
                    {{--<div class="bordered">--}}
                        {{--<div class="row ">--}}
                            {{--<div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="150">--}}
                                {{--<div class="table-responsive">--}}
                                {{--Menu Lateral--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!-- data end -->
</div>
<!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script>

        $("#cep").change(function(){

            var cep = $("#cep").val();
            $.get( "{{ URL::route("correio-cep") }}/" + cep, function(data){

                if(data["cidade"] || data["logradouro"])
                {
                    $("#endereco").val(data["logradouro"]);
                    $("#cidade").val(data["cidade"]);
                    $("#estado").val(data["uf"]);
                    $("#cep-erro").hide();
                }
                else {
                    $("#endereco").val("");
                    $("#cidade").val("");
                    $("#estado").val("");
                    $("#cep-erro").html( "<h4 class='color-red'>CEP não encontrado.</h4>" );
                    $("#cep-erro").show();
                }
            });

        });


        $("#confirmar").click(function()
        {
            if(!$("#nome").val()){ $("#nome").focus(); return false; }
            if(!$("#endereco").val()){ $("#endereco").focus(); return false; }
            if(!$("#numero").val()){ $("#numero").focus(); return false; }
            if(!$("#cep").val()){ $("#cep").focus(); return false; }
            if(!$("#cidade").val()){ $("#cidade").focus(); return false; }
            if(!$("#estado").val()){ $("#estado").focus(); return false; }
            if(!$("#phone").val()){ $("#phone").focus(); return false; }

            var cep = $("#cep").val();
            var produto = $("#produto").val();

            $.get( "{{ URL::route("correio-frete") }}/" + cep + "/" + produto  , function(data){

                $(".frete").html( "<h4 class='color-red'>VALOR DO FRETE R$ " + data + "</h4>" );
                $("#frete").val(data);

            });

            $(".dados-entrega").hide();
            $(".confirme-dados-entrega").show();

            $("#nome").attr("readonly", "readonly");
            $("#endereco").attr("readonly", "readonly");
            $("#numero").attr("readonly", "readonly");
            $("#complemento").attr("readonly", "readonly");
            $("#cep").attr("readonly", "readonly");
            $("#cidade").attr("readonly", "readonly");
            $("#estado").attr("readonly", "readonly");
            $("#phone").attr("readonly", "readonly");

            $("#alterar").show();
            $("#procedimento-resgate").show();
            $("#finalizar").show();
            $("#confirmar").hide();

        });

        $("#alterar").click(function(){

            $(".dados-entrega").show();
            $(".confirme-dados-entrega").hide();

            $("#nome").removeAttr("readonly");
            $("#endereco").removeAttr("readonly");
            $("#numero").removeAttr("readonly");
            $("#complemento").removeAttr("readonly");
            $("#cep").removeAttr("readonly");
            $("#cidade").removeAttr("readonly");
            $("#estado").removeAttr("readonly");
            $("#phone").removeAttr("readonly");

            $("#procedimento-resgate").hide();
            $("#alterar").hide();
            $("#finalizar").hide();
            $("#confirmar").show();
        });

    </script>

@stop




