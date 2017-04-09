
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
                        Editar {{$data['title']}}
                    </div>
                </div>
                <div class="portlet-body">
	                {{ Form::open(array('url' => $data['route'] . '/' . $rs->id, 'method' => 'put', 'class' => 'form-horizontal', 'files' => true)) }}
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('nome_fantasia', 'has-error') }}">
                                {{ Form::label('nome_fantasia', '* Nome Fantasia', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('nome_fantasia', Input::old('nome_fantasia', $rs->nome_fantasia), array('placeholder' => 'Nome Fantasia', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('nome_fantasia', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                              <!-- Multiple Radios (inline) -->
                             <div class="form-group {{ $errors->first('status', 'has-error') }} ">
                               {{ Form::label('status', '* Status', array('class' => 'col-md-3 control-label')) }}
                               <div class="col-md-7">
                                 <label class="radio-inline" for="radios-0">
                                   <input type="radio" name="status"  value="1" @if($rs->status == "1") checked="checked" @endif>
                                   Ativo
                                 </label>
                                 <label class="radio-inline" for="radios-1">
                                   <input type="radio" name="status" value="0" @if($rs->status == "0") checked="checked" @endif>
                                   Inativo
                                 </label>
                                 {{ $errors->first('status', '<span class="text-danger">:message</span>') }}
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