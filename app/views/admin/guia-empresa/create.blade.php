
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
                        Cadastrar {{$data['title']}}
                    </div>
                </div>
                <div class="portlet-body">
                     {{ Form::open(array('url' => $data['route'], 'class' => 'form-horizontal', 'files' => true)) }}
                        <fieldset>

                        <!-- Select Basic -->
                        <div class="form-group {{ $errors->first('cliente_id', 'has-error') }}">
                          {{ Form::label('cliente_id', '* Cliente', array('class' => 'control-label col-md-3')) }}
                          <div class="col-md-7">
                            {{ Form::select('cliente_id', Cliente::combobox(), Input::old('cliente_id'), array('class' => 'form-control select2','id'=>'e1', 'required')) }}
                            {{ $errors->first('cliente_id', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group {{ $errors->first('cidade_id', 'has-error') }}">
                          {{ Form::label('cidade_id', '* Cidade', array('class' => 'control-label col-md-3')) }}
                          <div class="col-md-7">
                            {{ Form::select('cidade_id', GuiaCidade::combobox(), Input::old('cidade_id'), array('class' => 'form-control select2','id'=>'e2', 'required')) }}
                            {{ $errors->first('cidade_id', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group {{ $errors->first('categoria_id', 'has-error') }}">
                          {{ Form::label('categoria_id', '* Categoria', array('class' => 'control-label col-md-3')) }}
                          <div class="col-md-7">
                            {{ Form::select('categoria_id', GuiaCategoria::combobox(), Input::old('categoria_id'), array('class' => 'form-control select2','id'=>'e3', 'required')) }}
                            {{ $errors->first('categoria_id', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group {{ $errors->first('plano_id', 'has-error') }}">
                          {{ Form::label('plano_id', '* Plano', array('class' => 'control-label col-md-3' )) }}
                          <div class="col-md-7">
                            {{ Form::select('plano_id', GuiaPlano::combobox(), Input::old('plano_id'), array('class' => 'form-control', 'required')) }}
                            {{ $errors->first('plano_id', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('url', 'has-error') }}">
                            {{ Form::label('url', '* URL', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                                {{ Form::text('url', Input::old('url'), array('placeholder' => 'url-seguindo-o-padrao', 'class' => 'form-control input-md', 'required', 'id' => 'url')) }}
                                {{ $errors->first('url', '<span class="text-danger">:message</span>') }}
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('qtd_imagem', 'has-error') }}">
                          {{ Form::label('qtd_imagem', '* Qtd. de Imagem', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('qtd_imagem', Input::old('qtd_imagem'), array('placeholder' => 'Quantidade de imagens', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('qtd_imagem', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('qtd_video', 'has-error') }}">
                          {{ Form::label('qtd_video', '* Qtd. de Vídeos', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('qtd_video', Input::old('qtd_video'), array('placeholder' => 'Quantidade de Vídeos', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('qtd_video', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('dt_ini', 'has-error') }}">
                          {{ Form::label('dt_ini', '* Início da Veiculação', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('dt_ini', Input::old('dt_ini'), array('placeholder' => 'dd/mm/yyyy', 'class' => 'form-control input-md', 'required', 'data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask')) }}
                             {{ $errors->first('dt_ini', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('dt_fim', 'has-error') }}">
                          {{ Form::label('dt_fim', '* Término da Veiculação', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('dt_fim', Input::old('dt_fim'), array('placeholder' => 'dd/mm/yyyy', 'class' => 'form-control input-md', 'required', 'data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask')) }}
                             {{ $errors->first('dt_fim', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                       <!-- Textarea -->
                       <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                         {{ Form::label('descricao', '* Resumo', array('class' => 'col-md-3 control-label')) }}
                         <div class="col-md-7">
                             {{ Form::textarea('descricao', Input::old('descricao'), array('placeholder' => 'Resumo da Empresa na página de filtro', 'class' => 'form-control', 'required', 'size' => '30x2', 'maxlength' => '160')) }}
                             {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                         </div>
                       </div>

                         <!-- Textarea -->
                        <div class="form-group {{ $errors->first('texto', 'has-error') }}">
                          {{ Form::label('texto', '* Descrição', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                              {{ Form::textarea('texto', Input::old('texto'), array('placeholder' => 'Texto sobre a empresa', 'class' => 'form-control', 'required', 'size' => '30x4', 'id' => 'ckeditor_full')) }}
                              {{ $errors->first('texto', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group {{ $errors->first('observacoes', 'has-error') }}">
                            {{ Form::label('observacoes', ' Opcionais e Observações', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                                {{ Form::textarea('observacoes', Input::old('observacoes'), array('placeholder' => 'Opcionais e Observações', 'class' => 'form-control', 'size' => '30x2', 'maxlength' => '160')) }}
                                {{ $errors->first('observacoes', '<span class="text-danger">:message</span>') }}
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('email_responsavel_anuncio', 'has-error') }}">
                            {{ Form::label('email_responsavel_anuncio', 'E-mail de Contato', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                                {{ Form::text('email_responsavel_anuncio', Input::old('email_responsavel_anuncio'), array('placeholder' => 'Ao preencher este campo as mensagens do anúncio serão enviadas para este e-mail.', 'class' => 'form-control input-md')) }}
                                {{ $errors->first('email_responsavel_anuncio', '<span class="text-danger">:message</span>') }}
                            </div>
                        </div>

                        <!-- Multiple Radios (inline) -->
                        <div class="form-group {{ $errors->first('tipo_negociacao', 'has-error') }} ">
                            {{ Form::label('tipo_negociacao', '* Negociação', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                                <label class="radio-inline" for="radios-0">
                                    <input type="radio" name="tipo_negociacao"  value="Contrato">
                                    Contrato
                                </label>
                                <label class="radio-inline" for="radios-1">
                                    <input type="radio" name="tipo_negociacao" value="Bonificado">
                                    Bonificado
                                </label>
                                {{ $errors->first('tipo_negociacao', '<span class="text-danger">:message</span>') }}
                            </div>
                        </div>

                        <!-- Multiple Radios (inline) -->
                        <div class="form-group {{ $errors->first('status', 'has-error') }} ">
                            {{ Form::label('status', '* Status', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                                <label class="radio-inline" for="radios-0">
                                    <input type="radio" name="status"  value="1">
                                    Ativo
                                </label>
                                <label class="radio-inline" for="radios-1">
                                    <input type="radio" name="status" value="0">
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

    <script src="{{ asset('/portal/js/jquery-mask/jquery.mask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/js/custom/custom.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('assets/vendors/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/ckeditor/adapters/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/core-b3.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            // CKEditor Standard
            $('textarea#ckeditor_standard').ckeditor({
                height: '150px',
                toolbar: [{
                        name: 'document',
                        items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']
                    }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                    ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'], // Defines toolbar group without name.
                    {
                        name: 'basicstyles',
                        items: ['Bold', 'Italic']
                    }
                ]
            });

            // CKEditor Full
            $('textarea#ckeditor_full').ckeditor({
                height: '200px'
            });

            // The "instanceCreated" event is fired for every editor instance created.
            CKEDITOR.on('instanceCreated', function(event) {
                var editor = event.editor,
                    element = editor.element;

                // Customize editors for headers and tag list.
                // These editors don't need features like smileys, templates, iframes etc.
                if (element.is('h1', 'h2', 'h3') || element.getAttribute('id') == 'taglist') {
                    // Customize the editor configurations on "configLoaded" event,
                    // which is fired after the configuration file loading and
                    // execution. This makes it possible to change the
                    // configurations before the editor initialization takes place.
                    editor.on('configLoaded', function() {

                        // Remove unnecessary plugins to make the editor simpler.
                        editor.config.removePlugins = 'colorbutton,find,flash,font,' +
                            'forms,iframe,image,newpage,removeformat,' +
                            'smiley,specialchar,stylescombo,templates';

                        // Rearrange the layout of the toolbar.
                        editor.config.toolbarGroups = [{
                            name: 'editing',
                            groups: ['basicstyles', 'links']
                        }, {
                            name: 'undo'
                        }, {
                            name: 'clipboard',
                            groups: ['selection', 'clipboard']
                        }, {
                            name: 'about'
                        }];
                    });
                }
            });

        });
    </script>

    <script>

        /**
         * Formatar URL, quando os campos nome da categoria e url forem alterados
         * RGE-011
         */
        $("#plano_id").change(function(){

            var param = $(this).val();

            $.get( "{{ URL::route("config-plano") }}/" + param , function(data){
                $( "#qtd_imagem" ).val( data['qtd_imagem'] );
                $( "#qtd_video" ).val( data['qtd_video'] );
            });
        });


        /**
         * Formatar URL, quando os campos nome da categoria e url forem alterados
         */
        $("#url").change(function(){

            var param = $(this).val();

            $.get( "{{ URL::route("format-url") }}/" + param , function(data){
                $( "#url" ).val( data );
            });
        });

    </script>

    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}" type="text/javascript"></script>

@stop