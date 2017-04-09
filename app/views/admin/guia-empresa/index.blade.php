
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
                                <th>Cliente</th>
                                <th>Cidade</th>
                                <th>Categoria</th>
                                <th>Plano</th>
                                <th>Descrição</th>
                                <th>URL</th>
                                <th>Qtd. Imagem</th>
                                <th>Qtd. Vídeo</th>
                                <th>Status</th>
                                <th>Modificado</th>
                                <th>Galeria de Fotos</th>
                                <th>Galeria de Vídeos</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $rs)
                                <tr>
                                    <td>{{ ($rs->nome_fantasia) }}</td>
                                    <td>{{ ($rs->cidade) }}</td>
                                    <td>{{ ($rs->categoria) }}</td>
                                    <td>{{ ($rs->plano) }}</td>
                                    <td>{{ ($rs->descricao) }}</td>
                                    <td>{{ ($rs->url) }}</td>
                                    <td>{{ ($rs->qtd_imagem) }}</td>
                                    <td>{{ ($rs->qtd_video) }}</td>
                                     <td>{{ Util::formatStatus($rs->status) }}</td>
                                    <td>{{ Util::toTimestamps($rs->updated_at) }}</td>
                                    <td>
                                        {{ link_to($data['route'] . '/' . $rs->id . '/fotos', 'Galeria de Fotos', array('class' => 'btn btn-warning btn-sm', 'title' => 'Galeria de Fotos')) }}</td>
                                    </td>
                                    <td>
                                        {{ link_to($data['route'] . '/' . $rs->id . '/videos', 'Galeria de Vídeos', array('class' => 'btn btn-warning btn-sm', 'title' => 'Galeria de Vídeos')) }}</td>
                                    </td>
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
