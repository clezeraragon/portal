
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

                         <!-- Select Basic -->
                         <div class="form-group {{ $errors->first('periodo_id', 'has-error') }} ">
                           {{ Form::label('periodo_id', '* Período', array('class' => 'control-label col-md-3')) }}
                           <div class="col-md-7">
                             {{ Form::select('periodo_id', SitePeriodo::combobox(), Input::old('periodo_id'), array('class' => 'form-control')) }}
                             {{ $errors->first('periodo_id', '<span class="text-danger">:message</span>') }}
                           </div>
                         </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                          {{ Form::label('nome', '* Nome', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('nome', Input::old('nome'), array('placeholder' => 'Nome do plano', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                          {{ Form::label('descricao', '* Descrição', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('descricao', Input::old('descricao'), array('placeholder' => 'Descrição do plano', 'class' => 'form-control input-md', 'required')) }}
                             {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('valor', 'has-error') }}">
                          {{ Form::label('valor', 'Valor', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('valor', Input::old('valor'), array('placeholder' => 'Valor do plano', 'class' => 'form-control input-md', 'id' => 'money1')) }}
                             {{ $errors->first('valor', '<span class="text-danger">:message</span>') }}
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

<script type="text/javascript" src="{{ asset('assets/js/jquery.maskMoney.js') }}"></script>

<script>
  $(function() {
    $("#money1").maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
  })
</script>
@stop