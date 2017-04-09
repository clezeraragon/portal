
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
            <h2>{{$site->titulo_site}}</h2>
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
                                <th>Pedido</th>
                                <th>Comprador</th>
                                <th>CPF</th>
                                <th>Data da Compra</th>
                                <th>Valor</th>
                                <th>Validado em</th>
                                <th>Forma de Pagamento</th>
                                <th>Status do PagSeguro</th>
                                <th>Cota</th>
                                <th>Resgatado</th>
                                <th>Atualizar Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedido_cotas as $rs)
                                <tr>
                                    <td>{{ ($rs->id) }}</td>
                                    <td>{{ ($rs->nome) }}</td>
                                    <td>{{ ($rs->cpf) }}</td>
                                    <td>{{ Util::toTimestamps($rs->created_at) }}</td>
                                    <td>R$ {{ Util::number($rs->vl_total, 2) }}</td>
                                    <td>Definir</td>
                                    <td>{{ ($rs->forma_pagamento) }}</td>
                                    <td>{{ ($rs->ps_status) }}</td>
                                    <td>{{ ($rs->produto) }}</td>
                                    <td>{{ Util::formatBoolean($rs->resgatado) }}</td>
                                    <td>
                                        @if(isset($rs->ps_cod_transacao))
                                            {{ link_to('admin/site-pagseguro-consulta-transacao/' . $rs->ps_cod_transacao, 'Atualizar', array('class' => 'btn btn-success btn-sm', 'title' => 'Atualizar', 'target' => '_blank')) }}
                                        @else
                                            Compra não finalizada
                                        @endif
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
