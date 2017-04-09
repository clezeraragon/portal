
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
                <li class="active">Resgates</li>
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
                                <h3>Resgates</h3>

                                @if(count($resgates)>0)
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Produto</th>
                                            <th>Pontos</th>
                                            <th>Data</th>
                                            <th>Situação do Pedido</th>
                                            <th>Cód. de Rastreamento</th>
                                            <th>Frete</th>
                                        </thead>
                                        <tbody>
                                            @foreach($resgates as $resgate)
                                                <tr>
                                                    <td>{{$resgate->produto}}</td>
                                                    <td>{{ Util::number($resgate->pontos, 0, '.',',')}}</td>
                                                    <td>{{ Util::toView($resgate->created_at) }}</td>
                                                    <td>{{$resgate->status_resgate}}</td>
                                                    <td>
                                                        {{$resgate->codigo_rastreio}}
                                                        @if($resgate->produto_tipo_id == 2)
                                                            <a class="gtn btn-xs btn-success" href="{{URL::to('/') . $resgate->path_arquivo}}" download rel="nofollow">DOWNLOAD</a>
                                                        @endif
                                                    </td>
                                                    <td>R$ {{ Util::number($resgate->frete, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                @else
                                    <p>Nenhum resgate registrado</p>
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

