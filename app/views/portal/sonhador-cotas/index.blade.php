
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />

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
                <li class="active">{{$data['title_pag']}}</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container">
            <div class="row">
                <!-- left sec Start -->
                <div class="col-sm-16">
                    <div class="row">

                        <a href="/sonhador/{{$siteid}}/#3" class="btn btn-success">Visualizar o site</a>

                        <a href="{{ URL::to($data['route'] . "/" . $siteid . '/create') }}" class="btn btn-primary"></span>Adicionar Cota</a>
                        <hr>
                        <div class="table-responsive">
                        <table class="table table-striped table-condensed table-bordered col-sm-of" id="sample_1">

                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Produto</th>
                                <th>Qtd. Cota</th>
                                <th>Valor Unit.</th>
                                <th>Valor Total</th>
                                <th>Status</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($result as $rs)
                                <tr>
                                    <td><img  src="{{ asset($rs->path_img) }}" width="200"></td>
                                    <td>{{ ($rs->produto) }}</td>
                                    <td>{{ ($rs->qtd_cota) }}</td>
                                    <td>{{ Util::number($rs->vl_unit, 2) }}</td>
                                    <td>{{ Util::number($rs->vl_total, 2) }}</td>
                                    <td>{{ Util::formatStatus($rs->status) }}</td>
                                    <td>
                                        {{ link_to($data['route'] . "/" . $siteid . '/' . $rs->id . '/edit', 'Editar', array('class' => 'btn btn-warning btn-sm', 'title' => 'Editar')) }}</td>
                                    </td>
                                    <td>
                                        @include('elements.modal-confirm-sonhador.confirm-delete')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

    <script src="{{ asset('/portal/lib/ckeditor/ckeditor.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/portal/lib/jscolor/jscolor.js') }}" type="text/javascript"></script>

    <script>
        $(window).load(function() {
            var id = window.location.hash;
            //alert(id);
            $(id).focus();
        });
    </script>

@stop

