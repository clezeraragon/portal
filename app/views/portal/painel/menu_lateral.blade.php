<div id="Personalizar-menu">
    <div class="col-xs-16 col-md-16 col-sm-16">
        <nav class="navbar navbar-default " role="navigation"
             style="background-color: transparent !important;border-color: transparent !important;">
            <div class="nav menu-item ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#submenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
            </div>
            <div class="collapse navbar-collapse {{ ( Request::is('painel/resgate')||Request::is('usuario')|| Request::is('painel') ||Request::is('painel/sites') || Request::is('painel/cotas') || Request::is('painel/recados')||Request::is('painel/expo-noivas')? 'in' : '')  }}"
                 id="submenu">
                <ul class="nav text-uppercase menu-item">
                    <li {{ (\Request::is('painel') ? 'class="active"' : '') }}>
                        <a href="{{Route('portal-painel')}}" class="dropdown-toggle">
                            <span class="ion-ios7-arrow-right nav-sub-icn"></span>
                            Home
                        </a>
                    </li>
                    <li {{ (\Request::is('usuario') ? 'class="active"' : '') }}>
                        <a href="{{Route('editar-usuario')}}" class="dropdown-toggle">
                            <span class="ion-ios7-arrow-right nav-sub-icn"></span>
                            Meus Dados
                        </a>
                    </li>
                    @if(Sentry::getUser()->utm_medium == 'exponoivas2015')
                        <li {{ (\Request::is('painel/expo-noivas') ? 'class="active"' : '') }}>
                            <a href="{{Route('expo-noivas-2015')}}" class="dropdown-toggle">
                                <span class="ion-ios7-arrow-right nav-sub-icn"></span>
                                Expo noivas
                            </a>
                        </li>
                    @endif
                    {{--<li>--}}
                        {{--<a class=" menu-item" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"--}}
                           {{--aria-controls="collapseSubMenu">--}}
                            {{--<span class="ion-ios7-arrow-right nav-sub-icn"></span>--}}
                            {{--iSonhei Club--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<div id="collapseTwo"--}}
                         {{--class=" collapse {{ (Request::is('painel/isonhei-club') || Request::is('painel/resgate') || Request::is('painel/ranking')--}}
                         {{--|| Request::is('painel/registre-seus-pontos') ? 'in' : '')  }}"--}}
                         {{--style="height: auto;">--}}
                        {{--<div class="panel-body">--}}
                        {{--<ul class="nav text-uppercase menu-item">--}}
                            {{--<li {{ (\Request::is('painel/convidar-amigo') ? 'class="active"' : '') }}>--}}
                                {{--<a href="{{Route('get-convidar-amigo')}}" class="dropdown-toggle">--}}
                                    {{--<span class="ion-ios7-arrow-right nav-sub-icn"></span>--}}
                                    {{--Indicações--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li {{ (\Request::is('painel/isonhei-club') ? 'class="active"' : '') }}>--}}
                                {{--<a href="{{Route('painel-fidelidade')}}" class="dropdown-toggle">--}}
                                    {{--<span class="ion-ios7-arrow-right nav-sub-icn"></span>--}}
                                    {{--Pontuação--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li {{ (\Request::is('painel/resgate') ? 'class="active"' : '') }}>--}}
                                {{--<a href="{{Route('painel-resgate')}}" class="dropdown-toggle">--}}
                                    {{--<span class="ion-ios7-arrow-right nav-sub-icn"></span>--}}
                                    {{--Resgates--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li {{ (\Request::is('painel/ranking') ? 'class="active"' : '') }}>--}}
                                {{--<a href="{{Route('painel-ranking')}}" class="dropdown-toggle">--}}
                                    {{--<span class="ion-ios7-arrow-right nav-sub-icn"></span>--}}
                                    {{--Ranking--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li {{ (\Request::is('painel/registre-seus-pontos') ? 'class="active"' : '') }}>--}}
                                {{--<a href="{{Route('get-registre-de-pontos')}}" class="dropdown-toggle">--}}
                                    {{--<span class="ion-ios7-arrow-right nav-sub-icn"></span>--}}
                                    {{--Registre seus Pontos--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<li>--}}
                        {{--<a class=" menu-item" data-toggle="collapse" href="#collapseTree" aria-expanded="false"--}}
                           {{--aria-controls="collapseSubMenu">--}}
                            {{--<span class="ion-ios7-arrow-right nav-sub-icn"></span>--}}
                            {{--Sites--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<div id="collapseTree"--}}
                         {{--class=" collapse {{ (Request::is('painel/sites') || Request::is('painel/cotas') || Request::is('painel/recados')? 'in' : '')  }}"--}}
                         {{--style="height: auto;">--}}
                        {{--<div class="panel-body">--}}
                        {{--<ul class="nav text-uppercase menu-item">--}}
                            <li {{ (\Request::is('painel/sites') ? 'class="active"' : '') }}>
                                <a href="{{Route('painel-site')}}" class="dropdown-toggle">
                                    <span class="ion-ios7-arrow-right nav-sub-icn"></span>
                                    Meus Sites
                                </a>
                            </li>
                            <li {{ (\Request::is('painel/cotas') ? 'class="active"' : '') }}>
                                <a href="{{Route('painel-cotas')}}" class="dropdown-toggle">
                                    <span class="ion-ios7-arrow-right nav-sub-icn"></span>
                                    Cotas
                                </a>
                            </li>
                            <li {{ (\Request::is('painel/recados') ? 'class="active"' : '') }}>
                                <a href="{{Route('painel-recados')}}" class="dropdown-toggle">
                                    <span class="ion-ios7-arrow-right nav-sub-icn"></span>
                                    Mural de recados
                                </a>
                            </li>
                        {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </ul>
            </div>

        </nav>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#collapseTwo').on('show.bs.collapse', function () {
            $("#panel-title2").addClass("active-panel");
        });
        $('#menu-color').on('show.bs.collapse', function () {
            $("#panel-title2").removeClass("active-panel");
        });
    });
</script>

