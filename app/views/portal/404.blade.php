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

    <!-- data Start -->
    <section>
        <div class="container ">
            <div class="row ">
                <!-- left sec Start -->
                <div class="col-sm-16">
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-md-offset-4 col-sm-offset-4 wrong-page wow fadeInDown animated">
                            <div class="text-center">
                                <h1>Lamentamos</h1>
                                <p>
                                    Infelizmente, a página que você buscou não foi encontrada.
                                    <br>
                                    Você pode ter acessado um link antigo.
                                </p>
                                <p>
                                    Todo conteúdo está disponível na nova versão do Portal.
                                    <br>
                                    Navegue pelos botões acima e siga em busca da realização dos seus sonhos.
                                </p>
                            </div>
                            <br>
                            <center>
                                {{--<span class="ion-sad wrong-icon "></span>--}}
                                {{HTML::image("/portal/images/icone-404.jpg", '404', array('class'=>'img-responsive'))}}
                            </center>
                            <br><br>
                            <div class="text-center">
                                <a class="btn btn-danger"  href="{{Route("portal")}}">Página Inicial</a>
                            </div>
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

@stop

