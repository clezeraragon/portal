<div class="col-md-5 col-sm-16 hidden-sm hidden-xs  left-bordered">
{{--{{dd($videos2p)}}--}}
    <div id="vid-thumbs" class="owl-carousel">
        @if(isset($videos2p))
            @foreach($videos2p as $key => $conteudos)
                {{--{{dd($conteudos)}}--}}
                <div class="item">

                    <div class="vid-thumb-outer">

                        @foreach($conteudos as $conteudo)
                            <div class="vid-thumb"><a class="popup-youtube"
                                                      href="https://www.youtube.com/watch?v={{$conteudo["link"]}}">
                                    <div class="vid-box"><span class="ion-ios7-film"></span>
                                        <img
                                                class=" img-thumbnail img-responsive match-height"
                                                src="//img.youtube.com/vi/{{$conteudo["link"]}}/hqdefault.jpg"
                                                width="300"
                                                height="90"
                                                alt=""/>
                                        {{--{{HTML::image($conteudo["path_img"],'',array('class'=>'img-thumbnail img-responsive','width'=>'250','height'=>'143'))}}--}}
                                    </div>
                                    <h4>{{$conteudo['titulo']}}</h4>
                                </a></div>


                    </div>
                    @endforeach
                    @endforeach


                </div>
                @endif
    </div>
