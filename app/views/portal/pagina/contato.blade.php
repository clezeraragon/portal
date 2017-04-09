{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')


@stop

{{-- Page content --}}
@section('conteudo')

    <!-- conteudo Start -->
    <div class="container">

        @include('notifications')
        <div id="notification"></div>

        <!-- header Start -->
        <div class="container">
            <div class="page-header">
                <h1>{{$data['title_pag']}}</h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Contato - <span style="text-transform:lowercase !important;">i</span>Sonhei</li>

                </ol>
            </div>
        </div>
        <!-- header End -->

        <!-- data Start -->
        <section>
            <div class="container ">
                <div class="row ">
                    <!-- left sec Start -->
                    <div class="col-sm-16">
                        <div class="row">
                            <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s"
                                 data-wow-offset="50">
                                <div class="main-title-outer pull-left">
                                    <div class="main-title">Entre em contato</div>

                                </div>
                            </div>
                            <div class="col-sm-10 col-md-12 right-border">
                                <div class="panel-body ">
                                    {{ Form::open(array('url' => $data['route'] ,'method'=> 'post' ,'class' => 'form-horizontal')) }}

                                    {{--{{Form::hidden('guia_empresa_id',isset($anuncio['guia_empresa_id'])? $anuncio['guia_empresa_id'] : '')}}--}}

                                    <!-- CSRF Token -->
                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}"/>--}}
                                    <fieldset>

                                        <div class="form-group ">
                                            {{--<label class="col-md-3 control-label" for="name">Nome</label>--}}
                                            <!-- Name input-->
                                            <div class="col-md-8">
                                                {{Form::text('nome', Input::old('nome'),array('class' => 'form-control','placeholder'=>'Nome*','required'))}}

                                                {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                                                <br>
                                            </div>
                                            <!-- telefone input-->
                                            <div class="col-md-8">
                                                {{Form::text('telefone', Input::old('telefone'),array('class' => 'form-control','placeholder'=>'Telefone*','required','id'=>'telefone'))}}

                                                {{ $errors->first('telefone', '<span class="text-danger">:message</span>') }}
                                            </div>


                                        </div>

                                        <div class="form-group">
                                            {{--<label class="col-md-3 control-label" for="email">E-mail</label>--}}
                                            <!-- Email input-->
                                            <div class="col-md-8">
                                                {{Form::text('email', Input::old('email'),array('class' => 'form-control','placeholder'=>'E-mail*','required'))}}

                                                {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
                                                <br>
                                            </div>
                                            <!-- assunto input-->
                                            <div class="col-md-8">
                                                {{Form::text('assunto', Input::old('assunto'),array('class' => 'form-control','placeholder'=>'Assunto*','required'))}}

                                                {{ $errors->first('assunto', '<span class="text-danger">:message</span>') }}
                                            </div>
                                        </div>

                                        <!-- Message body -->
                                        <div class="form-group {{ $errors->first('mensagem', 'has-error') }}">
                                            {{--<label class="col-md-3 control-label" for="message">Mensagem</label>--}}

                                            <div class="col-md-16">
                                                {{Form::textarea('mensagem', Input::old('mensagem'),array('class' => 'form-control','placeholder'=>'Por favor digite sua mensagem...','required'))}}

                                                {{ $errors->first('mensagem', '<span class="text-danger">:message</span>') }}
                                            </div>

                                        </div>
                                        <!-- Form actions -->
                                        <div class="form-group">

                                            <div class="col-md-2 text-left col-md-offset-0 ">
                                                <div class="row ">
                                                    <button type="submit"
                                                            class="btn btn-responsive btn-primary">Enviar
                                                    </button>
                                                </div>

                                            </div>
                                        </div>

                                    </fieldset>
                                    {{Form::close()}}

                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s"
                                     data-wow-offset="50">
                                    <div class="main-title-outer pull-left">
                                        <div class="main-title">nosso endereço</div>


                                    </div>
                                    <div>{{\Lang::get('general.empresa_endereco')}}</div>
                                    <div>{{\Lang::get('general.empresa_cep')}}</div>
                                    <div>{{\Lang::get('general.empresa_telefone')}}</div>

                                </div>
                                <br><br>

                                <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s"
                                     data-wow-offset="50">
                                    <div class="main-title-outer pull-left">
                                        <div class="main-title">nosso e-mail</div>

                                    </div>
                                    <div>{{\Lang::get('general.empresa_email_geral')}}</div>
                                </div>
                            </div>
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

    <script language="JavaScript">
        $('#telefone').inputmask('(99) 9999[9]-9999');
    </script>
@stop

