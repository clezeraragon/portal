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
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"
          media="screen"/>
    <link href="{{ asset('assets/vendors/touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet"
          type="text/css" media="all"/>
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
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Anúncio</th>
                                <th>Usuário</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Assunto</th>
                                <th>Mensagem</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $rs)
                                    <tr>
                                        <td>{{ ($rs->id) }}</td>
                                        <td>{{ ($rs->cliente) }}</td>
                                        <td>{{ $rs->categoria . " - " . $rs->guia_cidade }}</td>
                                        <td>{{ $rs->usuario }}</td>
                                        <td>{{ $rs->nome }}</td>
                                        <td>{{ $rs->email }}</td>
                                        <td>{{ $rs->telefone }}</td>
                                        <td>{{ $rs->assunto }}</td>
                                        <td>{{ $rs->mensagem }}</td>
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
    <!--time picker-->
    <script src="{{ asset('assets/vendors/timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <!--datetime picker-->
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}"
            charset="UTF-8"></script>
    <script type="text/javascript"
            src="{{ asset('assets/vendors/datetimepicker/js/locales/bootstrap-datetimepicker.pt-BR.js') }}"
            charset="UTF-8"></script>
    <!--touchspin-->
    <script src="{{ asset('assets/vendors/touchspin/dist/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/table-advanced.js') }}"></script>
    <script>
        $(".form_datetime3").datetimepicker({
            language: 'pt-BR',
            format: "yyyy-mm-dd",
            timepicker: false,
            autoclose: true,
//            todayBtn: true,
            pickTime: false,
            startDate: "2015-01-01"
//            minuteStep: 10

        });


    </script>
@stop
