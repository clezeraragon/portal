
{{-- Page title --}}
@section('title')
{{$data['title_seo']}}
@stop

@section('description')
{{$data['description_seo']}}
@stop

@section('keywords')
{{$data['keywords_seo']}}
@stop

{{-- page level styles --}}
@section('header_styles')


@stop

{{-- Page content --}}
@section('conteudo')

<!-- conteudo Start -->
<div class="container">

    @include('notifications')

    <!-- header Start -->
    <div class="container">
        <div class="page-header">
            <h1>{{$data['title_pag']}} </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('portal') }}">Home</a></li>
                <li><a href="{{ route('portal-painel') }}">Painel</a></li>
                <li class="active">{{$data['title_pag']}}</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container">
            <div class="row">
                <!-- left sec Start -->
                <div class="col-sm-16">
                    <div class="row">

                        {{ Form::open(array('url' => 'site-sonhador/construtor/' . $config['id'], 'method' => 'put', 'class' => 'form-horizontal', 'files' => true)) }}
                            <fieldset>

                                <!-- File Button -->
                                <div class="form-group {{ $errors->first('path_img_topo', 'has-error') }}">
                                    <label class="col-md-3 control-label" for="filebutton">* Imagem do Topo</label>
                                    <div class="col-md-7">
                                        {{ Form::file('path_img_topo', Input::old('path_img_topo'), array('class' => 'form-control input-md input-file"', 'id' => 'path_img_topo')) }}
                                        {{ $errors->first('path_img_topo', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('titulo_site', 'has-error') }}">
                                    {{ Form::label('titulo_site', '* Título do site', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('titulo_site', Input::old('titulo_site', $config['titulo_site']), array('id' => 'titulosite', 'placeholder' => 'Título do site','class' => 'form-control input-md', 'required', 'maxlength' => '50')) }}
                                        {{ $errors->first('titulo_site', '<span class="text-danger">:message</span>') }}
                                        <p>Aproveite este campo para destacar uma informação importante, como data do evento, tema de uma festa, etc.</p>
                                    </div>
                                </div>

                                <a name="corfundo"></a>
                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('cor_fundo', 'has-error') }}">
                                    {{ Form::label('cor_fundo', '* Cor de fundo do site', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('cor_fundo', Input::old('cor_fundo', $config['cor_fundo']), array('id' => 'corfundo', 'placeholder' => 'Cor de fundo do site',
                                                                                                                    'class' => 'color form-control input-md', 'required')) }}
                                        {{ $errors->first('cor_fundo', '<span class="text-danger">:message</span>') }}
                                        <p>Clique no campo para selecionar a cor desejada.</p>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('titulo2', 'has-error') }}">
                                    {{ Form::label('titulo2', '* Título 2', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('titulo2', Input::old('titulo2', $config['titulo2']), array('id' => 'titulo2', 'placeholder' => 'Título 2','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('titulo2', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('texto2', 'has-error') }}">
                                    {{ Form::label('texto2', '* Texto 2', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::textarea('texto2', Input::old('texto2', $config['texto2']), array('id' => 'texto2', 'class' => 'form-control input-md ckeditor', 'required')) }}
                                        {{ $errors->first('texto2', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('titulo3', 'has-error') }}">
                                    {{ Form::label('titulo3', '* Título 3', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('titulo3', Input::old('titulo3', $config['titulo3']), array('id' => 'titulo3', 'placeholder' => 'Título 3','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('titulo3', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('titulo4', 'has-error') }}">
                                    {{ Form::label('titulo4', '* Título 4', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('titulo4', Input::old('titulo4', $config['titulo4']), array('id' => 'titulo4', 'placeholder' => 'Título 4','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('titulo4', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('titulo5', 'has-error') }}">
                                    {{ Form::label('titulo5', '* Título 5', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('titulo5', Input::old('titulo5', $config['titulo5']), array('id' => 'titulo5', 'placeholder' => 'Título 5','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('titulo5', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('texto5', 'has-error') }}">
                                    {{ Form::label('texto5', '* Texto 5', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::textarea('texto5', Input::old('texto5', $config['texto5']), array('id' => 'texto5', 'class' => 'form-control input-md ckeditor', 'required')) }}
                                        {{ $errors->first('texto5', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('titulo6', 'has-error') }}">
                                    {{ Form::label('titulo6', '* Título 6', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('titulo6', Input::old('titulo6', $config['titulo6']), array('id' => 'titulo6', 'placeholder' => 'Título 6','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('titulo6', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('texto6', 'has-error') }}">
                                    {{ Form::label('texto6', '* Texto 6', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::textarea('texto6', Input::old('texto6', $config['texto6']), array('id' => 'texto6', 'class' => 'form-control input-md ckeditor', 'required')) }}
                                        {{ $errors->first('texto6', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <br>
                                <div class="form-group">

                                    <div class="col-md-3"></div>

                                    <div class="col-md-9">
                                        <p>
                                            Preencha os campos para geração do mapa de localização, caso seu site seja vinculado com algum endereço.
                                            <br>
                                            Para que o mapa não apareça basta deixar todos os campos em branco.
                                        </p>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('endereco', 'has-error') }}">
                                    {{ Form::label('endereco', 'Endereço', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('endereco', Input::old('endereco', $config['endereco']), array('id' => 'endereco', 'placeholder' => '','class' => 'form-control input-md')) }}
                                        {{ $errors->first('endereco', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('numero', 'has-error') }}">
                                    {{ Form::label('numero', 'Número', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('numero', Input::old('numero', $config['numero']), array('id' => 'numero', 'placeholder' => '','class' => 'form-control input-md')) }}
                                        {{ $errors->first('numero', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('cidade', 'has-error') }}">
                                    {{ Form::label('cidade', 'Cidade', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('cidade', Input::old('cidade', $config['cidade']), array('id' => 'cidade', 'placeholder' => '','class' => 'form-control input-md')) }}
                                        {{ $errors->first('cidade', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <br>

                                <!-- Multiple Radios (inline) -->
                                <div class="form-group" {{ $errors->first('st_busca', 'has-error') }}>
                                    {{ Form::label('st_busca', '* Deseja que o seu site apareça na busca do Portal', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        <label class="radio-inline" for="radios-0">
                                            <input type="radio" name="st_busca" id="st_busca-1" value="1" @if($config['st_busca'] == "1") checked="checked" @endif>
                                            Sim
                                        </label>
                                        <label class="radio-inline" for="radios-1">
                                            <input type="radio" name="st_busca" id="st_busca-0" value="0" @if($config['st_busca'] == "0") checked="checked" @endif>
                                            Não
                                        </label>
                                        {{ $errors->first('st_busca', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Multiple Radios (inline) -->
                                <div class="form-group" {{ $errors->first('status', 'has-error') }}>
                                    {{ Form::label('genero', '* Defina o status do seu site', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        <label class="radio-inline" for="radios-0">
                                            <input type="radio" name="status" id="status-1" value="1" @if($config['status'] == "1") checked="checked" @endif>
                                            Online
                                        </label>
                                        <label class="radio-inline" for="radios-1">
                                            <input type="radio" name="status" id="status-0" value="0" @if($config['status'] == "0") checked="checked" @endif>
                                            Offline
                                        </label>
                                        {{ $errors->first('status', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cadastrar"></label>
                                    <div class="col-md-7">
                                        {{ Form::submit('Salvar e visualizar o site', array('class' => 'btn btn-primary')) }}
                                    </div>
                                </div>

                            </fieldset>
                        {{ Form::close() }}

                    </div>
                </div>
                <!-- left sec End -->
            </div>
        </div>
    </section>
    <!-- Data End -->
</div>
<!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('/portal/lib/ckeditor/ckeditor.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/portal/lib/jscolor/jscolor.js') }}" type="text/javascript"></script>

    <script>
        $(window).load(function() {
            var id = window.location.hash;
            //alert(id);
            $(id).focus();
        });
    </script>

@stop

