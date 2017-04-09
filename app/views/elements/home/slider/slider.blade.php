{{HTML::style("portal/css/slider/slider.css")}}
<script src="{{ asset('portal/js/slider/js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('portal/js/slider/js/jssor.js') }}"></script>
<script src="{{ asset('portal/js/slider/js/jssor.slider.min.js') }}"></script>
<script src="{{ asset('portal/js/slider/custon.js') }}"></script>


<div class="col-sm-16">

    <div id="slider1_container" style="position: relative; width: 1140px;
        height: 430px; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;

                background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(/portal/images/general/status-blue.gif) no-repeat center center;

                top: 10px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1140px; height: 430px;
            overflow: hidden;">
            <div>
                {{--<a href="{{route('conteudo-categoria-pai','casamento')}}" target="_self">--}}
                <img u="image" src="{{asset('portal/images/slider/home/banner1_fundo.jpg')}}"/>
                {{--</a>--}}

                <div u=caption t="L" du="2500" class=""
                     style="position:absolute; left:40px; top: 70px; width:500px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner1_texto1.png')}}"
                         style="width: 611px"/>
                </div>
                <div u=caption t="R|IB" t2=L d=-1200 class=""
                     style="position:absolute; left:90px; top: 120px; width:500px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner1_texto2.png')}}"
                         style="width: 513px"/>

                </div>
                <div u=caption t="L|IB" t2=L d=-1200 class=""
                     style="position:absolute; left:140px; top: 200px; width:500px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner1_texto3.png')}}"
                         style="width: 408px"/>

                </div>

            </div>
            <div>
                <a href="{{route('conteudo-categoria-pai','casamento')}}" target="_self">
                    <img u="image" src="{{asset('portal/images/slider/home/banner2_fundo.jpg')}}"/>
                </a>

                <div u=caption t="L" du="2500" class=""
                     style="position:absolute; left:532px; top: 177px; width:600px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner2_texto1.png')}}"
                         style="width: 572px"/>
                </div>
                <div u=caption t="R|IB" t2=L d=-1200 class=""
                     style="position:absolute; left:578px; top: 315px; width:500px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner2_texto2.png')}}"
                         style="width: 480px"/>

                </div>
            </div>
            <div>
                <a href="{{route('conteudo-categoria-pai','turismo')}}" target="_self">
                    <img u="image" src="{{asset('portal/images/slider/home/banner3_fundo.jpg')}}"/>
                </a>

                <div u=caption t="L" du="2500" class=""
                     style="position:absolute; left:570px; top: 33px; width:600px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner3_texto1.png')}}"
                         style="width: 539px"/>
                </div>
                <div u=caption t="R|IB" t2=L d=-1200 class=""
                     style="position:absolute; left:592px; top: 123px; width:500px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner3_texto2.png')}}"
                         style="width: 482px"/>

                </div>
            </div>
            <div>
                <a href="{{route('conteudo-categoria-pai','infantil')}}" target="_self">
                    <img u="image" src="{{asset('portal/images/slider/home/banner4_fundo.jpg')}}"/>
                </a>

                <div u=caption t="L" du="2500" class=""
                     style="position:absolute; left:49px; top: 118px; width:600px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner4_texto1.png')}}"
                         style="width: 549px"/>
                </div>
                <div u=caption t="R|IB" t2=L d=-1200 class=""
                     style="position:absolute; left:113px; top: 248px; width:500px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner4_texto2.png')}}"
                         style="width: 412px"/>

                </div>
            </div>
            <div>
                <a href="{{route('conteudo-categoria-pai','debutante')}}" target="_self">
                    <img u="image" src="{{asset('portal/images/slider/home/banner5_fundo.jpg')}}"/>
                </a>

                <div u=caption t="L" du="2500" class=""
                     style="position:absolute; left:32px; top: 161px; width:600px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner5_texto1.png')}}"
                         style="width: 568px"/>
                </div>
                <div u=caption t="R|IB" t2=L d=-1200 class=""
                     style="position:absolute; left:338px; top: 296px; width:500px; height:30px;">
                    <img u="image" src="{{asset('portal/images/slider/home/banner5_texto2.png')}}"
                         style="width: 323px"/>

                </div>
            </div>

        </div>

        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb03" style="bottom: 0px; right: 0px; left:0px !important;border:0px solid #fff">

            <div u="prototype" class="imagensThumb">
                <div u="numbertemplate"></div>
            </div>

        </div>
        <!--#endregion Bullet Navigator Skin End -->

        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora20l" style="top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora20r" style="top: 123px; right: 8px;">
        </span>

    </div>
</div>

