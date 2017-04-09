
{{-- Page title --}}
@section('title')
{{$data['title']}}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/select2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')

<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <br>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        {{$data['titles']}}
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_1">

                        <thead>
                            <tr>
                                <th>Sonhador</th>
                                <th>CPF</th>
                                <th>Plano</th>
                                <th>Título</th>
                                <th>Site</th>
                                <th>Início</th>
                                <th>Término</th>
                                <th>Qtd. Pedido Cota</th>
                                <th>Qtd. Aprovação Cota</th>
                                <th>Ver Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $rs)
                                <tr>
                                    <td>{{ ($rs->first_name . " " . $rs->last_name) }}</td>
                                    <td>{{ ($rs->cpf) }}</td>
                                    <td>{{ ($rs->plano) }}</td>
                                    <td>{{ ($rs->titulo_site) }}</td>
                                    <td>{{ URL::to('/') . "/sonhador/" . $rs->id }}</td>
                                    <td>{{ Util::toView($rs->dt_ini_veiculacao) }}</td>
                                    <td>{{ Util::toView($rs->dt_fim_veiculacao) }}</td>
                                    <td>{{ SiteCotaPedido::getTotalPedidoBySiteId($rs->id ) }}</td>
                                    <td>{{ SiteCotaPedido::getTotalVendidoBySiteId($rs->id ) }}</td>
                                    <td>
                                        {{ link_to('admin/site-cotas/' . $rs->id , 'ver', array('class' => 'btn btn-success btn-sm', 'title' => 'Ver')) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.tableTools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables/table-advanced.js') }}"></script>
@stop
