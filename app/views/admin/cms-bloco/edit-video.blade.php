{{-- Page title --}}
@section('title')
    {{$data['title']}}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
    {{--{{HTML::style("portal/css/custom-blue.css")}}--}}
    {{HTML::style("portal/css/ionicons.min.css")}}
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
                <a href="{{ URL::to($data['route']) }}" class="btn btn-info navbar-right btn_voltar"><span
                            class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
                {{--{{dd($videos_ids)}}--}}
                <div class="portlet box primary">
                    <div class="portlet-title">
                        <div class="caption">
                            Cadastrar {{$data['title']}}
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-md-push-1 col-sm-push-1">
                                <img src="{{ asset($rs->path_img_referencia) }}" width="330" height="480">
                                {{--@include('elements.home.bloco-video-3p')--}}

                            </div>
                            <div class="col-md-8 col-sm-8">

                                {{ Form::open(array('url' => '/admin/cms-bloco-video/' . $rs->id, 'method' => 'put', 'class' => 'form-horizontal', 'files' => true)) }}

                                <fieldset>

                                    {{--<div class="col-md-12">--}}
                                    {{--<img src="{{ asset($rs->path_img_referencia) }}" width="200">--}}
                                    {{--</div>--}}

                                    <!-- Text input-->
                                    <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                                        {{ Form::label('nome', '* Nome', array('class' => 'col-md-3 control-label')) }}
                                        <div class="col-md-7">
                                            {{ Form::text('nome', Input::old('nome',$rs->nome), array('placeholder' => 'Nome da categoria', 'class' => 'form-control input-md', 'required')) }}
                                            {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                                        {{ Form::label('descricao', '* Descricao', array('class' => 'col-md-3 control-label')) }}
                                        <div class="col-md-7">
                                            {{ Form::text('descricao', Input::old('descricao',$rs->descricao), array('placeholder' => 'Descricao', 'class' => 'form-control', 'required')) }}
                                            {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('titulo', 'has-error') }}">
                                        {{ Form::label('video', '* Video', array('class' => 'col-md-3 control-label')) }}
                                        <div class="col-md-7">

                                            @for($i = 0; $i < $rs->qtd_itens; $i++)
                                                @if(!isset($videos_ids[$i]))
                                                    <?php $videos_ids[$i] = null; ?>
                                                @endif
                                                {{ Form::select('videos_ids[]', $videos->lists('titulo','id'),Input::old('videos_ids[]',$videos_ids[$i]) ,array('class' => 'form-control select2','id' => 'e1', 'required'))}}
                                                {{ $errors->first('titulo', '<span class="text-danger">:message</span>') }}
                                                <br>


                                            @endfor


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
            </div>
        </div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- script de busca -->
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}" type="text/javascript"></script>
    <!-- fim de busca -->
    <script>

        /**
         * Formatar URL, quando os campos nome da categoria e url forem alterados
         */
        $("#categoria, #url").change(function () {

            var param = $(this).val();

            $.get("{{ URL::route("format-url") }}/" + param, function (data) {
                $("#url").val(data);
            });
        });

    </script>

@stop