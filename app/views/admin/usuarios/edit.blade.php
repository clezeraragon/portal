
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
            <br><br>
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        Editar {{$data['title']}}
                    </div>
                </div>
                <div class="portlet-body">
	                {{ Form::open(array('url' => $data['route'] . '/' . $usuario->id, 'method' => 'put', 'class' => 'form-horizontal')) }}
                       <fieldset>

                           <!-- Text input-->
                           <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                             {{ Form::label('first_name', '* Nome', array('class' => 'col-md-3 control-label')) }}
                             <div class="col-md-7">
                                {{ Form::text('first_name', Input::old('first_name', $usuario->first_name), array('placeholder' => 'Nome','class' => 'form-control input-md', 'required')) }}
                                {{ $errors->first('first_name', '<span class="text-danger">:message</span>') }}
                             </div>
                           </div>

                           <!-- Text input-->
                            <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                                {{ Form::label('last_name', '* Sobre Nome', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('last_name', Input::old('last_name', $usuario->last_name), array('placeholder' => 'Sobre Nome','class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('last_name', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                           <!-- Text input-->
                           <div class="form-group {{ $errors->first('cpf', 'has-error') }}">
                               {{ Form::label('cpf', '* CPF do Sonhador', array('class' => 'col-md-3 control-label')) }}
                               <div class="col-md-7">
                                   {{ Form::text('cpf', Input::old('cpf', $usuario->cpf), array('placeholder' => '','class' => 'form-control input-md', 'maxlength' => '14', 'id' => 'cpf', 'required', 'disabled' => 'disabled')) }}
                                   {{ $errors->first('cpf', '<span class="text-danger">:message</span>') }}
                               </div>
                           </div>

                           <!-- Text input-->
                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                {{ Form::label('email', '* Email', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::email('email', Input::old('email', $usuario->email), array('placeholder' => 'Email','class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group {{ $errors->first('genero', 'has-error') }}">
                              {{ Form::label('perfil_id', '* Perfil', array('class' => 'control-label col-md-3')) }}
                              <div class="col-md-7">
                                {{ Form::select('perfil_id', Perfil::options(), Input::old('perfil_id', $usuario->perfil_id), array('class' => 'form-control', 'required')) }}
                                {{ $errors->first('perfil_id', '<span class="text-danger">:message</span>') }}
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group {{ $errors->first('dt_nascimento', 'has-error') }}">
                                {{ Form::label('dt_nascimento', '* Data de Nascimento', array('class' => 'col-md-3 control-label')) }}
                                <div class="col-md-7">
                                    {{ Form::text('dt_nascimento', Input::old('dt_nascimento', Util::toView($usuario->dt_nascimento)), array('placeholder' => 'dd/mm/yyyy','class' => 'form-control input-md', 'required')) }}
                                    {{ $errors->first('dt_nascimento', '<span class="text-danger">:message</span>') }}
                                </div>
                            </div>

                           <!-- Text input-->
                           <div class="form-group {{ $errors->first('telefone', 'has-error') }}">
                               {{ Form::label('telefone', '* Telefone', array('class' => 'col-md-3 control-label')) }}
                               <div class="col-md-7">
                                   {{ Form::text('telefone', Input::old('telefone', $usuario->telefone), array('placeholder' => '(99) 999999999','class' => 'form-control input-md', 'required',
                                                                                                                                               'id' => 'phone')) }}
                                   {{ $errors->first('telefone', '<span class="text-danger">:message</span>') }}
                               </div>
                           </div>

                            <!-- Multiple Radios (inline) -->
                            <div class="form-group" {{ $errors->first('genero', 'has-error') }}>
                              {{ Form::label('genero', '* Gênero', array('class' => 'col-md-3 control-label')) }}
                              <div class="col-md-7">
                                <label class="radio-inline" for="radios-0">
                                  <input type="radio" name="genero" id="genero-0" value="F" @if($usuario->genero == "F") checked="checked" @endif>
                                  Feminino
                                </label>
                                <label class="radio-inline" for="radios-1">
                                  <input type="radio" name="genero" id="genero-1" value="M" @if($usuario->genero == "M") checked="checked" @endif>
                                  Masculino
                                </label>
                                {{ $errors->first('genero', '<span class="help-block">:message</span>') }}
                              </div>
                            </div>

                           <!-- Multiple Radios (inline) -->
                           <div class="form-group" {{ $errors->first('st_newsletter', 'has-error') }}>
                               {{ Form::label('st_newsletter', '* Deseja receber nossa Newsletter?', array('class' => 'col-md-3 control-label')) }}
                               <div class="col-md-7">
                                   <label class="radio-inline" for="radios-0">
                                       <input type="radio" name="st_newsletter" id="st_newsletter-0" value="1" @if($usuario->st_newsletter == 1) checked="checked" @endif>
                                       Sim
                                   </label>
                                   <label class="radio-inline" for="radios-1">
                                       <input type="radio" name="st_newsletter" id="st_newsletter-1" value="0" @if($usuario->st_newsletter == 0) checked="checked" @endif>
                                       Não
                                   </label>
                                   {{ $errors->first('st_newsletter', '<span class="help-block">:message</span>') }}
                               </div>
                           </div>

                            <!-- Password input-->
                            <div class="form-group" {{ $errors->first('password', 'has-error') }}>
                              {{ Form::label('password', 'Nova Senha', array('class' => 'col-md-3 control-label')) }}
                              <div class="col-md-7">
                                {{ Form::password('password', null, array('class' => 'form-control input-md')) }}
                                {{ $errors->first('password', '<span class="text-danger">:message</span>') }}
                                <span class="help-block">Preencha apenas se desejar trocar a senha</span>
                              </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group" {{ $errors->first('password_confirm', 'has-error') }}>
                              {{ Form::label('password_confirm', 'Confirmar Nova Senha', array('class' => 'col-md-3 control-label')) }}
                              <div class="col-md-7">
                                {{ Form::password('password_confirm', null, array('class' => 'form-control input-md')) }}
                                {{ $errors->first('password_confirm', '<span class="text-danger">:message</span>') }}
                                <span class="help-block">Preencha apenas se desejar trocar a senha</span>
                              </div>
                            </div>

                           <!-- Button -->
                           <div class="form-group">
                             <label class="col-md-3 control-label" for="cadastrar"></label>
                             <div class="col-md-7">
                               {{ Form::submit('Salvar', array('class' => 'btn btn-success', 'id' => 'teste')) }}
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
<!-- begining of page level js -->
<script src="{{ asset('/portal/js/jquery-mask/jquery.mask.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/custom/custom.js') }}" type="text/javascript"></script>

@stop