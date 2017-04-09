<div id="create-account" class="white-popup mfp-with-anim mfp-hide">
    <form action="{{ route('signup') }}" autocomplete="on" method="post" role="form" id="ajaxform">

        <div class="page-header">
            <h3>Faça parte do iSonhei</h3>
            <p class="nome_indicador_cadastro">
                @if(Session::get('fidelidade_indicador'))
                    Você foi indicado por <strong>{{Session::get('fidelidade_indicador.nome')}}</strong>
                @endif
            </p>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

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
                        <div class="input-group-addon">Data Nasc.:</div>
                        {{ Form::text('dt_nascimento', Input::old('dt_nascimento'), array('placeholder' => 'dd/mm/yyyy','class' => 'form-control input-md', 'id' => 'dt_nascimento' ,'required')) }}
                    </div>
                    <div class="col-sm-16" id="dt_nascimento-errors"></div>
                </div>
            </div>
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
        </div>

        <div class="row">
            <div class="col-sm-16">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Indicação: &nbsp;</div>
                        {{ Form::text('codigo_fidelidade', Input::old('codigo_fidelidade', (Session::get('fidelidade_indicador') ? Session::get('fidelidade_indicador.id') :  '')),
                                        array('placeholder' => 'Insira o código, caso seja indicado por um amigo. (opcional)','class' => 'form-control input-md', (Session::get('fidelidade_indicador') ? 'readonly' : ''))) }}
                    </div>
                    <div class="col-sm-16" id="codigo_fidelidade-errors"></div>
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
                    Desejo receber informações do iSonhei por e-mail.
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group">
                <div class="col-sm-16">
                    <p>
                        Ao clicar em "Cadastrar", você concorda os <a href="{{route('page-termo')}}" target="_blank"><strong> termos de uso e política de
                            privacidade</strong></a> do iSonhei.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-16">
                <center>
                    <input type="submit" value="Cadastrar" class="btn btn-primary btn-block1 btn-lg" tabindex="7">
                </center>
            </div>

        </div>
        <hr>
        <div class="row">

            <div class="col-xs-16">
                <div class="col-xs-8">

                </div>
                <div class="col-xs-8 col-xs-pull-1">
                    <div id="circularG">
                        <div id="circularG_1" class="circularG">
                        </div>
                        <div id="circularG_2" class="circularG">
                        </div>
                        <div id="circularG_3" class="circularG">
                        </div>
                        <div id="circularG_4" class="circularG">
                        </div>
                        <div id="circularG_5" class="circularG">
                        </div>
                        <div id="circularG_6" class="circularG">
                        </div>
                        <div id="circularG_7" class="circularG">
                        </div>
                        <div id="circularG_8" class="circularG">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

