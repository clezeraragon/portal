<div class="panel-body">
    {{--<div class="col-sm-16">--}}
    <div class="form-group">
        <a rel="nofollow" class="open-popup-link" href="#compartilhe" data-effect="mfp-zoom-in">
            <div class="col-sm-2 col-md-2 col-xs-1 posicao">
                <span style="font-size:25px;" class="ion-email"></span>
            </div>
            <div class="col-sm-14 col-sm-pull-1 col-md-14 col-xs-15" style="top:6px;">

                <span style="margin: 15px;"> enviar a um amigo</span>
            </div>
        </a>
    </div>

    {{--</div>--}}
</div>

<div id="compartilhe" class="white-popup-login mfp-with-anim mfp-hide">

    <form action="{{ route('compartilhe') }}" autocomplete="on" method="post">
        <h3>Compartilhe</h3>
        <hr>
        <p>

        </p>
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <input type="hidden" name="nomeEmpresa"
               value="{{ isset($anuncio['nm_nome_fantasia']) ? $anuncio['nm_nome_fantasia'] : ''}}"/>

        <input type="hidden" name="idEmpresa"
               value="{{ isset($anuncio['guia_empresa_id']) ? $anuncio['guia_empresa_id'] : ''}}"/>

        <div class="row">
            <div class="form-group">
                <input id="from_nome" name="from_nome" required type="text" class="form-control" placeholder="Seu Nome"
                       tabindex="3"/>

                <div class="col-sm-16" id="email-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input id="from_email" name="from_email" required type="email" class="form-control" placeholder="E-mail"
                       tabindex="3"/>

                <div class="col-sm-16" id="email-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input id="to_nome" name="to_nome" required type="text" class="form-control"
                       placeholder="Nome do seu amigo"
                       tabindex="3"/>

                <div class="col-sm-16" id="email-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input id="to_email" name="to_email" required type="email" class="form-control"
                       placeholder="E-mail do seu amigo"
                       tabindex="3"/>

                <div class="col-sm-16" id="email-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input id="url" name="url" required type="url" class="form-control" placeholder="Url"
                       value="{{Request::url()}}"
                       tabindex="3" disabled/>
                <input id="link" name="link" type="hidden" class="form-control"
                       value="{{Request::url()}}"
                       tabindex="3"/>

                <div class="col-sm-16" id="url-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <textarea class="form-control" id="mensagem" name="mensagem" rows="4" cols="20"
                          style="width:100% !important;" required></textarea>

                <div class="col-sm-16" id="mensagem-errors"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-16">
                <input type="submit" value="Enviar" class="btn btn-primary btn-block btn-lg" tabindex="7">
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-xs-5">

        </div>
        <div class="col-xs-5 col-xs-pull-right" style="right: 0px;left: 40px;">
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

    </div>

</div>


