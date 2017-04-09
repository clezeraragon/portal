
<div class="container header">

    <div class="row">

        <div class="col-sm-4 col-md-4 col-lg-6 col-xs-10 fadeInUpLeft animated">{{HTML::link('/','',array('class' =>'navbar-brand' , 'alt' => 'iSonhei - O portal para quem quer realizar sonhos!', 'title' => 'iSonhei - O portal para quem quer realizar sonhos!'))}}</div>

        <!-- banner no header -->
        <div class="col-sm-7 col-md-7 col-lg-6 text-right text-uppercase col-sm-pull-1  hidden-xs"
             style="top: 40px;;left: 100px;">
            <br>
            @if (Sentry::check())

                <a rel="nofollow" href="#">{{Sentry::getUser()->first_name}} |</a>
                <a rel="nofollow" href="{{route("portal-painel")}}">Painel |</a>
                @if(Sentry::getUser()->perfil->st_admin == 1)
                    <a rel="nofollow" href="{{route('dashboard')}}">Admin |</a>
                @endif
                <a rel="nofollow" href="{{Route("logout")}}">Sair &nbsp;&nbsp;</a>
            @else

                <a rel="nofollow" class="open-popup-link" href="{{'#create-account'}}" data-effect="mfp-zoom-in">CADASTRE-SE
                    |</a>
                <a rel="nofollow" class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in">LOGIN
                    &nbsp;&nbsp;</a>

            @endif

        </div>

        <div class="col-sm-4 col-lg-3 hidden-xs col-sm-push-3 hidden-md" style="top: 55px;left: 110px;">

            {{ HTML::decode(HTML::link('https://www.facebook.com/isonhei', HTML::image('portal/images/general/face_home.gif'),array('target'=>'_blank','class' =>'wow flipInY animated'))) }}
            {{ HTML::decode(HTML::link('https://www.youtube.com/user/iSonhei', HTML::image('portal/images/general/youtube_home.gif'),array('target'=>'_blank','class' =>'wow flipInY animated'))) }}
            {{ HTML::decode(HTML::link('http://instagram.com/portal_isonhei', HTML::image('portal/images/general/insta_home.gif'),array('target'=>'_blank','class' =>'wow flipInY animated'))) }}

        </div>
        <div class="col-md-2 hidden-xs hidden-sm hidden-lg" style="top: 55px;left: 120px;">

            {{ HTML::decode(HTML::link('https://www.facebook.com/isonhei', HTML::image('portal/images/general/face_home.gif'),array('target'=>'_blank','class' =>'wow flipInY animated'))) }}
            {{ HTML::decode(HTML::link('https://www.youtube.com/user/iSonhei', HTML::image('portal/images/general/youtube_home.gif'),array('target'=>'_blank','class' =>'wow flipInY animated'))) }}
            {{ HTML::decode(HTML::link('http://instagram.com/portal_isonhei', HTML::image('portal/images/general/insta_home.gif'),array('target'=>'_blank','class' =>'wow flipInY animated'))) }}

        </div>
        <!-- menu mobile -->
        <div class="col-xs-15 hidden-sm hidden-md hidden-lg text-uppercase">
            <br>

            <div id="menu-header-xs">
                @if (Sentry::check())

                    <a rel="nofollow" href="#">{{Sentry::getUser()->first_name}} |</a>
                    <a rel="nofollow" href="{{route("portal-painel")}}">Painel |</a>
                    @if(Sentry::getUser()->perfil->st_admin == 1)
                        <a rel="nofollow" href="{{route('dashboard')}}">Admin |</a>
                    @endif
                    <a rel="nofollow" href="{{Route("logout")}}">Sair &nbsp;&nbsp;&nbsp;</a>
                @else
                    <a rel="nofollow" class="open-popup-link" href="{{'#create-account'}}" data-effect="mfp-zoom-in">CADASTRE-SE
                        |</a>
                    <a rel="nofollow" class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in">LOGIN &nbsp;&nbsp;&nbsp;</a>

                @endif
            </div>
        </div>
        <!-- fim menu mobile -->

    </div>
</div>
