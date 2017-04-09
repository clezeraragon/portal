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

                <div class="portlet box primary">
                    <div class="portlet-title">
                        <div class="caption">
                            Cadastrar {{$data['title']}}
                        </div>
                    </div>

                    @if(isset($rs))

                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-sm-offset-1 col-md-offset-1 ">
                                    <img src="{{ asset($rs->path_img_referencia) }}" width="400" height="250"
                                         class="img-responsive">
                                    {{--@include('elements.home.bloco-video-3p')--}}

                                </div>
                                <br>
                                <br>

                                {{ Form::open(array('url' =>  '/admin/cms-bloco-materia/' . $rs->id, 'method' => 'put', 'class' => 'form-horizontal', 'files' => true)) }}

                                <fieldset>

                                    <div class="col-md-10">
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
                                            {{ Form::label('Materia', '* Materia', array('class' => 'col-md-3 control-label')) }}
                                            <div class="col-md-7">
                                                @if(!$conteudos_ids)

                                                    @for($i=0; $i < CmsBloco::getQuantidadeItensMateria($rs->id);$i++)

                                                        <div class="input-group">

                                                            {{ Form::select('conteudos_ids[]',array('' => 'Selecione um Conteúdo') + $inputselect,null,array('class' => 'form-control select2','id'=>'e1', 'required'))}}
                                                            {{ $errors->first('titulo', '<span class="text-danger">:message</span>') }}

                                                            <span class="input-group-addon success">
                                                            <span class="glyphicon">
                                                                {{--<strong> Posição {{$key}}</strong>--}}
                                                                @if ($i == 0)
                                                                    <strong style="width:70%">1º</strong>
                                                                @endif
                                                                @if($i == 1)
                                                                    <strong style="width:70%">2º</strong>
                                                                @endif
                                                                @if($i == 2)
                                                                    <strong style="width:70%">3º</strong>
                                                                @endif
                                                                @if($i == 3)
                                                                    <strong style="width:70%">4º</strong>
                                                                @else
                                                                @endif
                                                                @if($i == 4)
                                                                    <strong style="width:70%">5º</strong>
                                                                @else
                                                                @endif
                                                                @if($i == 5)
                                                                    <strong style="width:70%">6º</strong>
                                                                @else
                                                                @endif

                                                            </span>
                                                        </span>
                                                        </div>
                                                        <br>
                                                    @endfor
                                                    @endif
                                                @foreach( $conteudos_ids as  $key => $teste)


                                                    <div class="input-group">

                                                        {{ Form::select('conteudos_ids[]', $materias->lists('titulo','id'),Input::old('conteudos_ids[]',$conteudos_ids[$key]['conteudo_id']) ,array('class' => 'form-control select2','id'=>'e2', 'required'))}}
                                                        {{ $errors->first('titulo', '<span class="text-danger">:message</span>') }}

                                                        <span class="input-group-addon success">
                                                            <span class="glyphicon">
                                                                {{--<strong> Posição {{$key}}</strong>--}}
                                                                @if ($key == 0)
                                                                    <strong style="width:70%">1º</strong>
                                                                @endif
                                                                @if($key == 1)
                                                                    <strong style="width:70%">2º</strong>
                                                                @endif
                                                                @if($key == 2)
                                                                    <strong style="width:70%">3º</strong>
                                                                @endif
                                                                @if($key == 3)
                                                                    <strong style="width:70%">4º</strong>
                                                                @else
                                                                @endif
                                                                @if($key == 4)
                                                                    <strong style="width:70%">5º</strong>
                                                                @else
                                                                @endif
                                                                @if($key == 5)
                                                                    <strong style="width:70%">6º</strong>
                                                                @else
                                                                @endif

                                                            </span>
                                                        </span>
                                                    </div>
                                                    <br>

                                                @endforeach


                                            </div>
                                        </div>

                                        <!-- Button -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="cadastrar"></label>

                                            <div class="col-md-7">
                                                {{ Form::submit('Salvar', array('class' => 'btn btn-success')) }}
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                {{ Form::close() }}
                            </div>
                        </div>
                </div>
                @endif
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