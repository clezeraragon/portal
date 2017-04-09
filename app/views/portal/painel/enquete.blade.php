
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
<div>
    <!-- header Start -->
    <div class="container">
        <div class="page-header">
            <h1>{{$data['title_pag']}} </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('portal') }}">Home</a></li>
                <li class="active">{{$data['title_pag']}}</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-md-4 col-xs-16">
                    <div class="bordered">
                        <div class="row">

                            @include("portal.painel.menu_lateral")

                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-16">
                    <div class="bordered painel_box_conteudo">

                        <h3>Enquete</h3>

                        <div class="row" style="padding-left: 20px;">

                            @if(Sentry::getUser()->utm_campaign == "condominio" || Session::get('promocao') == "condominio")
                                <br>
                                {{ Form::open(array('url' => $data['route'] , 'method' => 'post', 'class' => 'form-horizontal')) }}
                                    <fieldset>

                                        <!-- Multiple Radios (inline) -->
                                        <div class="form-group" {{ $errors->first('pergunta1', 'has-error') }}>
                                            {{ Form::label('pergunta1', '* Qual é o seu maior sonho?', array('class' => 'col-md-12')) }}
                                            <div class="col-md-8">
                                                <label class="radio-inline" for="radios-0">
                                                    <input type="radio" name="pergunta1" required value="Realizar meu casamento">Realizar meu casamento
                                                </label>
                                                <br>
                                                <label class="radio-inline" for="radios-1">
                                                    <input type="radio" name="pergunta1" required value="Comprar a casa própria">Comprar a casa própria
                                                </label>
                                                <br>
                                                <label class="radio-inline" for="radios-1">
                                                    <input type="radio" name="pergunta1" required value="Conhecer o mundo">Conhecer o mundo
                                                </label>
                                            </div>
                                            <div class="col-md-8">
                                                <label class="radio-inline" for="radios-0">
                                                    <input type="radio" name="pergunta1" required value="Realizar meu casamento">Estudar fora / fazer intercâmbio
                                                </label>
                                                <br>
                                                <label class="radio-inline" for="radios-1">
                                                    <input type="radio" name="pergunta1" required value="Comprar a casa própria">Ter filhos
                                                </label>
                                                <br>
                                                <label class="radio-inline" for="radios-1">
                                                    <input type="radio" name="pergunta1" id ="p1_outros" required value="Outros">Outro
                                                    <div id="p1_outros_input" style="display: none">
                                                        {{ Form::text('p1_outros', Input::old('p1_outros'), array('placeholder' => 'Qual?', 'class' => 'form-control input-md')) }}
                                                    </div>
                                                </label>
                                            </div>
                                            {{ $errors->first('pergunta1', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <br>

                                        <!-- Multiple Checkboxes -->
                                        <div class="form-group {{ $errors->first('pergunta2', 'has-error') }}">
                                            {{ Form::label('pergunta2', '* Por quais assuntos você mais se interessa?', array('class' => 'col-md-12')) }}
                                            <div class="col-md-16">
                                                @foreach (UsuarioAssuntosInteresse::listaAssuntos() as $interesse)

                                                    <div class="checkbox col-md-16" style="margin-left: 15px;">
                                                        {{ Form::checkbox('pergunta2[]', $interesse->id, null,
                                                            array('id' => $interesse->id )) . ' ' . $interesse->assunto}}
                                                    </div>

                                                @endforeach
                                            </div>
                                            {{ $errors->first('pergunta2', '<span class="text-danger">:message</span>') }}
                                        </div>
                                        <Br>

                                        <!-- Multiple Radios (inline) -->
                                        <div class="form-group" {{ $errors->first('pergunta3', 'has-error') }}>
                                            {{ Form::label('pergunta3', '* Qual é o seu principal meio de comunicação/informação na internet?', array('class' => 'col-md-12')) }}
                                            <div class="col-md-8">
                                                <label class="radio-inline" for="radios-0">
                                                    <input type="radio" name="pergunta3" required value="Redes sociais">Redes sociais (Facebook, Instagram, etc.)
                                                </label>
                                                <br>
                                                <label class="radio-inline" for="radios-1">
                                                    <input type="radio" name="pergunta3" required value="Portais">Portais (Uol, Terra, etc.)
                                                </label>
                                            </div>
                                            <div class="col-md-8">
                                                <label class="radio-inline" for="radios-0">
                                                    <input type="radio" name="pergunta3" required value="Sites">Sites de informação (Folha SP, G1, etc.)
                                                </label>
                                                <br>
                                                <label class="radio-inline" for="radios-1">
                                                    <input type="radio" name="pergunta3" required value="Buscadores">Buscadores (Google, Yahoo, etc.)
                                                </label>
                                            </div>
                                            {{ $errors->first('pergunta3', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <br>

                                        <!-- Button -->
                                        <div class="form-group">
                                            {{--<label class="col-md-4 control-label" for="cadastrar"></label>--}}
                                            <div class="col-md-8">
                                                {{ Form::submit('Enviar respostas', array('class' => 'btn btn-primary')) }}
                                            </div>
                                        </div>

                                    </fieldset>
                                {{ Form::close() }}

                            @else

                                <p>Nenhuma enquete disponível.</p>

                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Data End -->
</div>
<!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script>
        $("#p1_outros").click(function(){

            $("#p1_outros_input").show();
        });
    </script>

@stop