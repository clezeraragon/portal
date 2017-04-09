
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
                            <div class="form-group {{ $errors->first('acao_id', 'has-error') }} ">
                                {{ Form::label('acao_id', '* Ação', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('acao_id', FidelidadeAcao::combobox(), Input::old('acao_id', $rs->acao_id), array('class' => 'form-control')) }}
                                    {{ $errors->first('acao_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('codigo', 'has-error') }}">
                                {{ Form::label('codigo', '* Código', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('codigo', Input::old('codigo', $rs->codigo), array('placeholder' => 'Limite de 45 caracteres', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('codigo', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('dsc_codigo', 'has-error') }}">
                                {{ Form::label('dsc_codigo', '* Descrição', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('dsc_codigo', Input::old('dsc_codigo', $rs->dsc_codigo), array('placeholder' => 'Descrição do código', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('dsc_codigo', '<span class="text-danger">:message</span>') }}
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

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('quantidade', 'has-error') }}">
                                {{ Form::label('quantidade', '* Quantidade', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('quantidade', Input::old('quantidade', $rs->quantidade), array('placeholder' => 'Quantas vezes este código poderá ser utilizado?', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('quantidade', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Multiple Radios (inline) -->
                            <div class="form-group {{ $errors->first('st_usado', 'has-error') }} ">
                                {{ Form::label('status', '* Status de Uso', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    <label class="radio-inline" for="radios-0">
                                        <input type="radio" name="st_usado"  value="1" @if($rs->st_usado == "1") checked="checked" @endif>
                                        Usado
                                    </label>
                                    <label class="radio-inline" for="radios-1">
                                        <input type="radio" name="st_usado" value="0" @if($rs->st_usado == "0") checked="checked" @endif>
                                        Pendente
                                    </label>
                                    {{ $errors->first('st_usado', '<span class="text-danger">:message</span>') }}
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

    <script src="{{ asset('/portal/js/jquery-mask/jquery.mask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/js/custom/custom.js') }}" type="text/javascript"></script>

@stop