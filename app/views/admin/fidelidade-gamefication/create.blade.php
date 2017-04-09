
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
                        <div class="form-group {{ $errors->first('fator', 'has-error') }}">
                          {{ Form::label('fator', '* Fator', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('fator', Input::old('fator'), array('placeholder' => 'Utilize ponto na casa decimal Ex: 1.5', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('fator', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('pontos', 'has-error') }}">
                          {{ Form::label('pontos', '* Pontos', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('pontos', Input::old('pontos'), array('placeholder' => 'Pontos', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('pontos', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('nivel', 'has-error') }}">
                          {{ Form::label('nivel', '* Nível', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('nivel', Input::old('nivel'), array('placeholder' => 'Nível', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('nivel', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- File Button -->
                        <div class="form-group {{ $errors->first('path_img', 'has-error') }}">
                            <label class="col-md-3 control-label" for="filebutton">* Imagem</label>
                            <div class="col-md-7">
                                {{ Form::file('path_img', ['class' => '', 'required', 'id' => 'path_img']) }}
                                {{ $errors->first('path_img', '<span class="text-danger">:message</span>') }}
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