
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
    <div id="notification"></div>

    <!-- header Start -->
    <div class="container">
        <div class="page-header">
            <h1>{{$data['title_pag']}} </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('portal') }}">Home</a></li>
                <li><a href="{{ route('portal-painel') }}">Painel</a></li>
                <li class="active">Cotas</li>
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
                    <div class="bordered">
                        <div class="row painel_box_conteudo">
                                <h3>Cotas</h3>

                                @if(count($cotas) > 0)
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Site</th>
                                            <th>Cota</th>
                                            <th>Valor</th>
                                            <th>Data</th>
                                            <th>status</th>
                                            <th>Comprador</th>
                                            <th>Mensagem</th>
                                        </thead>
                                        <tbody>
                                            @foreach($cotas as $cota)
                                                <tr>
                                                    <td>{{$cota->titulo_site}}</td>
                                                    <td>{{$cota->cota}}</td>
                                                    <td>R$ {{Util::number($cota->vl_total, 2)}}</td>
                                                    <td>{{Util::toView($cota->data_compra)}}</td>
                                                    <td>{{$cota->ps_status}}</td>
                                                    <td>{{$cota->nome}}</td>
                                                    <td>{{$cota->mensagem}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                @else
                                    <p>Nenhuma cota disponível</p>
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

