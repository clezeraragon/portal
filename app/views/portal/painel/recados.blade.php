
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
                <li class="active">Mural de recados</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-md-4 col-xs-16 ">
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
                                <h3>Mural de Recados</h3>

                                @if(count($recados) > 0)

                                    {{ Form::open(array('url' => '', 'method' => 'put', 'class' => 'form-horizontal')) }}

                                        <table class="table table-bordered">
                                            <thead>
                                                <th>Site</th>
                                                <th>Usuário</th>
                                                <th>Mensagem</th>
                                            </thead>
                                            <tbody>
                                                @foreach($recados as $recado)
                                                    <tr>
                                                        <td>{{$recado->titulo_site}}</td>
                                                        <td>{{$recado->nome}}</td>
                                                        <td>{{$recado->recado}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>

                                    {{ Form::close() }}

                                @else
                                    <p>Nenhum recado registrado</p>
                                @endif
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

