
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
<!-- Input com busca -->
<link href="{{ asset('assets/vendors/select2/select2.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2-bootstrap.css') }}"/>
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet"/>
<!-- fim busca -->
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

                        <!-- Select Basic -->
                        <div class="form-group {{ $errors->first('cliente_id', 'has-error') }}">
                          {{ Form::label('cliente_id', '* Cliente', array('class' => 'control-label col-md-3')) }}
                          <div class="col-md-7">
                            {{ Form::select('cliente_id', Cliente::combobox(), Input::old('cliente_id'), array('class' => 'form-control select2','id' => 'e1', 'required')) }}
                            {{ $errors->first('cliente_id', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                         <!-- File Button -->
                         <div class="form-group {{ $errors->first('path_img', 'has-error') }}">
                             <label class="col-md-3 control-label" for="filebutton">* Imagem</label>
                             <div class="col-md-7">
                                 {{ Form::file('path_img', Input::old('path_img'), array('class' => 'form-control input-md input-file"', 'required', 'id' => 'path_img')) }}
                                 {{ $errors->first('path_img', '<span class="text-danger">:message</span>') }}
                             </div>
                         </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('titulo', 'has-error') }}">
                          {{ Form::label('titulo', '* Título', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('titulo', Input::old('titulo'), array('placeholder' => 'Título da foto', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('titulo', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                         <!-- Textarea -->
                        <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                          {{ Form::label('descricao', '* Descrição', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                              {{ Form::textarea('descricao', Input::old('descricao'), array('placeholder' => 'Descrição da categoria', 'class' => 'form-control', 'required', 'size' => '30x4', 'maxlength' => '300')) }}
                              {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('ordem', 'has-error') }}">
                          {{ Form::label('ordem', '* Ordem', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('ordem', Input::old('ordem'), array('placeholder' => 'Ordem da foto no Guia', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('ordem', '<span class="text-danger">:message</span>') }}
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

    <script src="{{ asset('/portal/js/jquery-mask/jquery.mask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/js/custom/custom.js') }}" type="text/javascript"></script>

    <!-- script de busca -->
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}" type="text/javascript"></script>
    <!-- fim de busca -->

@stop