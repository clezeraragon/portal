@if($guiaEmpresa)
    @foreach($guiaEmpresa as $result)
        <ul class="list-unstyled">
            <li><a href="#">
                    <div class="row">
                        <div class="col-sm-7">
                            {{--<img width="1000" height="606" alt="" src="images/sec/sec-1.jpg" class="img-thumbnail">--}}
                            {{ HTML::decode(HTML::link(route('guia-de-empresas-anuncio',$result["url"]), HTML::image($result["path_img"],'',array('class'=>'img-thumbnail'))))}}
                        </div>
                        <div class="col-sm-9"><a href="#">
                                <div class="sec-info">
                                    <h3>
                                        {{HTML::link(route('guia-de-empresas-anuncio',$result["url"]),$result["nm_nome_fantasia"].' - '.$result['nome'])}}
                                    </h3>
                                </div>
                            </a>

                            <p>{{$result["descricao"]}}</p>
                        </div>
                    </div>
                </a></li>
        </ul>
    @endforeach
@endif