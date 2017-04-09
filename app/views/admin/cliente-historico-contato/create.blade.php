
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
            <a href="{{ URL::to(Route("cliente-historico-contato", $cliente_id)) }}" class="btn btn-info navbar-right btn_voltar"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>

            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        Cadastrar {{$data['title']}}
                    </div>
                </div>
                <div class="portlet-body">
                     {{ Form::open(array('url' => Route("cad-cliente-historico-contato"), 'class' => 'form-horizontal')) }}
                        <fieldset>

                            {{ Form::hidden('cliente_id', Input::old('cliente_id', $cliente_id), array()) }}

                            <!-- Textarea -->
                            <div class="form-group {{ $errors->first('mensagem', 'has-error') }}">
                                {{ Form::label('mensagem', '* Mensagem', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::textarea('mensagem', Input::old('mensagem'), array('placeholder' => 'Mensagem', 'class' => 'form-control', 'required', 'size' => '30x5', 'id' => 'ckeditor_standard')) }}
                                    {{ $errors->first('mensagem', '<span class="text-danger">:message</span>') }}
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

@stop