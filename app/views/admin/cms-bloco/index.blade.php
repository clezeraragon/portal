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
                <hr>
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
                                <th>Nome</th>
                                <th>identificação</th>
                                <th>Qtd. Itens</th>
                                <th>descrição</th>
                                <th>Criado</th>
                                <th>Editar</th>
                                {{--{{dd($result)}}--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($result as $rs)
                                <tr>
                                    <td>{{ ($rs->nome) }}</td>
                                    <td>{{ ($rs->identificacao) }}</td>
                                    <td>{{ ($rs->qtd_itens) }}</td>
                                    <td>{{ ($rs->descricao) }}</td>
                                    <td>{{ Util::toTimestamps($rs->updated_at) }}</td>
                                    <td>
                                        @if($rs->tipo == 'materia')
                                            {{ link_to($data['route'] . '/' . $rs->id . '/edit-materia', 'Editar', array('class' => 'btn btn-warning btn-sm', 'title' => 'Editar')) }}
                                        @else
                                            {{ link_to($data['route'] . '/' . $rs->id . '/edit-video', 'Editar', array('class' => 'btn btn-warning btn-sm', 'title' => 'Editar')) }}
                                        @endif
                                    </td>
                                    </td>

                                    {{ Form::close() }}

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
