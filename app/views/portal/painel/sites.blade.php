
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
                <li class="active">Meus Sites</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-md-4 col-xs-16">
                    <div class="bordered">
                        <div class="row ">

                            @include("portal.painel.menu_lateral")

                        </div>
                    </div>
                </div>

                <!-- left sec Start -->
                <div class="col-md-12 col-sm-12 col-xs-16">
                    <div class="bordered painel_box_conteudo">
                        <div class="row">
                                <h3>Meus Sites</h3>

                                @if(count($sites) > 0)
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Site</th>
                                            <th>Link</th>
                                            <th>Data Criação</th>
                                            <th>Expira</th>
                                            <th colspan="2">Admin</th>
                                        </thead>
                                        <tbody>
                                            @foreach($sites as $site)
                                                <tr>
                                                    <td>
                                                        {{$site->titulo_site}}
                                                    </td>
                                                    <td>
                                                        {{ Route('site-do-sonhador', $site->id)}}
                                                    </td>
                                                    <td>{{ Util::toView($site->dt_ini_veiculacao) }}</td>
                                                    <td>{{ Util::toView($site->dt_fim_veiculacao) }}</td>
                                                    <td>
                                                        <a href="/site-sonhador/construtor/{{$site->id}}" class="btn btn-xs btn-success">Editar</a>
                                                    </td>
                                                    <td>
                                                        <a href="/sonhador/{{$site->id}}" class="btn btn-xs btn-primary">Visualizar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                @else
                                    <p>Nenhum site cadastrado.</p>
                                    <a href="{{ Route('site-sonhador-cadastro') }}" class="btn btn-primary btn-md"></span>Criar Site</a>
                                @endif
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

    <script type="text/javascript">

        $(document).ready(function(){
            $("#cpf").inputmask("999.999.999-99");
        });

    </script>

@stop

