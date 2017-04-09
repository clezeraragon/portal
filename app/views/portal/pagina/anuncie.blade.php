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
                <h1>{{$data['title_pag']}}</h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">{{$data['title_pag']}}</li>
                </ol>
            </div>
        </div>
        <!-- header End -->

        <!-- data start -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- left sec start -->
                    <div class="col-md-11 col-sm-11 col-lg-11 mini-font anuncie-texto">
                        <div class="row">
                            <div class="col-sm-16 col-md-16 col-lg-16 col-xs-16">
                                <img src="{{asset('/portal/images/anuncie/menina_sonhadora.jpg')}}" width="1500"
                                     height="600" alt="" class=" text-center img-responsive"/>
                            </div>

                            <div class="col-sm-16 col-md-16 ">
                                <br>

                                <p>
                                    O Portal iSonhei tem como característica ser um facilitador de sonhos. Com isso
                                    disponibiliza aos usuários diversas possibilidades de encontrar empresas
                                    que contribuirão para a realização destes sonhos.
                                </p>

                                <p>
                                    Contate nossos consultores comerciais para conhecer as possibilidades de veiculação
                                    para sua empresa.
                                </p>
                                <br>
                                <br>
                            </div>

                            <div class="col-sm-16 col-md-16">
                                <div class="col-sm-8 col-md-8 col-xs-10">
                                    <div class="form-group">
                                        <strong style="color: #00a5e5;" class="">Telefone:&nbsp;</strong>
                                        {{--<div class="">--}}
                                            {{\Lang::get('general.empresa_telefone_venda')}}
                                        {{--</div>--}}
                                    </div>


                                </div>
                                <div class="col-sm-8 col-md-8 col-xs-10">
                                    <div class="form-group">
                                        <strong style="color: #00a5e5;" class="">E-mail:&nbsp;</strong>
                                        {{--<div class="">--}}
                                        {{\Lang::get('general.empresa_email_venda')}}
                                        {{--</div>--}}
                                    </div>


                                </div>



                            </div>

                        </div>
                    </div>
                    <!-- left sec end -->

                    <!-- right sec start -->
                    <div class="col-sm-5 hidden-xs right-sec">
                        <div class="bordered">
                            <div class="row ">
                                <div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s"
                                     data-wow-offset="150">
                                    <div class="table-responsive">
                                        @include('elements.menu-lateral.facebook')
                                        @include('elements.menu-lateral.instagram')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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