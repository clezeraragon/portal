
{{-- Page title --}}
@section('title')
{{$data['title']}}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<!--end of page level css-->
<!-- Input com busca -->
<link href="{{ asset('assets/vendors/select2/select2.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2-bootstrap.css') }}"/>
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet"/>
<!-- fim busca -->
@stop

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::to($data['route']) }}" class="btn btn-info navbar-right btn_voltar"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>

            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        Editar {{$data['title']}}
                    </div>
                </div>
                <div class="portlet-body">
	                {{ Form::open(array('url' => $data['route'] . '/' . $rs->id, 'method' => 'put', 'class' => 'form-horizontal', 'files' => true)) }}
                        <fieldset>

                            <!-- Select Basic -->
                            <div class="form-group {{ $errors->first('cliente_id', 'has-error') }} ">
                                {{ Form::label('cliente_id', '* Cliente', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('cliente_id', Cliente::combobox(), Input::old('cliente_id', $rs->cliente_id), array('class' => 'form-control select2','id' => 'clientes')) }}
                                    {{ $errors->first('cliente_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group {{ $errors->first('guia_empresa_id', 'has-error') }} ">
                                {{ Form::label('guia_empresa_id', 'Anúncios', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('guia_empresa_id', $anuncios, Input::old('guia_empresa_id', $rs->guia_empresa_id), array('class' => 'form-control','id'=>'anuncios')) }}
                                    {{ $errors->first('guia_empresa_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('titulo', 'has-error') }}">
                                {{ Form::label('titulo', '* Título', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('titulo', Input::old('titulo', $rs->titulo), array('placeholder' => 'Título do cupom', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('titulo', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('voucher', 'has-error') }}">
                                {{ Form::label('voucher', '* Voucher', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('voucher', Input::old('voucher', $rs->voucher), array('placeholder' => 'Voucher de desconto', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('voucher', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                                {{ Form::label('descricao', '* Descrição', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::textarea('descricao', Input::old('descricao', $rs->descricao), array('placeholder' => 'Descrição do produto/serviço', 'class' => 'form-control', 'required', 'size' => '30x2')) }}
                                    {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group {{ $errors->first('regras', 'has-error') }}">
                                {{ Form::label('regras', '* Regras', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::textarea('regras', Input::old('regras', $rs->regras), array('placeholder' => 'Regras de uso do voucher', 'class' => 'form-control', 'required', 'size' => '30x2')) }}
                                    {{ $errors->first('regras', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- File Button -->
                            <div class="form-group {{ $errors->first('path_img', 'has-error') }}">
                                <label class="col-md-3 control-label" for="filebutton">Imagem</label>
                                <div class="col-md-7">
                                    @if($rs->path_img)
                                        <img src="{{ asset($rs->path_img) }}" width="200">
                                        <br><br>
                                    @endif
                                    {{ Form::file('path_img', ['class' => '', '', 'id' => 'path_img']) }}
                                    {{ $errors->first('path_img', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('quantidade', 'has-error') }}">
                                {{ Form::label('quantidade', '* Quantidade', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('quantidade', Input::old('quantidade', $rs->quantidade), array('placeholder' => 'Quantos usuários podem solicitar este voucher?', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('quantidade', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('dt_ini', 'has-error') }}">
                                {{ Form::label('dt_ini', '* Validade de', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('dt_ini', Input::old('dt_ini', Util::toView($rs->dt_ini)), array('placeholder' => '', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('dt_ini', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('dt_fim', 'has-error') }}">
                                {{ Form::label('dt_fim', '* Validade até', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('dt_fim', Input::old('dt_fim', Util::toView($rs->dt_fim)), array('placeholder' => '', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('dt_fim', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Multiple Radios (inline) -->
                            <div class="form-group {{ $errors->first('status', 'has-error') }} ">
                                {{ Form::label('status', '* Status', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    <label class="radio-inline" for="radios-0">
                                        <input type="radio" name="status"  value="1" @if($rs->status == "1") checked="checked" @endif>
                                        Ativo
                                    </label>
                                    <label class="radio-inline" for="radios-1">
                                        <input type="radio" name="status" value="0" @if($rs->status == "0") checked="checked" @endif>
                                        Inativo
                                    </label>
                                    {{ $errors->first('status', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                           <!-- Button -->
                           <div class="form-group">
                             <label class="col-md-3 control-label" for="cadastrar"></label>
                             <div class="col-md-7">
                               {{ Form::submit('Salvar', array('class' => 'btn btn-success')) }}
                             </div>
                           </div>

                        </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script>

        $('#clientes').change(function () {

            var param = $(this).val();

            $.get('/admin/cupom/get-anuncio-cliente/' + param, function (anuncios) {
                $('select[name=guia_empresa_id]').empty();
                $('select[name=guia_empresa_id]').append(anuncios);
            });

        });

    </script>


    <script src="{{ asset('/portal/js/jquery-mask/jquery.mask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/js/custom/custom.js') }}" type="text/javascript"></script>

    <!-- script de busca -->
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}" type="text/javascript"></script>
    <!-- fim de busca -->



@stop