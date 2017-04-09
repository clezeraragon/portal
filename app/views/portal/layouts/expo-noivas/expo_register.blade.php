<div id="create-account-expo" class="white-popup mfp-with-anim mfp-hide">
    <form action="{{ route('signup-noivas') }}" autocomplete="on" method="post" role="form" id="ajaxform">
        <h3>Cadastrar</h3>

        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    {{--<input type="text" name="first_name" id="first_name" class="form-control" placeholder="Nome" tabindex="1">--}}
                    {{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'Nome','class' => 'form-control input-md', 'required')) }}
                    <div class="col-sm-16" id="first_name-errors"></div>
                </div>

            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    {{--<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Sobre Nome" tabindex="2">--}}
                    {{ Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Sobrenome','class' => 'form-control input-md', 'required')) }}
                    <div class="col-sm-16" id="last_name-errors"></div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">

                    {{--<input type="email" name="email" id="email" class="form-control " placeholder="E-mail" tabindex="4">--}}
                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'E-mail','class' => 'form-control input-md', 'required')) }}
                    <div class="col-sm-16" id="email-errors"></div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">

                    {{--<input type="email" name="email" id="email" class="form-control " placeholder="E-mail" tabindex="4">--}}
                    {{ Form::text('email_confirm', Input::old('email_confirm'), array('placeholder' => 'Confirmar E-mail','class' => 'form-control input-md', 'required')) }}
                    <div class="col-sm-16" id="email_confirm-errors"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    {{--<input type="password" name="password" id="password" class="form-control " placeholder="Senha" tabindex="5">--}}
                    {{ Form::password('password', array('placeholder' => 'Senha','class' => 'form-control input-md', 'required')) }}
                    <div class="col-sm-16" id="password-errors"></div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    {{--<input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirmar Senha" tabindex="6">--}}
                    {{ Form::password('password_confirm', array('placeholder' => 'Confirmar Senha','class' => 'form-control','id'=> 'password_confirm', 'required')) }}
                    <div class="col-sm-16" id="password_confirm-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Data Nasc. :</div>
                        {{ Form::text('dt_nascimento', Input::old('dt_nascimento'), array('placeholder' => 'dd/mm/yyyy','class' => 'form-control input-md', 'id' => 'dt_nascimento' ,'required')) }}
                    </div>
                    <div class="col-sm-16" id="dt_nascimento-errors"></div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">CPF :</div>
                        {{ Form::text('cpf', Input::old('cpf'), array('autocomplete'=>'off','autocorrect'=>'off','spellcheck'=>'off','placeholder' => 'Digite sem pontuação','class' => 'form-control input-md', 'id' => 'cpf' ,'required', 'maxlength' => '14')) }}
                    </div>
                    <div class="col-sm-16 " id="cpf-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <div class="row">
                        <div class="radio">
                            <label class="checkbox-inline">
                                {{--<input type="radio" name="genero" id="genero" value="F" required class="radio-inline" >Feminino--}}
                                {{ Form::radio('genero', 'F',Input::old('radio'), array('class' => 'radio-inline','required'))}}
                                Feminino
                            </label>

                            <label class="checkbox-inline">
                                {{--<input type="radio" name="genero" id="genero" value="M" required class="radio-inline" >Masculino--}}
                                {{ Form::radio('genero', 'M',Input::old('radio'), array('class' => 'radio-inline','required'))}}
                                Masculino
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-16" id="genero-errors"></div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Tel :</div>
                        {{--<input name="telefone" id="phone"  data-inputmask-clearmaskonlostfocus="true">--}}
                        {{ Form::text('telefone', Input::old('telefone'), array('placeholder' => '(00) 00000-0000','class' => 'form-control input-md','required', 'maxlength' => '15','id'=>'phone')) }}
                    </div>
                    <div class="col-sm-16 " id="telefone-errors"></div>
                </div>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8 perfil">
                <div class="form-group">
                    <select class="form-control selecaoOpcao" name="perfil_exponoiva">
                        <option value="" selected="selected">Selecione uma opção</option>
                        <option value="Noivo">Noivo</option>
                        <option value="Noiva">Noiva</option>
                        <option value="Parente">Parente</option>
                        <option value="Madrinha">Madrinha</option>
                        <option value="Outro">Outro</option>
                    </select>

                    <div class="col-sm-16" id="perfil_exponoiva-errors"></div>
                </div>

            </div>
            <div class="col-sm-8 mostraesconde">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Data Evento :</div>
                        {{ Form::text('dt_evento_exponoiva', Input::old('dt_evento_exponoiva'), array('placeholder' => 'dd/mm/yyyy','class' => 'form-control input-md requerida','id' => 'dt_evento_exponoiva', 'required')) }}
                    </div>
                    <div class="col-sm-16" id="dt_evento_exponoiva-errors"></div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-sm-8 mostraesconde">
                <div class="form-group">
                    {{--<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Sobre Nome" tabindex="2">--}}
                    {{ Form::text('local_cerimonia_exponoiva', Input::old('local_cerimonia_exponoiva'), array('placeholder' => 'Local da Cerimônia','class' => 'form-control input-md requerida', 'required')) }}
                    <div class="col-sm-16" id="local_cerimonia_exponoiva-errors"></div>
                </div>
            </div>
            <div class="col-sm-8 mostraesconde">
                <div class="form-group">
                    {{--<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Sobre Nome" tabindex="2">--}}
                    {{ Form::text('local_festa_exponoiva', Input::old('local_festa_exponoiva'), array('placeholder' => 'Local da Festa','class' => 'form-control input-md requerida', 'required')) }}
                    <div class="col-sm-16" id="local_festa_exponoiva-errors"></div>
                </div>

            </div>

        </div>

        <hr>
        <div class="row">
            <div class="form-group">
                <div class=" col-sm-1">
                    <div class="checkbox" style="margin-top: 0px; top: -15px;">
                        <label>
                            {{ Form::checkbox('concorda', 1, null, ['class' => 'field','id' => 'concorda'],'required') }}
                        </label>

                    </div>
                </div>
                <div class="col-sm-15">
                    Aceito os <a href="{{route('page-termo')}}" target="_blank"><strong> termos de uso e política de
                            privacidade</strong></a> do iSonhei.
                </div>
                <div class="row">
                    <div class="col-sm-16" id="concorda-errors" style="margin-left: 40px!important;"></div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class=" col-sm-1">
                    <div class="checkbox" style="margin-top: 0px; top: -15px;">
                        <label>
                            {{ Form::checkbox('st_newsletter', 1, null, ['class' => 'field','id' => 'newsletter']) }}
                        </label>

                    </div>
                </div>
                <div class="col-sm-15">
                    <strong> Desejo receber informações do iSonhei por e-mail.</strong>
                </div>
                <div class="row">
                    <div class="col-sm-16" id="concorda-errors"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-16">
                <input type="submit" value="Cadastrar" class="btn btn-primary btn-block btn-lg" tabindex="7">
            </div>

        </div>
    </form>
</div>

