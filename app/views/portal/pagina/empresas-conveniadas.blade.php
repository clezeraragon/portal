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

        <!-- data start -->
        <section>
            <div class="container ">
                <div class="row ">

                    <!-- left sec start -->
                    <div class="col-md-16 col-sm-16">
                        <div class="row">
                            <Style>
                                .img-apoiadores{
                                    padding: 60px;
                                }
                            </Style>
                            @foreach($path_empresas as $emp)
                                {{--{{dd($emp)}}--}}
                                <div class="col-md-4 col-sm-4" style="height: 150px; background: #FFFFFF; padding: 10px;">
                                    {{HTML::image((string)$emp,'',array('class'=>'img-apoiadores'))}}
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- left sec end -->

                </div>
                <!-- left sec end -->


            </div>

        </section>
        <!-- data end -->
    </div>
    <!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script>

        $('#cadastro').click(function () {
            $.get("/metrica/site", { pagina:"apresentacao-turismo", metrica: "cadastro"});
        });

    </script>

@stop