
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
                <li class="active">iSonhei Club</li>
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
                        <div class="row ">

                            @include("portal.painel.menu_lateral")

                        </div>
                    </div>
                </div>

                <!-- left sec Start -->
                <div class="col-md-12 col-sm-12 col-xs-16">
                    <div class="bordered painel_box_conteudo">
                        <div class="row">
                                <h3>iSonhei Club</h3>

                                @if(count($movimentacaoEntradaPendente) > 0)
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Ação para acúmulo de pontos</th>
                                            <th>Qtd. de pontos</th>
                                            <th>Data</th>
                                            </thead>
                                        <tbody>
                                        <?php $total_pendente = 0; ?>
                                        @foreach($movimentacaoEntradaPendente as $mov)
                                            <tr>
                                                <td>
                                                    {{$mov->acao}}
                                                    @if($mov->user_indicado_id)
                                                        - {{ ucfirst($mov->nome_indicado) . " " . ucfirst($mov->sobrenome_indicado)}}
                                                    @endif

                                                    @if($mov->descricao)
                                                        - {{ ucfirst($mov->descricao)}}
                                                    @endif

                                                </td>
                                                <td>{{ Util::number($mov->pontos, 0, '.',',')}}</td>
                                                <td>{{ Util::toTimestamps($mov->created_at) }}</td>
                                            </tr>

                                            <?php $total_pendente += $mov->pontos; ?>

                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>Total</th>
                                            <th>{{ Util::number($total_pendente, 0, '.',',') }}</th>
                                            <th></th>
                                            </thead>
                                        </tfoot>
                                    </table>

                                    <br>
                                    <p>Revise seus dados para acumular os pontos acima</p>
                                    {{ Form::open(array('url' => 'completa-cadastro' , 'method' => 'put', 'class' => 'form-horizontal')) }}
                                        <fieldset>
                                            @if(!Sentry::getUser()->cpf)
                                                <!-- Text input-->
                                                <div class="form-group {{ $errors->first('cpf', 'has-error') }}">
                                                    {{ Form::label('cpf', '* CPF', array('class' => 'col-md-4 control-label')) }}
                                                    <div class="col-md-8">
                                                        {{ Form::text('cpf', Input::old('cpf', Sentry::getUser()->cpf), array('placeholder' => '','class' => 'form-control input-md', 'maxlength' => '14', 'id' => 'cpf', 'required')) }}
                                                        {{ $errors->first('cpf', '<span class="text-danger">:message</span>') }}
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- Text input-->
                                            <div class="form-group {{ $errors->first('telefone', 'has-error') }}">
                                                {{ Form::label('telefone', '* Telefone', array('class' => 'col-md-4 control-label')) }}
                                                <div class="col-md-8">
                                                    {{ Form::text('telefone', Input::old('telefone', Sentry::getUser()->telefone), array('placeholder' => '(00) 00000-0000','class' => 'form-control input-md', 'required',
                                                                                                                                                                'id' => 'phone')) }}
                                                    {{ $errors->first('telefone', '<span class="text-danger">:message</span>') }}
                                                </div>
                                            </div>
                                            <!-- Button -->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="cadastrar"></label>
                                                <div class="col-md-8">
                                                    {{ Form::submit('Confirmar dados e acumular pontos', array('class' => 'btn btn-primary')) }}
                                                </div>
                                            </div>
                                        </fieldset>
                                    {{ Form::close() }}
                                @endif

                                <hr>

                                @if(count($movimentacaoEntradaLiberada) > 0)
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Ação para acúmulo de pontos</th>
                                            <th>Qtd. de pontos</th>
                                            <th>Data</th>
                                        </thead>
                                        <tbody>
                                            <?php $total_liberado = 0; ?>
                                            @foreach($movimentacaoEntradaLiberada as $mov)
                                                <tr>
                                                    <td>
                                                        {{$mov->acao}}
                                                        @if($mov->user_indicado_id)
                                                            - {{ ucfirst($mov->nome_indicado) . " " . ucfirst($mov->sobrenome_indicado)}}
                                                        @endif

                                                        @if($mov->descricao)
                                                            - {{ ucfirst($mov->descricao)}}
                                                        @endif

                                                    </td>
                                                    <td>{{ Util::number($mov->pontos, 0, '.',',')}}</td>
                                                    <td>{{ Util::toTimestamps($mov->created_at) }}</td>
                                                </tr>

                                                <?php $total_liberado += $mov->pontos; ?>

                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>Total</th>
                                            <th>{{ Util::number($total_liberado, 0, '.',',')}}</th>
                                            <th></th>
                                        </tfoot>
                                    </table>
                                @else
                                    <p>Nenhum ponto registrado</p>
                                @endif

                                <div class="painel_pontos_esquerda">
                                    <span class="painel_home_fid_box_titulo">
                                        Seus Pontos do iSonhei Club
                                    </span>
                                    <br>
                                    <span class="painel_home_fid_box_pontos">
                                        <strong>{{\Util::number($pontos, 0)}}</strong>
                                    </span>
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

    <script type="text/javascript">

        $(document).ready(function(){
            $("#cpf").inputmask("999.999.999-99");
        });

    </script>

@stop

