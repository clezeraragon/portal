<footer>
    <div class="top-sec">
        <div class="container ">
            <div class="row match-height-container">
                <div class="row col-sm-16 col-md-16">
                    <!--   NEWS LETTHER DISPOSITIVO MOVEL -->
                    <div class="col-sm-16  hidden-md hidden-lg subscribe-info-movel wow fadeInDown animated"
                         data-wow-delay="1s"
                         data-wow-offset="40">
                        <div class="row">
                            <div class="col-sm-16 hidden-md ">
                                <a class="open-popup-link"
                                   href="#create-account"
                                   data-effect="mfp-zoom-in"
                                   rel="nofollow" title="cadastre-se">
                                    <div class="f-title">CADASTRE-SE NO ISONHEI</div>
                                    <p style="text-justify: auto">
                                        Somente o cadastrado pode usufruir de vantagens diferenciadas como promoções, eventos,
                                        criação de sites, programa de pontuação e muito mais. Aproveite e faça o seu cadastro agora mesmo!
                                    </p>
                                </a>
                            </div>
                            <div class="col-sm-16 hidden-md ">

                                <div class="f-title">RECEBA NOSSA NEWSLETTER</div>

                                <form action="{{ route('newsletter') }}" autocomplete="on" method="post" role="form"
                                      class="form-inline">
                                    <!-- CSRF Token -->
                                    <input type="email" class="form-control" id="email" placeholder="Insira seu e-mail">
                                    <button type="submit" class="btn">
                                        <span class="ion-paper-airplane text-danger"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!--   FIM NEWS LETTHER DISPOSITIVO MOVEL -->
                    </div>
                    <!--   NEWS LETTHER  -->
                    <div class=" col-sm-2 col-md-5 hidden-sm hidden-xs subscribe-info wow fadeInDown animated"
                         data-wow-delay="1s"
                         data-wow-offset="40">
                        <div class="row">
                            <div class="col-sm-16">
                                <a class="open-popup-link"
                                   href="#create-account"
                                   data-effect="mfp-zoom-in"
                                   rel="nofollow" title="cadastre-se">
                                    <div class="f-title">CADASTRE-SE NO ISONHEI</div>
                                    <p style="text-justify: auto">
                                        {{--criação de sites, programa de pontuação--}}
                                        Somente o cadastrado pode usufruir de vantagens diferenciadas como promoções, eventos
                                        e muito mais. Aproveite e faça o seu cadastro agora mesmo!
                                    </p>
                                </a>
                            </div>
                            <div class="col-sm-16">

                                <div class="f-title">RECEBA NOSSA NEWSLETTER</div>

                                {{ Form::open(array('url' => route('newsletter') ,'method'=> 'post' ,'class' => 'form-horizontal')) }}
                                {{Form::text('email','',array('class' => 'form-control','placeholder'=>'Insira seu e-mail','required'))}}

                                <div class="row col-md-16">
                                    {{ $errors->first('email', '<span class="text-danger" style="font:status-bar;">:message</span>') }}
                                </div>
                                <button type="submit" class="btn">
                                    <span class="ion-paper-airplane text-danger"></span>
                                </button>
                                {{Form::close()}}
                            </div>
                        </div>

                        <!--   FIM NEWS LETTHER  -->
                    </div>
                    <!--   MENU COLUNA 2-->
                    <div class="col-sm-6 col-md-4 subscribe-info recent-posts  wow fadeInDown animated"
                         data-wow-delay="1s" data-wow-offset="40">
                        <div class="f-title"></div>
                        <ul class=" list-unstyled ">
                            <li>
                                <div class="row">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <a href="{{URL::to('/')}}" title="iSonhei">
                                                <h4 class="text-left">HOME</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-16 col-sm-offset-3">
                                            <a href="{{route('guia-de-empresas-categorias')}}" title="Guia de Fornecedores">
                                                <h4 class="text-left">FORNECEDORES</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{--<li>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-16 ">--}}
                                        {{--<div class="col-sm-16 col-sm-offset-3">--}}
                                            {{--<a href="{{route('site-sonhador-cadastro')}}" title="Crie seu site grátis">--}}
                                                {{--<h4 class="text-left">CRIE SEU SITE GRÁTIS</h4>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-16 ">--}}
                                        {{--<div class="col-sm-16 col-sm-offset-3">--}}
                                            {{--<a href="{{route('page-fidelidade')}}" title="iSonhei Club">--}}
                                                {{--<h4 class="text-left">ISONHEI CLUB</h4>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            <li>
                                <div class="row" id="cadastro">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-16 col-sm-offset-3">
                                            <a class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in"
                                               rel="nofollow">
                                                <h4 class="text-left">CADASTRE-SE</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-16 col-sm-offset-3">
                                            <a href="{{route('page-termo')}}" title="Termos de uso">
                                                <h4 class="text-left">TERMOS E POLÍTICAS</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{--<li>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-16 ">--}}
                            {{--<div class="col-sm-16 col-sm-offset-3">--}}
                            {{--<a href="{{URL::to('/')}}/assets/download/midiakit/Midia_Kit_iSonhei.pdf" download rel="nofollow">--}}
                            {{--<h4 class="text-left">MÍDIA KIT</h4>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</li>--}}


                        </ul>
                    </div>
                    <!--   FIM MENU COLUNA 2-->
                    <!--   MENU COLUNA 3-->
                    <div class="col-sm-6 col-md-4 recent-posts  wow fadeInDown animated" data-wow-delay="1s"
                         data-wow-offset="40">
                        <div class="f-title"></div>
                        <ul class=" list-unstyled ">

                            {{--<li>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-16 ">--}}
                            {{--<div class="col-sm-16 col-sm-offset-3">--}}
                            {{--<a href="{{route('page-termos-iSonhei-Club')}}"--}}
                            {{--title="Termos do iSonhei Club">--}}
                            {{--<h4 class="text-left">TERMOS DO ISONHEI CLUB</h4>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</li>--}}
                            <li>
                                <div class="row">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-10 col-sm-offset-3">
                                            <a href="{{route('page-sobre')}}" title="Sobre">
                                                <h4 class="text-left">SOBRE</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <a href="{{route('page-contato')}}" title="Contato">
                                                <h4 class="text-left">CONTATO</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <a href="{{route('page-anuncie')}}" title="Anuncie">
                                                <h4 class="text-left">ANUNCIE</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <a href="https://www.facebook.com/isonhei" target="_blank">
                                                <h4 class="text-left">FACEBOOK</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <a href="https://www.youtube.com/user/iSonhei" target="_blank">
                                                <h4 class="text-left">YOUTUBE</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-16 ">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <a href="http://instagram.com/portal_isonhei" target="_blank">
                                                <h4 class="text-left">INSTAGRAM</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <!--   FIM MENU COLUNA 3 -->
                    <!--   LOGO ISONHEI -->
                    <div class="col-sm-2 col-md-1 hidden-xs
                         wow fadeInDown animated animated animated logo-footer hidden-sm"
                         data-wow-delay="1s" data-wow-offset="40" style="left: 35px;top: 137px;">

                        <div class="row">
                            <div class="col-sm-8"><img
                                        src="{{asset('/portal/images/footer-recent/logo_isonhei_branco.png')}}" width="150"
                                        height="95" alt="iSonhei"/></div>

                        </div>

                    </div>
                    <!--   FIM LOGO  -->
                    <!--   LOGO ISONHEI MOVEL -->
                    <div data-wow-offset="40" data-wow-delay="1s"
                         class="col-sm-2 col-md-2 hidden-xs hidden-lg hidden-md logo-footer-movel
                          wow fadeInDown animated animated animated  animated">

                        <div class="row">
                            <div class="col-sm-8"><img
                                        src="{{asset('/portal/images/footer-recent/logo_isonhei_branco.png')}}" width="150"
                                        height="95" alt="iSonhei"/>
                            </div>

                        </div>

                    </div>
                    <!--   FIM LOGO MOVEL -->
                </div>

            </div>
        </div>

        <div class="btm-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-16 ">
                        <!-- texto rodape do footer -->
                        <div class="col-md-16 hidden-xs  copyrights text-center wow fadeInDown animated"
                             data-wow-delay="0.5s" data-wow-offset="10">
                            © 2015 iSonhei - O portal para quem quer realizar sonhos! - Todos os direitos reservados.
                        </div>
                        <!-- fim texto footer -->
                        <!-- texto footer mobile -->
                        <div class="col-xs-16 copyrights-movel hidden-md hidden-sm hidden-lg text-center wow fadeInDown animated"
                             data-wow-delay="0.5s" data-wow-offset="10">
                            © 2015 iSonhei - O portal para quem quer realizar sonhos! - Todos os direitos reservados.
                        </div>
                        <!-- fim texto footer mobile -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


