
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
                            <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                                {{ Form::label('nome', '* Nome', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('nome', Input::old('nome', $rs->nome), array('placeholder' => 'Nome do plano', 'class' => 'form-control input-md', 'required', 'id' => 'nome_produto')) }}
                                    {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('url', 'has-error') }}">
                                {{ Form::label('url', '* URL', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('url', Input::old('url', $rs->url), array('placeholder' => 'url-seguindo-o-padrao', 'class' => 'form-control input-md', 'required', 'id' => 'url', 'disabled' => 'disabled')) }}
                                    {{ $errors->first('url', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                                {{ Form::label('descricao', '* Descrição', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::textarea('descricao', Input::old('descricao', $rs->descricao), array('placeholder' => 'Descrição', 'class' => 'form-control', 'required', 'size' => '30x2')) }}
                                    {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group {{ $errors->first('fornecedor_id', 'has-error') }} ">
                                {{ Form::label('fornecedor_id', '* Fornecedor', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('fornecedor_id', ProdutoFornecedor::combobox(), Input::old('fornecedor_id', $rs->fornecedor_id), array('class' => 'form-control')) }}
                                    {{ $errors->first('fornecedor_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group {{ $errors->first('produto_tipo_id', 'has-error') }} ">
                                {{ Form::label('produto_tipo_id', '* Tipo de Produto', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('produto_tipo_id', ProdutoTipo::combobox(), Input::old('produto_tipo_id', $rs->produto_tipo_id), array('id' => 'tipo_produto', 'class' => 'form-control', '')) }}
                                    {{ $errors->first('produto_tipo_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <div id="path_arquivo" @if($rs->produto_tipo_id == 1) {{ 'style="display:none;"'}} @endif>
                                <!-- Select Basic -->
                                <div class="form-group {{ $errors->first('path_arquivo', 'has-error') }}">
                                    {{ Form::label('path_arquivo', 'Arquivo Digital', array('class' => 'control-label col-md-3')) }}
                                    <div class="col-md-7">
                                        {{ Form::file('path_arquivo', ['class' => '', 'id' => 'input_path_arquivo']) }}
                                        {{ $errors->first('path_arquivo', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('valor', 'has-error') }}">
                                {{ Form::label('valor', '* Valor', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('valor', Input::old('valor', Util::number($rs->valor, 2)), array('placeholder' => '0,00', 'class' => 'form-control input-md', 'id' => 'money1', 'required')) }}
                                    {{ $errors->first('valor', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('de_pontos', 'has-error') }}">
                                {{ Form::label('de_pontos', 'De Pontos', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('de_pontos', Input::old('de_pontos', $rs->de_pontos), array('placeholder' => 'De pontos', 'class' => 'form-control input-md')) }}
                                    {{ $errors->first('de_pontos', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('por_pontos', 'has-error') }}">
                                {{ Form::label('por_pontos', '* Por Pontos', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('por_pontos', Input::old('por_pontos', $rs->por_pontos), array('placeholder' => 'Por pontos', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('por_pontos', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- File Button -->
                            <div class="form-group {{ $errors->first('path_img', 'has-error') }}">
                                <label class="col-md-3 control-label" for="filebutton">* Imagem</label>
                                <div class="col-md-7">
                                    <img src="{{ asset($rs->path_img) }}" width="200">
                                    <br><br>
                                    {{ Form::file('path_img', ['class' => '', 'id' => 'path_img']) }}
                                    {{ $errors->first('path_img', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('peso', 'has-error') }}">
                                {{ Form::label('peso', '* Peso do Produto', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('peso', Input::old('peso', $rs->peso), array('placeholder' => 'Peso', 'class' => 'form-control input-md', 'required')) }}
                                    <p>O peso deve ser informado em quilogramas</p>
                                    {{ $errors->first('peso', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('comprimento', 'has-error') }}">
                                {{ Form::label('comprimento', '* Comprimento (cm)', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('comprimento', Input::old('comprimento', $rs->comprimento), array('placeholder' => 'Comprimento do produto em (cm)', 'class' => 'form-control input-md')) }}
                                    <p>Mínimo de 16 cm</p>
                                    {{ $errors->first('comprimento', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('altura', 'has-error') }}">
                                {{ Form::label('altura', '* Altura (cm)', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('altura', Input::old('altura', $rs->altura), array('placeholder' => 'Altura do produto em (cm)', 'class' => 'form-control input-md')) }}
                                    <p>Mínimo de 2 cm</p>
                                    {{ $errors->first('altura', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('largura', 'has-error') }}">
                                {{ Form::label('largura', '* Largura (cm)', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('largura', Input::old('largura', $rs->largura), array('placeholder' => 'Largura do produto em (cm)', 'class' => 'form-control input-md')) }}
                                    <p>Mínimo de 11 cm</p>
                                    {{ $errors->first('largura', '<span class="text-danger">:message</span>') }}
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

<script type="text/javascript" src="{{ asset('assets/js/jquery.maskMoney.js') }}"></script>

<script>
    $(function() {
        $("#money1").maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    })

    /**
     * Habilitar e Desabilitar campo upload do arquivo digital
     */
    $(function () {
        $("#tipo_produto").change(function () {

            var param = $(this).val();

            if(param == 2)//2 = Digital
            {
                $('#input_path_arquivo').attr('required', true);
                $('#path_arquivo').show();
            }
            else{
                $('#input_path_arquivo').removeAttr('required');
                $('#path_arquivo').hide();
            }
        });
    });

</script>

@stop