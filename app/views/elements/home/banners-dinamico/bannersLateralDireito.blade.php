<div class="col-sm-5 hidden-xs right-sec">
    <div class="bordered top-margin">
        <div class="row" style="margin: auto;padding-top: initial;padding-left: inherit">

            <!-- Banners -->

            {{--<a rel="nofollow" href="{{Route("page-cheque-teatro")}}?utm_campaign=cheque_teatro&utm_source=banner_home">--}}
                {{--<div class="col-sm-16 bt-space-banner-right wow fadeInUp animated animated" data-wow-delay="1s" data-wow-offset="50" style="visibility: visible; -webkit-animation-delay: 1s;">--}}
                    {{--<img class="img-responsive" src="{{asset('/portal/images/banner-lateral/banner_cheque_teatro.jpg')}}" width="336" height="200" alt="">--}}
                {{--</div>--}}
            {{--</a>--}}

            <a rel="nofollow" href="{{Route("conteudo-categoria-filha", array("inspiracoes", "cultura-lazer"))}}">
                <div class="col-sm-16 bt-space-banner-right wow fadeInUp animated animated" data-wow-delay="1s" data-wow-offset="50" style="visibility: visible; -webkit-animation-delay: 1s;">
                    <img class="img-responsive" src="{{asset('/portal/images/banner-lateral/agenda_isonhei.jpg')}}" width="336" height="200" alt="">
                </div>
            </a>

            <a rel="nofollow" href="{{Route("conteudo", array("rentcell-orlando"))}}">
                <div class="col-sm-16 bt-space-banner-right wow fadeInUp animated animated" data-wow-delay="1s" data-wow-offset="50" style="visibility: visible; -webkit-animation-delay: 1s;">
                    <img class="img-responsive" src="{{asset('/portal/images/banner-lateral/banner_rentcell.jpg')}}" width="336" height="200" alt="">
                </div>
            </a>

            {{--<a rel="nofollow" href="{{Route("isonhei-club-loja")}}">--}}
                {{--<div class="col-sm-16 bt-space-banner-right wow fadeInUp animated animated" data-wow-delay="1s" data-wow-offset="50" style="visibility: visible; -webkit-animation-delay: 1s;">--}}
                    {{--<img class="img-responsive" src="{{asset('/portal/images/banner-lateral/isonhei-club.jpg')}}" width="336" height="200" alt="">--}}
                {{--</div>--}}
            {{--</a>--}}

            <?php $rand_keys = array_rand($bannersDinamicos, 7)?>
            <a rel="nofollow" href="{{Route('portal').'/metrica/banners/'}}{{$data['origem'].'/'}}{{$bannersDinamicos[$rand_keys[0]]['id']}}" class="fa-link">
                <div class="col-sm-16 bt-space wow fadeInUp animated animated" data-wow-delay="1s" data-wow-offset="50" style="visibility: visible; -webkit-animation-delay: 1s;">
                    <img class="img-responsive" src="{{asset($bannersDinamicos[$rand_keys[0]]['path_img'])}}" width="336" height="200" alt="{{$bannersDinamicos[$rand_keys[0]]['anuncio']}}">
                </div>
            </a>

        </div>
    </div>
</div>
