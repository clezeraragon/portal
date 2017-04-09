
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

    <!-- header Start -->
    <div class="container">
        <div class="page-header">
            <h1>{{$data['title_pag']}} </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('portal') }}">Home</a></li>
                <li><a href="{{ route('portal-painel') }}">Painel</a></li>
                <li class="active">Meus Dados</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-md-4 col-xs-16">
                    <div class="bordered">
                        <div class="row ">

                            @include("portal.painel.menu_lateral")

                        </div>
                    </div>
                </div>

                <!-- left sec Start -->
                <div class="col-md-12 col-sm-12 col-xs-16">
                    <div class="bordered painel_box_conteudo">
                        <div class="row">
                                <h3>Meus Dados</h3>
                                {{ Form::open(array('url' => $data['route'] , 'method' => 'put', 'class' => 'form-horizontal')) }}
                                   <fieldset>
                                       <!-- Text input-->
                                       <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                         {{ Form::label('first_name', '* Nome', array('class' => 'col-md-4 control-label')) }}
                                         <div class="col-md-8">
                                            {{ Form::text('first_name', Input::old('first_name', $usuario->first_name), array('placeholder' => 'Nome','class' => 'form-control input-md', 'required')) }}
                                            {{ $errors->first('first_name', '<span class="text-danger">:message</span>') }}
                                         </div>
                                       </div>

                                       <!-- Text input-->
                                        <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                                            {{ Form::label('last_name', '* Sobre Nome', array('class' => 'col-md-4 control-label')) }}
                                            <div class="col-md-8">
                                                {{ Form::text('last_name', Input::old('last_name', $usuario->last_name), array('placeholder' => 'Sobre Nome','class' => 'form-control input-md', 'required')) }}
                                                {{ $errors->first('last_name', '<span class="text-danger">:message</span>') }}
                                            </div>
                                        </div>

                                       <!-- Text input-->
                                       <div class="form-group {{ $errors->first('cpf', 'has-error') }}">
                                           {{ Form::label('cpf', 'CPF', array('class' => 'col-md-4 control-label')) }}
                                           <div class="col-md-8">
                                               @if(!\Sentry::getUser()->cpf)
                                                   {{ Form::text('cpf', Input::old('cpf', $usuario->cpf), array('placeholder' => '','class' => 'form-control input-md', 'maxlength' => '14', 'id' => 'cpf')) }}
                                               @else
                                                   {{ Form::text('cpf', Input::old('cpf', $usuario->cpf), array('placeholder' => '','class' => 'form-control input-md', 'maxlength' => '14', 'id' => 'cpf', 'disabled')) }}
                                               @endif
                                               {{ $errors->first('cpf', '<span class="text-danger">:message</span>') }}
                                           </div>
                                       </div>

                                       <!-- Text input-->
                                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                            {{ Form::label('email', '* E-mail', array('class' => 'col-md-4 control-label')) }}
                                            <div class="col-md-8">
                                                {{ Form::email('email', Input::old('email', $usuario->email), array('placeholder' => 'Email','class' => 'form-control input-md', 'required', 'disabled' => 'disabled')) }}
                                                {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group {{ $errors->first('dt_nascimento', 'has-error') }}">
                                            {{ Form::label('dt_nascimento', '* Data de Nascimento', array('class' => 'col-md-4 control-label')) }}
                                            <div class="col-md-8">
                                                {{ Form::text('dt_nascimento', Input::old('dt_nascimento', Util::toView($usuario->dt_nascimento)), array('placeholder' => 'dd/mm/yyyy','class' => 'form-control input-md', 'required',
                                                                                                                                                            'id' => 'dt_nascimento')) }}
                                                {{ $errors->first('dt_nascimento', '<span class="text-danger">:message</span>') }}
                                            </div>
                                        </div>

                                       <!-- Text input-->
                                       <div class="form-group {{ $errors->first('telefone', 'has-error') }}">
                                           {{ Form::label('telefone', 'Telefone', array('class' => 'col-md-4 control-label')) }}
                                           <div class="col-md-8">
                                               {{ Form::text('telefone', Input::old('telefone', $usuario->telefone), array('placeholder' => '(00) 00000-0000','class' => 'form-control input-md', 'id' => 'phone')) }}
                                               {{ $errors->first('telefone', '<span class="text-danger">:message</span>') }}
                                           </div>
                                       </div>

                                        <!-- Multiple Radios (inline) -->
                                        <div class="form-group" {{ $errors->first('genero', 'has-error') }}>
                                          {{ Form::label('genero', '* Gênero', array('class' => 'col-md-4 control-label')) }}
                                          <div class="col-md-8">
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

                                        <!-- Password input-->
                                        <div class="form-group" {{ $errors->first('password', 'has-error') }}>
                                          {{ Form::label('password', 'Nova Senha', array('class' => 'col-md-4 control-label')) }}
                                          <div class="col-md-8">
                                              {{ Form::password('password', array('class' => 'form-control ', 'id' =>'password','placeholder'=>'Digite sua senha')) }}
                                            {{--{{ Form::password('password', null, array('class' => 'form-control input-md')) }}--}}
                                            {{ $errors->first('password', '<span class="text-danger">:message</span>') }}
                                            <span class="help-block">Preencha apenas se desejar trocar a senha</span>
                                          </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="form-group" {{ $errors->first('password_confirm', 'has-error') }}>
                                          {{ Form::label('password_confirm', 'Confirmar Nova Senha', array('class' => 'col-md-4 control-label')) }}
                                          <div class="col-md-8">
                                              {{ Form::password('password_confirm', array('class' => 'form-control ', 'id' =>'password','placeholder'=>'Digite sua senha')) }}
                                            {{--{{ Form::password('password_confirm', null, array('class' => 'form-control input-md')) }}--}}
                                            {{ $errors->first('password_confirm', '<span class="text-danger">:message</span>') }}
                                            <span class="help-block">Preencha apenas se desejar trocar a senha</span>
                                          </div>
                                        </div>

                                       <!-- Multiple Radios (inline) -->
                                       <div class="form-group" {{ $errors->first('st_newsletter', 'has-error') }}>
                                           {{ Form::label('st_newsletter', '* Deseja receber nossa Newsletter?', array('class' => 'col-md-4 control-label')) }}
                                           <div class="col-md-8">
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

                                       <!-- Button -->
                                       <div class="form-group">
                                         <label class="col-md-4 control-label" for="cadastrar"></label>
                                         <div class="col-md-8">
                                           {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
                                         </div>
                                       </div>

                                   </fieldset>

                                {{ Form::close() }}

                        </div>
                    </div>
                </div>
                <!-- left sec End -->
            </div>
        </div>
    </section>
    <!-- Data End -->
</div>
<!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop

