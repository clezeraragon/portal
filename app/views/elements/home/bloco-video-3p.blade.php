<div class="main-title-outer pull-left">
@if(isset($videos3p))
        @foreach($videos3p as $key => $video)
            @if($key == 0)
                <div class="main-title">{{$video['nome']}}</div>
            @endif
        @endforeach
    @endif
</div>
<div class="row">
    @if ($videos3p)
        <div class="col-sm-13 col-xs-16">
            <!-- Tab panes -->

            <div class="tab-content">

                @foreach($videos3p as  $video1)


                    <div id="{{$video1['link']}}"
                         class="aquivideo tab-pane embed-responsive embed-responsive-16by9 {{($video['link']==$video1['link'])? 'active':''}}">
                        {{--<iframe width="514" height="300"--}}
                                {{--src="//www.youtube.com/embed/{{$video1['link']}}?showinfo=0"--}}
                                {{--frameborder="0"--}}
                                {{--allowfullscreen--}}
                                {{-->--}}

                        <div class="vid-box"><span class="ion-eye positionIcone"></span><img
                                    class="img-thumbnail img-responsive videoPrincipal"
                                    src="//img.youtube.com/vi/{{$video['link']}}/mqdefault.jpg"
                                    width="100%"
                                    height="60"
                                    alt="" data-role={{$video['link']}}/></div>
                        {{--</iframe>--}}
                    </div>

                @endforeach

            </div>

        </div>
        <div class="col-sm-3 col-xs-2 "> <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-right hidden-xs">
                <?php $posicao = 1; ?>

                @foreach($videos3p as  $video)

                    <li  class="{{($video1['link']== $video['link'])? 'active':''}} thumbvideo" data-role="{{$video['link']}}"><a data-toggle="tab"
                                                                                       href="{{'#'.$video['link']}}"
                                                                                       onclick="logVideo('{{$posicao}}, {{$video['id']}}');">
                            <div class="vid-thumb">
                                <div class="vid-box"><span class="ion-eye"></span><img
                                            class="img-thumbnail img-responsive"
                                            src="//img.youtube.com/vi/{{$video['link']}}/{{$video['ordem']}}.jpg"
                                            width="150"
                                            height="60"
                                            alt=""/></div>
                            </div>
                        </a></li>
                    <?php $posicao += 1;?>
                @endforeach


            </ul>
        </div>
    @endif

</div>
<!--Recent videos end-->

<script>

    $(function () {
        $('#carousel').carouFredSel({
            responsive: true,
            direction: 'down',
            height: '100%',
            items: {
                height: 150,
                width: '160%',
                visible: {
                    min: 2,
                    max: 8
                }
            },
            scroll: {
                items: '-1'
            }
        });
    });
</script>