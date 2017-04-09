
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

                        <a href="/sonhador/{{$siteid}}" class="btn btn-success">Visualizar o site</a>

                        <a href="{{ URL::to($data['route'] . "/" . $siteid . '/create') }}" class="btn btn-primary"></span>Adicionar Foto</a>
                        <hr>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th width="30%;">Foto</th>
                                <th width="50%;">Título</th>
                                <th width="10%;">Editar</th>
                                <th width="10%;">Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($result as $rs)
                                <tr>
                                    <td><img src="{{ asset($rs->path_img) }}" width="200"></td>
                                    <td>{{ ($rs->titulo) }}</td>
                                    <td>
                                        {{ link_to($data['route'] . "/" . $siteid . '/' . $rs->id . '/edit', 'Editar', array('class' => 'btn btn-warning btn-sm', 'title' => 'Editar')) }}</td>
                                    </td>
                                    <td>
                                        {{ Form::open(array('url' => $data['route'] . "/" . $siteid . '/' . $rs->id, 'method' => 'delete')) }}
                                        {{ Form::button('Apagar', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Apagar')) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

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

