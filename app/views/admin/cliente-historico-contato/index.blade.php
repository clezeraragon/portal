
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

            <a href="{{ URL::to(Route("form-cad-cliente-historico-contato", $cliente_id)) }}" class="btn btn-success navbar-left btn_novo"><span class="glyphicon glyphicon-plus-sign"></span> Novo</a>
            <a href="{{ URL::to("admin/cliente") }}" class="btn btn-info navbar-right btn_voltar"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>

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
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Usuário Responsável</th>
                                <th>Mensagem</th>
                                <th>Criado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $rs)
                                <tr>
                                    <td>{{ ($rs->id) }}</td>
                                    <td>{{ ($rs->cliente) }}</td>
                                    <td>{{ ($rs->usuario) }}</td>
                                    <td>{{ ($rs->mensagem) }}</td>
                                    <td>{{ Util::toTimestamps($rs->created_at) }}</td>
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