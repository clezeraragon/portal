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

        <!-- data Start -->
        <section>
            <div class="container ">
                <div class="row ">
                    <!-- left sec Start -->
                    <div class="col-sm-16">
                        <div class="row">

                            <div class="col-md-16 col-sm-16 col-xs-16 wrong-page wow fadeInDown animated">

                                @if($errors->first('email'))

                                    <div class="text-center"><span
                                                style="display: inline-block !important;">{{HTML::image('/portal/images/newsletter/icone-404.jpg', 'Loja de produtos', array('class'=>'match-height img-responsive','width'=>'192','height'=>'192'))}}</span>
                                        <br>
                                        <br>

                                        <div class="text-center">
                                            {{--{{$errors->first('email')}}--}}
                                            <p>Seu e-mail já está cadastrado no Portal iSonhei.</p>
                                        </div>
                                    </div>

                                @else
                                    <div class="text-center">
                                        <h3>Em breve você receberá informações do iSonhei.</h3>
                                        <br>

                                        <p></p>

                                        <p><strong style="color: #00a5e5">ATENÇÃO:</strong> Você ainda não é
                                            cadastrado no Portal.</p>

                                        <p>Para se tornar um cadastrado é preciso o preenchimento do formulário. <a
                                                    class="open-popup-link"
                                                    href="#create-account"
                                                    data-effect="mfp-zoom-in"
                                                    rel="nofollow"><strong style="color: #00a5e5"> Cadastre-se!</strong>
                                            </a></p>
                                    </div>
                                    <br>
                                    <div class="text-center"><span
                                                style="display: inline-block !important;">{{HTML::image('/portal/images/newsletter/icon-success.jpg', 'Loja de produtos', array('class'=>'match-height img-responsive','width'=>'192','height'=>'192'))}}</span>
                                    </div>
                                @endif


                            </div>
                            <div class="text-center"><a class="btn btn-danger" href="{{Route("portal")}}">Voltar</a>
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

