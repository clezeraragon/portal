{{--{{dd(Request::url())}}--}}
<div class="col-sm-16  wow fadeInDown animated animated" data-wow-delay="1s" data-wow-offset="10"
     style="visibility: visible; -webkit-animation-delay: 1s;">
    <div class="row">
        {{--<div class="col-md-16">--}}
            {{--<a rel="nofollow" id="fb-root" data-href="#compartilhe" data-layout="button_count">--}}
                {{--<div class="col-md-1 col-md-push-1">--}}
                    {{--<span class="ion-email" style="font-size:25px;"></span>--}}
                {{--</div>--}}
                {{--<div class="col-md-12 col-md-pull-1" style="top:7px;left: 20px;">--}}
                    {{--<span style="margin: 15px;"> compartilhe</span>--}}
                {{--</div>--}}
            {{--</a>--}}
            <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button_count"></div>
        {{--</div>--}}
    </div>


<div id="fb-root"></div>

</div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

