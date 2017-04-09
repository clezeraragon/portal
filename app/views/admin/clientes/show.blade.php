{{-- Page title --}}
@section('title')
    {{$data['title']}}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <!--page level css -->
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of page level css-->
    <!-- daterange picker -->
    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
    <!--select css-->
    <link href="{{ asset('assets/vendors/select2/select2.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2-bootstrap.css') }}" />
    <!--clock face css-->
    <link href="{{ asset('assets/vendors/iCheck/skins/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/alertmessage.css') }}" rel="stylesheet" />

@stop

{{-- Page content --}}
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <a href="{{ URL::to($data['route']) }}" class="btn btn-info navbar-right  btn_voltar"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a><hr>
        <div class="portlet box primary">
            <div class="portlet-title">
                <div class="caption"> <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    {{$data['title']}}
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-4" style="">
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('ID')}}</dt>
                                <dd>{{isset($cliente->id) ? $cliente->id :""}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Razão Social')}}</dt>
                                <dd>{{isset($cliente->nm_razao_social) ? $cliente->nm_razao_social :""}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Nome Fantasia')}}</dt>
                                <dd>{{isset($cliente->nm_nome_fantasia) ? $cliente->nm_nome_fantasia :""}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('URL')}}</dt>
                                <dd>{{isset($cliente->url) ? $cliente->url :""}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('CNPJ')}}</dt>
                                <dd>{{isset($cliente->nm_cnpj) ? $cliente->nm_cnpj :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('CPF')}}</dt>
                                <dd>{{isset($cliente->nm_cpf) ? $cliente->nm_cpf :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Responsável')}}</dt>
                                <dd>{{isset($cliente->nm_responsavel) ? $cliente->nm_responsavel :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('E-mail Responsável')}}</dt>
                                <dd>{{isset($cliente->nm_email_responsavel) ? $cliente->nm_email_responsavel :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('E-mail Administrativo')}}</dt>
                                <dd>{{isset($cliente->nm_email_administrativo) ? $cliente->nm_email_administrativo :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Telefone 1')}}</dt>
                                <dd>{{isset($cliente->nm_telefone1) ? $cliente->nm_telefone1 :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Telefone 2')}}</dt>
                                <dd>{{isset($cliente->nm_telefone2) ? $cliente->nm_telefone2 :"N/D"}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4" style="">
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('CEP')}}</dt>
                                <dd>{{isset($cliente->nm_cep) ? $cliente->nm_cep :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Endereço')}}</dt>
                                <dd>{{isset($cliente->nm_endereco) ? $cliente->nm_endereco :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Número')}}</dt>
                                <dd>{{isset($cliente->nu_numero) ? $cliente->nu_numero :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Complemento')}}</dt>
                                <dd>{{isset($cliente->nm_complemento) ? $cliente->nm_complemento :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Bairro')}}</dt>
                                <dd>{{isset($cliente->nm_bairro) ? $cliente->nm_bairro :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Cidade')}}</dt>
                                <dd>{{isset($cliente->nm_cidade) ? $cliente->nm_cidade :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Estado')}}</dt>
                                <dd>{{isset($cliente->nm_uf) ? $cliente->nm_uf :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Exibir Mapa?')}}</dt>
                                <dd>{{isset($cliente->st_google_maps) ? Util::formatBoolean($cliente->st_google_maps) :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Site')}}</dt>
                                <dd>{{isset($cliente->nm_site) ? $cliente->nm_site :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Facebook')}}</dt>
                                <dd>{{isset($cliente->nm_link_facebook) ? $cliente->nm_link_facebook :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Instagram')}}</dt>
                                <dd>{{isset($cliente->nm_link_instagram) ? $cliente->nm_link_instagram :"N/D"}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4" style="">
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Twitter')}}</dt>
                                <dd>{{isset($cliente->nm_link_twitter) ? $cliente->nm_link_twitter :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Status')}}</dt>
                                <dd>{{isset($cliente->status) ? Util::formatStatus($cliente->status) :"N/D"}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Descrição')}}</dt>
                                <dd> <p>{{isset($cliente->txt_descricao) ? $cliente->txt_descricao :"N/D"}} </p></dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Data Cadastro')}}</dt>
                                <dd> <p>{{isset($cliente->created_at) ? Util::toTimestamps($cliente->created_at) :"N/D"}} </p></dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Data Última alteração')}}</dt>
                                <dd> <p>{{isset($cliente->updated_at) ? Util::toTimestamps($cliente->updated_at) :"N/D"}} </p></dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{Form::label('Logo')}}</dt>
                                <dd>
                                    @if($cliente->path_img)
                                        <p><img src="{{ asset($cliente->path_img) }}" width="200"> </p>
                                    @else
                                        <p>N/D.</p>
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2>Histórico de Contato</h2>
                            <textarea rows="10"  class ="col-md-12 col-sm-12 col-xs-12" readonly disabled id="historico">{{$mensagens}}</textarea>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="portlet-body">
                                {{ Form::open(array('url' => Route("cad-cliente-historico-contato"), 'class' => 'form-horizontal')) }}
                                <fieldset>

                                    {{ Form::hidden('cliente_id', Input::old('cliente_id', $cliente_id), array()) }}

                                    <!-- Textarea -->
                                    <div class="form-group {{ $errors->first('mensagem', 'has-error') }}">
{{--                                        {{ Form::label('mensagem', '* Mensagem', array('class' => 'col-md-3 control-label')) }}--}}
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{ Form::textarea('mensagem', Input::old('mensagem'), array('placeholder' => 'Deixe aqui, sua mensagem com o cliente', 'class' => 'form-control', 'required', 'size' => '30x3', 'id' => '')) }}
                                            {{ $errors->first('mensagem', '<span class="text-danger">:message</span>') }}
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        {{--<label class="col-md-3 control-label" for="cadastrar"></label>--}}
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{ Form::submit('Salvar', array('class' => 'btn btn-success')) }}
                                        </div>
                                    </div>

                                </fieldset>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->

        </div>
    </div>
</div>
</section>

@stop

@section('footer_scripts')

    <script>
        $(document).ready(function(){
            $('#historico').scrollTop($('#historico')[0].scrollHeight);
        });
    </script>
    <!-- begining of page level js -->
    <!-- InputMask -->
    <script src="{{ asset('assets/js/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
    {{--<script src="{{ asset('assets/js/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>--}}
    {{--<script src="{{ asset('assets/js/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('assets/js/custom/custom.js') }}"></script>

@stop

