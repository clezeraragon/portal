
{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')


@stop

{{-- Page content --}}
@section('conteudo')

<!-- conteudo Start -->
<div class="container">

    @include('notifications')
    <div id="notification"></div>

    <!-- header Start -->
    <div class="container">
        <div class="page-header">
            <h1>{{$data['title_pag']}} </h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">{{$data['title_pag']}}</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container ">
            <div class="row ">
                <!-- left sec Start -->
                <div class="col-sm-16">
                    <div class="row">

                        @if(count($categorias))

                            @foreach($categorias as $categoria)

                                <div class="col-sm-4 guia-categoria-box">
                                    {{
                                        HTML::decode(
                                            HTML::link(Route("get-guia-de-empresas-filtro", array($categoria["url"], "todas-cidades")),
                                                HTML::image($categoria["path_img"], $categoria['nome'], array('class'=>'img-thumbnail'))
                                            )
                                        )
                                    }}
                                    <h1 class="guia_categoria_nome">{{$categoria['nome']}}</h1>

                                </div>

                            @endforeach

                        @else
                            <p>Nenhuma categoria encontrada.</p>
                        @endif

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

@stop

