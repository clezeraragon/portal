
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
                        Gerenciar {{$data['title']}}
                    </div>
                </div>
                <div class="portlet-body">
	                {{ Form::open(array('url' => Route('post-cadastra-estoque'), 'method' => 'post', 'class' => 'form-horizontal')) }}
                        <fieldset>

                            <!-- Select Basic -->
                            <div class="form-group {{ $errors->first('produto_id', 'has-error') }} ">
                                {{ Form::label('produto_id', '* Produto', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('produto_id', Produto::combobox(), Input::old('produto_id', $produto_id), array('class' => 'form-control', 'disabled' => 'disabled')) }}
                                    {{ Form::hidden('produto_id', Input::old('produto_id', $produto_id), array()) }}
                                    {{ $errors->first('produto_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Multiple Radios (inline) -->
                            <div class="form-group {{ $errors->first('tipo', 'has-error') }} ">
                                {{ Form::label('tipo', '* Tipo de lançamento', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    <label class="radio-inline" for="radios-0">
                                        <input type="radio" name="tipo"  value="entrada" required>
                                        Entrada
                                    </label>
                                    <label class="radio-inline" for="radios-1">
                                        <input type="radio" name="tipo" value="saida" required>
                                        Saída
                                    </label>
                                    {{ $errors->first('status', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('quantidade', 'has-error') }}">
                                {{ Form::label('quantidade', '* Quantidade', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('quantidade', Input::old('quantidade'), array('placeholder' => 'Quantidade', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('quantidade', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                                {{ Form::label('descricao', 'Observação', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::textarea('descricao', Input::old('descricao'), array('placeholder' => 'Observação', 'class' => 'form-control', 'size' => '30x4', 'maxlength' => '180')) }}
                                    {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                           <!-- Button -->
                           <div class="form-group">
                             <label class="col-md-3 control-label" for="cadastrar"></label>
                             <div class="col-md-7">
                               {{ Form::submit('Lançar', array('class' => 'btn btn-success')) }}
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

<script type="text/javascript" src="{{ asset('assets/js/jquery.maskMoney.js') }}"></script>

<script>
    $(function() {
        $("#money1").maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    })
</script>

@stop