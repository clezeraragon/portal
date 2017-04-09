
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

            <a href="{{ URL::to($data['route'] . '/create') }}" class="btn btn-success navbar-left btn_novo"><span class="glyphicon glyphicon-plus-sign"></span> Novo</a>

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
                                <th>Perfil</th>
                                <th>Descrição</th>
                                <th>Acesso Admin</th>
                                <th>Criado</th>
                                <th>Modificado</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perfis as $perfil)
                            <tr>
                                <td>{{ ($perfil->perfil) }}</td>
                                <td>{{ ($perfil->descricao) }}</td>
                                <td>{{ Util::formatBoolean($perfil->st_admin) }}</td>
                                <td>{{ Util::toTimestamps($perfil->created_at) }}</td>
                                <td>{{ Util::toTimestamps($perfil->updated_at) }}</td>
                                <td>
                                    {{ link_to($data['route'] . '/' . $perfil->id . '/edit', 'Editar', array('class' => 'btn btn-warning btn-sm', 'title' => 'Editar')) }}
                                </td>
                                <td>
                                    {{ Form::open(array('url' => $data['route'] . '/' . $perfil->id, 'method' => 'delete')) }}
                                    {{ Form::button('Excluir', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Excluir')) }}
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