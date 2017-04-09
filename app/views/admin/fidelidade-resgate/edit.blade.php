
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

                            <!-- Text input-->
                            <div class="form-group">
                                {{ Form::label('', 'Nome', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('', Input::old('', $rs->nome), array('readonly' => 'readonly' , 'class' => 'form-control input-md')) }}
                                    {{ $errors->first('', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                {{ Form::label('', 'Endereço', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('', Input::old('', $rs->endereco), array('readonly' => 'readonly' , 'class' => 'form-control input-md')) }}
                                    {{ $errors->first('', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                {{ Form::label('', 'Número', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('', Input::old('', $rs->numero), array('readonly' => 'readonly' , 'class' => 'form-control input-md')) }}
                                    {{ $errors->first('', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                {{ Form::label('', 'Complemento', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('', Input::old('', $rs->complemento), array('readonly' => 'readonly' , 'class' => 'form-control input-md')) }}
                                    {{ $errors->first('', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                {{ Form::label('', 'Cep', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('', Input::old('', $rs->cep), array('readonly' => 'readonly' , 'class' => 'form-control input-md')) }}
                                    {{ $errors->first('', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                {{ Form::label('', 'Cidade', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('', Input::old('', $rs->cidade), array('readonly' => 'readonly' , 'class' => 'form-control input-md')) }}
                                    {{ $errors->first('', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                {{ Form::label('', 'Estado', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('', Input::old('', $rs->estado), array('readonly' => 'readonly' , 'class' => 'form-control input-md')) }}
                                    {{ $errors->first('', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                {{ Form::label('', 'Telefone', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('', Input::old('', $rs->telefone), array('readonly' => 'readonly' , 'class' => 'form-control input-md')) }}
                                    {{ $errors->first('', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group {{ $errors->first('status_resgate_id', 'has-error') }}">
                                {{ Form::label('status_resgate_id', '* Status', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('status_resgate_id', FidelidadeStatusResgate::combobox(), Input::old('status_resgate_id', $rs->status_resgate_id), array('class' => 'form-control', 'required')) }}
                                    {{ $errors->first('status_resgate_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('frete', 'has-error') }}">
                                {{ Form::label('frete', '* Frete', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('frete', Input::old('frete', Util::number($rs->frete, 2)), array('placeholder' => '', 'class' => 'form-control input-md', 'id' => 'money1')) }}
                                    {{ $errors->first('frete', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('codigo_rastreio', 'has-error') }}">
                                {{ Form::label('codigo_rastreio', '* Código rastreio', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('codigo_rastreio', Input::old('codigo_rastreio', $rs->codigo_rastreio), array('placeholder' => '', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('codigo_rastreio', '<span class="text-danger">:message</span>') }}
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

@stop