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
                <li class="active">Resultado da Busca</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data start -->
    <section>
        <div class="container ">
            <div class="row ">
                <!-- left sec start -->
                <div class="col-md-11 col-sm-11">
                    <div class="row">
                        <div class="col-sm-16">
                            <h3>Desculpe sua busca não retornou nenhum resultado:</h3>
                        </div>
                        <div class="col-sm-16">
                            <ul class="icn-list">
                                <li>Verifique a ortografia.</li>
                                <li>Tente palavras mais gerais.</li>
                                <li>Busque por sinônimos.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        {{$conteudos->links()}}
                    </div>
                </div>
                <!-- left sec end -->

                <!-- right sec start -->
                @include('elements.menu-lateral.dinamico.banner-dinamico-sonhador')
                {{--<div class="col-sm-5 hidden-xs right-sec">--}}
                    {{--<div class="bordered">--}}
                        {{--<div class="row ">--}}
                            {{--<div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="150">--}}
                                {{--<div class="table-responsive">--}}
                                {{--Menu Lateral--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!-- data end -->
</div>
<!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop