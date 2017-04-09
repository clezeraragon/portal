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
                <h1>
                    @if(isset($data['cat_filha_nome']))
                        {{$data['cat_filha_nome']}}
                    @else
                        {{$data['cat_pai_nome']}}
                    @endif
                </h1>

                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>

                    @if(isset($data['cat_filha_nome']))
                        <li><a href="/{{$data['cat_pai_url']}}">{{$data['cat_pai_nome']}}</a></li>
                        <li class="active">{{$data['cat_filha_nome']}}</li>
                    @else
                        <li class="active">{{$data['cat_pai_nome']}}</li>
                    @endif
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

                            @if(count($conteudos))
                                @foreach($conteudos as $content)

                                    <div class="sec-topic col-sm-16 col-md-8 wow fadeInDown animated" data-wow-delay="0.5s">
                                        @if(File::exists(public_path().$content["path_img"].$content["id"].'/'.$content["nome_img"]))
                                            {{
                                               HTML::decode(HTML::link($content["url"],
                                                   HTML::image($content["path_img"].$content["id"].'/'.'365x220_'.$content["nome_img"], $content["titulo"], array('class'=>'img-thumbnail conteudo-categoria-img')),
                                                   array('rel' => 'nofollow')))
                                            }}
                                        @else
                                            {{
                                                HTML::decode(HTML::link($content["url"],
                                                    HTML::image($content["path_img"].$content["id"].'/'.$content["nome_img"], $content["titulo"], array('class'=>'img-thumbnail conteudo-categoria-img')),
                                                    array('rel' => 'nofollow')))
                                            }}
                                        @endif

                                        <h3 class="conteudo-categoria-titulo">{{HTML::link($content["url_conteudo"],$content["titulo"])}}</h3>
                                        {{--<hr>--}}
                                        <p class="conteudo-categoria-introducao"> {{$content["introducao"]}}</p>

                                    </div>

                                @endforeach
                            @else
                                <p>Não há conteúdo vinculado a esta categoria.</p>
                            @endif

                        </div>
                        <div class="row">
                            {{$conteudos->links()}}
                        </div>
                    </div>
                    <!-- left sec end -->

                    <!-- right sec start -->
                    @include('elements.menu-lateral.dinamico.banner-dinamico')
                    {{--<div class="col-sm-5 hidden-xs right-sec">--}}
                    {{--<div class="bordered">--}}
                    {{--<div class="row ">--}}
                    {{--<div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s"--}}
                    {{--data-wow-offset="150">--}}
                    {{--<div class="table-responsive">--}}
                    {{--Menu Lateral--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{----}}
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