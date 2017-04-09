{{--
  --------------------------Notas-----------------------
  File::exists(verificar se a imagem selecionada existe)
  Caso ela não existir será carregado uma imagem padrão
  ------------------------------------------------------
--}}
<div class="main-title-outer pull-left">
    @if(isset($miniCarrosselMateria))
        @foreach($miniCarrosselMateria as $key => $conteudo)
            @if($key == 0)
                <div class="main-title label_inspiracoes">{{$conteudo['nome']}}</div>
            @endif
        @endforeach
    @endif
</div>
<div class="row">
    @if(isset($miniCarrosselMateria))
        <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left ">
            @foreach($miniCarrosselMateria as $conteudo)
                <div class="item topic"><a rel="nofollow" href="{{Route('portal') . "/" .$conteudo['url']}}">
                    @if(File::exists(public_path().$conteudo["path_img"].$conteudo['conteudo_id'].'/'.'251x151_'.$conteudo['nome_img']))
                        {{HTML::image($conteudo["path_img"].$conteudo['conteudo_id'].'/'.'251x151_'.$conteudo['nome_img'],$conteudo['titulo'],array('class'=>'img-thumbnail match-height','width'=>'375','height'=>'164'))}}
                        @else
                            {{HTML::image($conteudo["path_img"].$conteudo['conteudo_id'].'/'.$conteudo['nome_img'],$conteudo['titulo'],array('class'=>'img-thumbnail match-height','width'=>'375','height'=>'164'))}}
                        @endif
                    </a>
                    <a rel="nofollow" href="{{Route('portal') . "/" .$conteudo['url']}}">
                        <h4>{{$conteudo['titulo']}}</h4>
                    </a>

                </div>
            @endforeach

        </div>
    @endif
</div>