
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
                         <div class="form-group {{ $errors->first('estado_id', 'has-error') }} ">
                           {{ Form::label('estado_id', '* Estado', array('class' => 'control-label col-md-3')) }}
                           <div class="col-md-7">
                             {{ Form::select('estado_id', GuiaEstado::combobox(), Input::old('estado_id'), array('class' => 'form-control select2','id'=>'e1')) }}
                             {{ $errors->first('estado_id', '<span class="text-danger">:message</span>') }}
                           </div>
                         </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                          {{ Form::label('nome', '* Cidade', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                             {{ Form::text('nome', Input::old('nome'), array('placeholder' => 'Nome da cidade', 'class' => 'form-control input-md', 'required', 'id' => 'cidade')) }}
                             {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group {{ $errors->first('url', 'has-error') }}">
                            {{ Form::label('url', '* URL', array('class' => 'col-md-3 control-label')) }}
                            <div class="col-md-7">
                                {{ Form::text('url', Input::old('url'), array('placeholder' => 'url-seguindo-o-padrao', 'class' => 'form-control input-md', 'required', 'id' => 'url')) }}
                                {{ $errors->first('url', '<span class="text-danger">:message</span>') }}
                            </div>
                        </div>

                        <!-- Text input-->
                        {{--<div class="form-group {{ $errors->first('ordem', 'has-error') }}">--}}
                          {{--{{ Form::label('ordem', '* Ordem', array('class' => 'col-md-3 control-label')) }}--}}
                          {{--<div class="col-md-7">--}}
                             {{--{{ Form::text('ordem', Input::old('ordem'), array('placeholder' => 'Ordem de exibição', 'class' => 'form-control input-md', 'required', 'maxlength' => '2')) }}--}}
                             {{--{{ $errors->first('ordem', '<span class="text-danger">:message</span>') }}--}}
                          {{--</div>--}}
                        {{--</div>--}}

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
    <!-- script de busca -->
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}" type="text/javascript"></script>
    <!-- fim de busca -->
    <script>

        /**
         * Formatar URL, quando os campos nome da cidade e url forem alterados
         */
        $("#cidade, #url").change(function(){

            var param = $(this).val();

            $.get( "{{ URL::route("format-url") }}/" + param , function(data){
                $( "#url" ).val( data );
            });
        });

    </script>
@stop