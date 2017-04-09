
<div id="log-in" class="white-popup-login mfp-with-anim mfp-hide">

    {{--<section id="log-in">--}}
    <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form" id="ajaxform" name="ajax">
        <h3>Faça seu login</h3>
        <hr>
        <p>
            {{--{{ Session::get('success') }}--}}

        </p>
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <div class="row">
            <div class="form-group">
                <input id="email" name="email" required type="email" class="form-control" placeholder="E-mail"
                       tabindex="3"/>

                <div class="col-sm-16" id="email-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input id="password" name="password" class="form-control " required type="password"
                       placeholder="Senha" tabindex="4"/>

                <div class="col-sm-16" id="password-errors"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-16">
                <input type="submit" value="Entrar" class="btn btn-primary btn-block btn-lg" tabindex="7">
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-xs-5" style="right: 0px;left: 19px; font-size: 12px; color:#4f4f4f;">
            <p class="change_link" >
                <a class="open-popup-link" href="#ativar" data-effect="mfp-zoom-in">
                    Ativar Conta
                </a>
            </p>
        </div>
        <div class="col-xs-5 col-xs-pull-right"style="right: 0px;left: 40px;">
            <div id="circularG">
                <div id="circularG_1" class="circularG">
                </div>
                <div id="circularG_2" class="circularG">
                </div>
                <div id="circularG_3" class="circularG">
                </div>
                <div id="circularG_4" class="circularG">
                </div>
                <div id="circularG_5" class="circularG">
                </div>
                <div id="circularG_6" class="circularG">
                </div>
                <div id="circularG_7" class="circularG">
                </div>
                <div id="circularG_8" class="circularG">
                </div>
            </div>
        </div>
        <div class="col-xs-5 col-xs-pull-right" style="right: 0px;left: 19px; font-size: 12px; color:#4f4f4f;">
            <p class="change_link" >
                <a class="open-popup-link" href="#forgot" data-effect="mfp-zoom-in">
                    Lembrar Senha
                </a>
            </p>
        </div>
    </div>

</div>


