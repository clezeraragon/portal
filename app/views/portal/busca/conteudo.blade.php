@if($conteudos)
    @foreach($conteudos as $key =>$conteudo)
        {{--{{var_dump($conteudo)}}--}}
        <ul class="list-unstyled">
            <li><a href="#">
                    <div class="row">
                        <div class="col-sm-7">
                            {{--<img width="1000" height="606" alt="" src="images/sec/sec-1.jpg" class="img-thumbnail">--}}
                            @if(File::exists(public_path().$conteudo["path_img"].$conteudo['id'].'/'.'365x220_'.$conteudo['nome_img']))
                                {{ HTML::decode(HTML::link(route('conteudo',$conteudo["url"]), HTML::image($conteudo["path_img"].$conteudo['id'].'/'.'365x220_'.$conteudo['nome_img'],'',array('class'=>'img-thumbnail'))))}}
                            @else
                                {{ HTML::decode(HTML::link(route('conteudo',$conteudo["url"]), HTML::image($conteudo["path_img"].$conteudo['id'].'/'.$conteudo['nome_img'],'',array('class'=>'img-thumbnail'))))}}
                            @endif
                        </div>
                        <div class="col-sm-9"><a href="#">
                                <div class="sec-info">
                                    <h3>
                                        {{HTML::link($conteudo["url"],$conteudo["titulo"])}}
                                    </h3>
                                </div>
                            </a>

                            <p>{{$conteudo["introducao"]}}</p>
                        </div>
                    </div>
                </a></li>

        </ul>

    @endforeach
@endif