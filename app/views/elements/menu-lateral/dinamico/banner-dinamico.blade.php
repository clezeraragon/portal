{{--<div class="row">--}}
    {{--<div class="col-sm-16 bt-space-banner-right wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="80"><img--}}
                {{--class="img-responsive" src="portal/images/ads/336-280-ad.gif" width="336" height="280" alt=""/></div>--}}
{{--</div>--}}

<div class="col-sm-5 hidden-xs right-sec">
    <div class="bordered">
        <div class="row " style="margin: auto;padding-top: initial;padding-left: inherit">
            <!-- Banners -->
            <?php $rand_keys = array_rand($bannersDinamicos, 3)?>

            <a rel="nofollow" href="{{Route('portal').'/metrica/banners/'}}{{$data['origem'].'/'}}{{$bannersDinamicos[$rand_keys[0]]['id']}}">
                <div class="col-sm-16 bt-space-banner-right wow fadeInUp animated animated" data-wow-delay="1s"
                     data-wow-offset="50" style="visibility: visible; -webkit-animation-delay: 1s;"><img
                            class="img-responsive" src="{{asset($bannersDinamicos[$rand_keys[0]]['path_img'])}}" width="336"
                            height="200" alt="{{$bannersDinamicos[$rand_keys[0]]['anuncio']}}">
                </div>
            </a>

                <!-- Facebook start -->

                @include("elements.menu-lateral.facebook")

                <!-- Facebook end -->
                <a rel="nofollow" href="{{Route('portal').'/metrica/banners/'}}{{$data['origem'].'/'}}{{$bannersDinamicos[$rand_keys[1]]['id']}}">
                    <div class="col-sm-16 bt-space-banner-right wow fadeInUp animated animated" data-wow-delay="1s"
                         data-wow-offset="50" style="visibility: visible; -webkit-animation-delay: 1s;"><img
                                class="img-responsive" src="{{asset( $bannersDinamicos[$rand_keys[1]]['path_img'])}}" width="336"
                                height="200" alt="{{$bannersDinamicos[$rand_keys[1]]['anuncio']}}">
                    </div>
                </a>
                <a rel="nofollow" href="{{Route('portal').'/metrica/banners/'}}{{$data['origem'].'/'}}{{$bannersDinamicos[$rand_keys[2]]['id']}}">
                    <div class="col-sm-16 bt-space-banner-right wow fadeInUp animated animated" data-wow-delay="1s"
                         data-wow-offset="50" style="visibility: visible; -webkit-animation-delay: 1s;"><img
                                class="img-responsive" src="{{asset($bannersDinamicos[$rand_keys[2]]['path_img'])}}" width="336"
                                height="200" alt="{{$bannersDinamicos[$rand_keys[2]]['anuncio']}}">
                    </div>
                </a>
                <!-- instagram start -->


                <!-- end Banners mobile -->

        </div>
    </div>
</div>