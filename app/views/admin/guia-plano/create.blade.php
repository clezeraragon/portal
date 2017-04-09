
{{-- Page title --}}
@section('title')
{{$data['title']}}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<!--end of page level css-->
@stop

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::to($data['route']) }}" class="btn btn-info navbar-right btn_voltar"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>

            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        Cadastrar {{$data['title']}}
                    </div>
                </div>
                <div class="portlet-body">
                     {{ Form::open(array('url' => $data['route'], 'class' => 'form-horizontal', 'files' => true)) }}
                        <fieldset>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                          {{ Form::label('nome', '* Nome', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('nome', Input::old('nome'), array('placeholder' => 'Nome do plano', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('qtd_imagem', 'has-error') }}">
                          {{ Form::label('qtd_imagem', '* Qtd. Imagem', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('qtd_imagem', Input::old('qtd_imagem'), array('placeholder' => 'Quantidade de imagens', 'class' => 'form-control input-md', 'required', 'maxlength' => '2')) }}
                             {{ $errors->first('qtd_imagem', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('qtd_video', 'has-error') }}">
                          {{ Form::label('qtd_video', '* Quantidade de vídeos', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('qtd_video', Input::old('qtd_video'), array('placeholder' => 'Quantidade de Vídeos', 'class' => 'form-control input-md', 'required', 'maxlength' => '2')) }}
                             {{ $errors->first('qtd_video', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('ordem', 'has-error') }}">
                          {{ Form::label('ordem', '* Ordem', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('ordem', Input::old('ordem'), array('placeholder' => 'Ordem de exibição', 'class' => 'form-control input-md', 'required', 'maxlength' => '2')) }}
                             {{ $errors->first('ordem', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('limite', 'has-error') }}">
                          {{ Form::label('limite', '* Limite', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('limite', Input::old('limite'), array('placeholder' => 'Quantidade de empresas que podem estar vinculadas a este plano', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('limite', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('cor', 'has-error') }}">
                            {{ Form::label('cor', '* Cor do Plano', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                                {{ Form::text('cor', Input::old('cor'), array('placeholder' => 'Cor do Plano', 'class' => 'form-control input-md', 'required')) }}
                                {{ $errors->first('cor', '<span class="text-danger">:message</span>') }}
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="cadastrar"></label>
                          <div class="col-md-7">
                            {{ Form::submit('Salvar', array('class' => 'btn btn-success')) }}
                          </div>
                        </div>

                        </fieldset>
                     {{ Form::close() }}
                </div>
        </div>
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')



@stop