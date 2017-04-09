
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

                        <a href="{{ URL::previous() }}" class="btn btn-success"></span>Voltar</a>
                        <hr>

                        {{ Form::open(array('url' => 'site-sonhador/construtor/fotos/' . $siteid . "/" . $rs->id, 'method' => 'put', 'class' => 'form-horizontal', 'files' => true)) }}
                            <fieldset>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('titulo', 'has-error') }}">
                                    {{ Form::label('titulo', '* Título', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('titulo', Input::old('titulo', $rs->titulo), array('id' => 'titulo', 'placeholder' => 'Título da foto','class' => 'form-control input-md', 'required','maxlength' => '80')) }}
                                        {{ $errors->first('titulo', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- File Button -->
                                <div class="form-group {{ $errors->first('path_img', 'has-error') }}">
                                    <label class="col-md-3 control-label" for="filebutton">* Foto</label>
                                    <div class="col-md-7">
                                        <img src="{{ asset($rs->path_img) }}" width="200">
                                        <br>
                                        {{ $errors->first('path_img', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cadastrar"></label>
                                    <div class="col-md-7">
                                        {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
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

