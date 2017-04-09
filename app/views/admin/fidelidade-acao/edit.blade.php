
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
                            <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                                {{ Form::label('nome', '* Nome', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('nome', Input::old('nome', $rs->nome), array('placeholder' => 'Nome do plano', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('pontos', 'has-error') }}">
                                {{ Form::label('pontos', '* Pontos', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('pontos', Input::old('pontos', $rs->pontos), array('placeholder' => 'Número de pontos por ação realizada', 'class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('pontos', '<span class="text-danger">:message</span>') }}
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