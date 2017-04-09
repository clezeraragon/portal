
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

            @include('notifications')

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
                        <div class="row">
                            <h3>Acumule pontos convidando seus amigos</h3>
                            <p>
                                Convide quantos amigos você quiser para participar do <a href="{{Route("page-fidelidade")}}" target="_blank">iSonhei Club</a>.
                            </p>
                            <p>
                                A cada indicação que efetive um novo cadastro você ganha {{$pontos_indicacao}} pontos e a vantagem é que seus amigos vão ganhar {{$pontos_cadastro_indicacao}}
                                pontos ao se cadastrar pelo seu link.
                            </p>
                            <p>
                                Envie seu convite através desta página, o seu link de cadastro será encaminhado automaticamente junto com a mensagem.
                            </p>
                            <p>
                                <strong>Lembre-se:</strong> para que possa pontuar, seu amigo deve validar o cadastro através do e-mail de confirmação.
                            </p>
                            <p>
                                Consulte os produtos que você pode trocar na prateleira do <a href="{{Route("isonhei-club-loja")}}" target="_blank">iSonhei Store</a>.
                            </p>
                            <br>

                            {{ Form::open(array('url' => Route($data['route']) ,  'class' => 'form-horizontal')) }}
                            <fieldset>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                                    {{ Form::label('nome', '* Nome', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-10 col-sm-15">
                                        {{ Form::text('nome', Input::old('nome'), array('placeholder' => 'Nome do amigo','class' => 'form-control input-md', 'required', 'maxlength' => '255')) }}
                                        {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                    {{ Form::label('email', '* E-mail', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-10 col-sm-15">
                                        {{ Form::text('email', Input::old('email'), array('placeholder' => 'E-mail do amigo','class' => 'form-control input-md', 'required', 'maxlength' => '255')) }}
                                        {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('mensagem', 'has-error') }}">
                                    {{ Form::label('mensagem', 'Mensagem', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-10 col-sm-15">
                                        {{Form::textarea('mensagem',  Input::old('mensagem', $msg),array('class' => 'form-control ckeditor', ))}}
                                        {{ $errors->first('mensagem', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="registrar"></label>
                                    <div class="col-md-10 col-sm-15" align="right">
                                        {{ Form::submit('Convidar', array('class' => 'btn btn-primary')) }}
                                    </div>
                                </div>

                            </fieldset>
                            {{ Form::close() }}

                                <div class="col-md-16">
                                    <br>
                                    <h3>Amigos indicados que se cadastraram, mas não ativaram o acesso ao portal.</h3>
                                    @if(count($indicacoes_pendente) > 0)
                                        <table class="table table-bordered">
                                            <thead>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Data de cadastro</th>
                                            <th>Situação</th>
                                            </thead>
                                            <tbody>
                                            @foreach($indicacoes_pendente as $rs)
                                                <tr>
                                                    <td>{{$rs->first_name . " " . $rs->last_name}}</td>
                                                    <td>{{$rs->email}}</td>
                                                    <td>{{ Util::toView($rs->created_at) }}</td>
                                                    <td>Ativação Pendente</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    @else
                                        <p>Nenhuma indicação está pendente de ativação.</p>
                                    @endif
                                </div>
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

    <script src="{{ asset('/portal/lib/ckeditor/ckeditor.js') }}" type="text/javascript"></script>

@stop

