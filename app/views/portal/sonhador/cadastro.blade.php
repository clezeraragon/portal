
{{-- Page title --}}
@section('title')
{{$data['title_seo']}}
@stop

@section('description')
{{$data['description_seo']}}
@stop

@section('keywords')
{{$data['keywords_seo']}}
@stop

{{-- page level styles --}}
@section('header_styles')

@stop

{{-- Page content --}}
@section('conteudo')

<!-- conteudo Start -->
<div class="container">

    @include('notifications')
    <div id="notification"></div>
    <!-- header Start -->
    <div class="container">
        <div class="page-header">
            <h1>{{$data['title_pag']}}</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">{{$data['title_pag']}}</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data start -->
    <section>
        <div class="container ">
            <div class="row ">
                <!-- left sec start -->
                <div class="col-md-11 col-sm-11">
                    <div class="row">
                        <div class="sonhador_img" style="">
                            {{HTML::image("/portal/images/pages/banner_sonhador.jpg",'',array('class'=>'img-responsive'))}}
                        </div>
                        <br>
                        <p>
                            Aqui você tem a possibilidade de criar um site gratuitamente e apresentar seu sonho para amigos e familiares. Com isso é possível arrecadar fundos,
                            através das cotas, para realizar o seu grande desejo, seja ele casar, comprar um carro, um imóvel ou fazer uma grande viagem.
                        </p>
                        <p>
                            Aproveite esta vantagem que só o cadastrado possui para construir agora mesmo o seu site.
                        </p>
                        <p>
                            Basta você sonhar, o iSonhei ajuda você a realizar!
                        </p>
                    </div>

                    <div class="row">
                        {{ Form::open(array('url' => $data['route'] ,  'class' => 'form-horizontal')) }}
                           <fieldset>
                               <legend><h3>Crie seu Site</h3></legend>

                               <!-- Text input-->
                               <div class="form-group {{ $errors->first('titulo_site', 'has-error') }}">
                                   {{ Form::label('titulo_site', '* Título do site', array('class' => 'col-md-3 control-label')) }}
                                   <div class="col-md-10 col-sm-15">
                                       {{ Form::text('titulo_site', Input::old('titulo_site'), array('placeholder' => '','class' => 'form-control input-md', 'required', 'maxlength' => '50')) }}
                                       {{ $errors->first('titulo_site', '<span class="text-danger">:message</span>') }}
                                   </div>
                               </div>

                                <!-- Select Basic -->
                                <div class="form-group {{ $errors->first('tipo_id', 'has-error') }}">
                                  {{ Form::label('tipo_id', '* Tipo de site', array('class' => 'control-label col-md-3')) }}
                                  <div class="col-md-10 col-sm-15">
                                    {{ Form::select('tipo_id', SiteTipo::combobox(), Input::old('tipo_id'), array('class' => 'form-control', 'required')) }}
                                    {{ $errors->first('tipo_id', '<span class="text-danger">:message</span>') }}
                                  </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group {{ $errors->first('plano_id', 'has-error') }}">
                                  {{ Form::label('plano_id', '* Plano', array('class' => 'control-label col-md-3')) }}
                                  <div class="col-md-10 col-sm-15">
                                    {{ Form::select('plano_id', SitePlano::combobox(), Input::old('plano_id'), array('class' => 'form-control', 'required')) }}
                                    {{ $errors->first('plano_id', '<span class="text-danger">:message</span>') }}
                                  </div>
                                </div>

                               <!-- Button -->
                               <div class="form-group">
                                 <label class="col-md-3 control-label" for="cadastrar"></label>
                                 <div class="col-md-10 col-sm-15" align="right">
                                   {{ Form::submit('Criar Site', array('class' => 'btn btn-primary')) }}
                                 </div>
                               </div>

                           </fieldset>
                        {{ Form::close() }}

                    </div>
                </div>
                <!-- left sec end -->

                <!-- right sec start -->
                @include('elements.menu-lateral.dinamico.banner-dinamico-sonhador')
                {{--<div class="col-sm-5 hidden-xs right-sec">--}}
                    {{--<div class="bordered">--}}
                        {{--<div class="row ">--}}
                            {{--<div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="150">--}}
                                {{--<div class="table-responsive">--}}
                                    {{--@include('elements.menu-lateral.facebook')--}}
                                    {{--@include('elements.menu-lateral.instagram')--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!-- data end -->
</div>
<!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')


@stop