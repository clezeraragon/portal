
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
	                {{ Form::open(array('url' => $data['route'] . '/' . $categoria->id, 'method' => 'put', 'class' => 'form-horizontal')) }}
                       <fieldset>

                            <!-- Text input-->
                          <div class="form-group {{ $errors->first('categoria', 'has-error') }}">
                            {{ Form::label('categoria', '* Categoria', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                               {{ Form::text('categoria', Input::old('categoria',  $categoria->categoria), array('placeholder' => 'Nome da categoria', 'class' => 'form-control input-md', 'required', 'id' => 'categoria')) }}
                               {{ $errors->first('categoria', '<span class="text-danger">:message</span>') }}
                            </div>
                          </div>

                           <!-- Text input-->
                          <div class="form-group {{ $errors->first('url', 'has-error') }}">
                            {{ Form::label('url', '* URL', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                               {{ Form::text('url', Input::old('url',  $categoria->url), array('placeholder' => 'url-seguindo-o-padrao', 'class' => 'form-control input-md', 'id' => 'url', 'disabled' => 'disabled')) }}
                               {{ $errors->first('url', '<span class="text-danger">:message</span>') }}
                            </div>
                          </div>

                           <!-- Textarea -->
                          <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                            {{ Form::label('descricao', '* Descrição', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                                {{ Form::textarea('descricao', Input::old('descricao',  $categoria->descricao), array('placeholder' => 'Descrição', 'class' => 'form-control', 'required', 'size' => '30x2')) }}
                                {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                            </div>
                          </div>

                           <!-- Text input-->
                          <div class="form-group {{ $errors->first('titulo_pag', 'has-error') }}">
                            {{ Form::label('titulo_pag', '* Título da página', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                               {{ Form::text('titulo_pag', Input::old('titulo_pag',  $categoria->titulo_pag), array('placeholder' => 'Título da página', 'class' => 'form-control input-md', 'required')) }}
                               {{ $errors->first('titulo_pag', '<span class="text-danger">:message</span>') }}
                            </div>
                          </div>

                           <!-- Text input-->
                          <div class="form-group {{ $errors->first('descricao_pag', 'has-error') }}">
                            {{ Form::label('descricao_pag', '* Descrição da página', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                               {{ Form::text('descricao_pag', Input::old('descricao_pag',  $categoria->descricao_pag), array('placeholder' => 'Descrição da Página', 'class' => 'form-control input-md', 'required')) }}
                               {{ $errors->first('descricao_pag', '<span class="text-danger">:message</span>') }}
                            </div>
                          </div>

                           <!-- Text input-->
                          <div class="form-group {{ $errors->first('palavras_pag', 'has-error') }}">
                            {{ Form::label('palavras_pag', '* Palavras chave da página', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                               {{ Form::text('palavras_pag', Input::old('palavras_pag',  $categoria->palavras_pag), array('placeholder' => 'Palavras chave da Página', 'class' => 'form-control input-md', 'required')) }}
                               {{ $errors->first('palavras_pag', '<span class="text-danger">:message</span>') }}
                            </div>
                          </div>

                           <!-- Multiple Radios (inline) -->
                           <div class="form-group {{ $errors->first('tipo_categoria', 'has-error') }}">
                             {{ Form::label('tipo_categoria', '* Tipo Categoria', array('class' => 'col-md-3 control-label')) }}
                             <div class="col-md-7">
                               <label class="radio-inline" for="radios-0">
                                 <input type="radio" name="tipo_categoria" id="tipo_categoria-pai" value="Pai" @if($categoria->tipo_categoria == "Pai") checked="checked" @endif>
                                 Pai
                               </label>
                               <label class="radio-inline" for="radios-1">
                                 <input type="radio" name="tipo_categoria" id="tipo_categoria-filha" value="Filha" @if($categoria->tipo_categoria == "Filha") checked="checked" @endif>
                                 Filha
                               </label>
                               {{ $errors->first('tipo_categoria', '<span class="text-danger">:message</span>') }}
                             </div>
                           </div>

                           <div id="categoria_pai" @if($categoria->tipo_categoria == "Pai") {{ 'style="display:none;"' }} @endif>
                               <!-- Select Basic -->
                               <div class="form-group {{ $errors->first('categoria_pai', 'has-error') }}">
                                 {{ Form::label('categoria_pai', '* Categoria Pai', array('class' => 'control-label col-md-3')) }}
                                 <div class="col-md-7">
                                   {{ Form::select('categoria_pai', ConteudoCategoria::options($categoria->id), Input::old('categoria_pai', $categoria->categoria_pai_id), array('class' => 'form-control', 'id' => 'input_categoria_pai')) }}
                                   {{ $errors->first('categoria_pai', '<span class="text-danger">:message</span>') }}
                                 </div>
                               </div>
                           </div>

                           <!-- Multiple Radios (inline) -->
                           <div class="form-group {{ $errors->first('status', 'has-error') }} ">
                             {{ Form::label('status', '* Status', array('class' => 'col-md-3 control-label')) }}
                             <div class="col-md-7">
                               <label class="radio-inline" for="radios-0">
                                 <input type="radio" name="status"  value="1" @if($categoria->status == "1") checked="checked" @endif>
                                 Ativo
                               </label>
                               <label class="radio-inline" for="radios-1">
                                 <input type="radio" name="status" value="0" @if($categoria->status == "0") checked="checked" @endif>
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

    /**
     * Habilitar e Desabilitar campo Categoria Pai de acordo com a seleção do campo tipo categoria
     */
    $(function () {
        $("#tipo_categoria-pai, #tipo_categoria-filha").click(function () {

            var param = $(this).val();

            if(param == "Pai"){
                $('#input_categoria_pai').removeAttr('required');
                $('#categoria_pai').hide();
            }
            if(param == "Filha"){
                $('#input_categoria_pai').attr('required', true);
                $('#categoria_pai').show();
            }
        });
    });

</script>
@stop
