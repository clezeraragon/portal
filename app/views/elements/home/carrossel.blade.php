<!-- carrossel -->
{{--
  --------------------------Notas-----------------------
  File::exists(verificar se a imagem selecionada existe)
  Caso ela não existir será carregado uma imagem padrão
  ------------------------------------------------------
--}}
<div id="sync1" class="owl-carousel">
    @if(isset($carrossel))
        {{--{{dd($carrossel[0])}}--}}
        @foreach($carrossel as $key => $conteudo)
            {{--{{dd($conteudo['conteudo_id'])}}--}}
            <a href="{{Route('portal') . "/" .$carrossel[$key]['url']}}">
                <div class="box item">
                    <div class="carousel-caption">
                        {{$carrossel[$key]['titulo']}}
                    </div>
                    <div class="carousel-caption carousel-caption-ajuste">
                    </div>
                    @if(File::exists(public_path().$carrossel[$key]["path_img"].$carrossel[$key]['conteudo_id'].'/'.$carrossel[$key]['nome_img']))
                        {{HTML::image($carrossel[$key]["path_img"].$carrossel[$key]['conteudo_id'].'/'.$carrossel[$key]['nome_img'],$carrossel[$key]['titulo'],array('class'=>'img-responsive img-img','data-effect'=>'mfp-zoom-out'))}}
                    @else
                        {{HTML::image($carrossel[$key]["path_img"].$carrossel[$key]['conteudo_id'].'/'.$carrossel[$key]['nome_img'],$carrossel[$key]['titulo'],array('class'=>'img-responsive img-img','data-effect'=>'mfp-zoom-out'))}}
                    @endif
                </div>
            </a>
        @endforeach
    @endif
</div>


<div class="row">
    @if(isset($carrossel))
        <div id="sync2" class="owl-carousel">
            @foreach($carrossel as $key => $conteudo)
                <a href="{{Route('portal') . "/" .$carrossel[$key]['url']}}">

                    <div class="item carousel-border">
                        @if(File::exists(public_path().$carrossel[$key]["path_img"].$carrossel[$key]['conteudo_id'].'/'.'132x79_'.$carrossel[$key]['nome_img']))
                            {{HTML::image($carrossel[$key]["path_img"].$carrossel[$key]['conteudo_id'].'/'.'132x79_'.$carrossel[$key]['nome_img'],$carrossel[$key]['titulo'],array('class'=>'img-responsive','width'=>'1600','height'=>'972'))}}
                        @else
                            {{HTML::image($carrossel[$key]["path_img"].$carrossel[$key]['conteudo_id'].'/'.$carrossel[$key]['nome_img'],$carrossel[$key]['titulo'],array('class'=>'img-responsive','width'=>'1600','height'=>'972'))}}
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
<!-- fim do carrossel -->

