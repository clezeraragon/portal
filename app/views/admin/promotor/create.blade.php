{{-- Page title --}}
@section('title')
    {{$data['title']}}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <!--page level css -->
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Input com busca -->
    <link href="{{ asset('assets/vendors/select2/select2.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2-bootstrap.css') }}"/>
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet"/>
    <!-- end Input com busca -->
    <!--end of page level css-->
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::to($data['route']) }}" class="btn btn-info navbar-right btn_voltar"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
{{--{{dd(Promotor::comboboxUser())}}--}}
                <div class="portlet box primary">
                    <div class="portlet-title">
                        <div class="caption">
                            Cadastrar {{$data['title']}}
                        </div>
                    </div>
                    <div class="portlet-body">
                        {{ Form::open(array('url' => $data['route'], 'class' => 'form-horizontal')) }}
                        <fieldset>

                            <!-- Select Basic -->
                            <div class="form-group {{ $errors->first('user_id', 'has-error') }}">
                                {{ Form::label('user_id', '* Promotor', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('user_id', User::comboboxUser(), Input::old('user_id'), array('class' => 'form-control select2', 'required','id'=>'e1')) }}
                                    {{ $errors->first('user_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('responsavel_id', 'has-error') }}">
                                {{ Form::label('responsavel_id', 'Proprietário', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('responsavel_id', User::comboboxUser(), Input::old('responsavel_id'), array('class' => 'form-control select2','id'=>'e2')) }}
                                    {{ $errors->first('responsavel_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('cliente_id', 'has-error') }}">
                                {{ Form::label('cliente_id', 'Cliente', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-7">
                                    {{ Form::select('cliente_id', Cliente::combobox(), Input::old('cliente_id'), array('class' => 'form-control select2','id'=>'e3')) }}
                                    {{ $errors->first('cliente_id', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('observacao', 'has-error') }}">
                                {{ Form::label('observacao', 'Observação', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::textarea('observacao', Input::old('observacao'), array('placeholder' => 'Observaçao', 'class' => 'form-control', 'size' => '30x2', 'maxlength' => '160')) }}
                                    {{ $errors->first('observacao', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('status', 'has-error') }} ">
                                {{ Form::label('status', '* Status', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    <label class="radio-inline" for="radios-0">
                                        <input type="radio" name="status"  value="1"checked="checked" >
                                        Ativo
                                    </label>
                                    <label class="radio-inline" for="radios-1">
                                        <input type="radio" name="status" value="0">
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

    <script src="{{ asset('/portal/js/jquery-mask/jquery.mask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/js/custom/custom.js') }}" type="text/javascript"></script>

    <!-- script de busca -->
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/ckeditor/adapters/jquery.js') }}"></script>
    <!-- fim de busca -->



@stop