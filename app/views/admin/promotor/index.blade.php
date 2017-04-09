{{-- Page title --}}
@section('title')
    {{$data['title']}}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/select2.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')

    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <a href="{{ URL::to($data['route'] . '/create') }}" class="btn btn-success navbar-left btn_novo">
                    <span class="glyphicon glyphicon-plus-sign"></span> Novo
                </a>

                <a href="{{ Route("relatorio-promotor") }}" class="btn btn-info navbar-left btn_novo" style="margin-left:10px;">Relatório</a>

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
                                <th>Promotor</th>
                                <th>Proprietário</th>
                                <th>Cliente</th>
                                <th>Observação</th>
                                <th>Status</th>
                                <th>Data de criação</th>
                                <th>Status de aceitação do termo</th>
                                <th>Data de ativação</th>
                                <th>Editar</th>
                                <th>Excluir</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($result as $rs)

                                <tr>
                                    <td>{{ $rs->promo }}</td>
                                    <td>{{ $rs->propri }}</td>
                                    <td>{{ $rs->cliente }}</td>
                                    <td>{{ $rs->observacao }}</td>
                                    <td>{{ ($rs->status == '1') ? 'Ativo' : 'Inativo' }}</td>
                                    <td>{{ Util::toTimestamps($rs->created_at) }}</td>
                                    <td>{{ ($rs->st_aceite_termo == '1') ? 'Aceito' : 'Pendente' }}</td>
                                    <td>{{ ($rs->dt_aceite) ? Util::toTimestamps($rs->dt_aceite) : '' }}</td>
                                    <td>
                                        {{ link_to($data['route'] . '/' . $rs->id . '/edit', 'Editar', array('class' => 'btn btn-warning btn-sm', 'title' => 'Editar')) }}</td>
                                    </td>
                                    <td>
                                        {{ Form::open(array('url' => $data['route'] . '/' . $rs->id, 'method' => 'delete', 'data-confirm' => 'Deseja realmente excluir o registro selecionado?')) }}
                                        {{ Form::button('Apagar', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Apagar')) }}
                                        {{ Form::close() }}
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
