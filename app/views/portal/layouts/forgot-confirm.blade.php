@extends('portal/layouts/default')

{{-- Page title --}}
@section('title'){{'Redefinir Senha'}}@stop

@section('description'){{'Redefinir Senha'}}@stop

@section('keywords'){{'Redefinir Senha'}}@stop

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
                <h1>Redefinir Senha </h1>

            </div>
        </div>
        <!-- header End -->

        <!-- data Start -->
        <section>
            <div class="container ">
                <div class="row ">
                    <!-- left sec Start -->
                    <div class="col-sm-6">
                        <div class="row">
                            <form action="{{ route('post-forgot-password-confirm') }}" autocomplete="on" method="post" role="form">
                                <fieldset>
                                    <input type="hidden" name="passwordResetCode" value="{{{ $passwordResetCode }}}">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <!-- Text input-->
                                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                        <div class="col-xs-13">
                                            {{ Form::label('password', '* Nova Senha', array('class' => 'col-md-7 control-label')) }}
                                            {{--<input id="password" name="password" required type="password" placeholder="eg. X8df!90EO" />--}}
                                            {{--<div class="col-sm-6">--}}
                                            {{--<div class="col-xs-8">--}}
                                            {{ Form::password('password', array('class' => 'form-control ', 'id' =>'password','placeholder'=>'Digite sua nova senha','required')) }}
                                            {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    {{--<div class="row">--}}
                                    <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                                        <div class="col-xs-13">
                                            <br>
                                            {{ Form::label('password', '* Confimar Nova Senha', array('class' => 'col-md-10 control-label')) }}
                                            {{--<label style="margin-bottom:0px;" for="passwor_confirm" class="youpasswd">--}}
                                            {{--<i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>--}}
                                            {{--Confimar Nova Senha--}}
                                            {{--</label>--}}
                                            {{ Form::password('password_confirm',array('class' => 'form-control input-md', 'id' =>'password_confirm','placeholder'=>'Confirme sua nova senha','required')) }}
                                            {{--<input id="password_confirm" name="password_confirm" required type="password" placeholder="eg. X8df!90EO" />--}}
                                            {{--<div class="col-sm-6 col-md-6">--}}
                                            {{--{{ Form::password('password_confirm',array('class' => 'form-control input-md', 'id' =>'password_confirm','placeholder'=>'Digite sua senha','required')) }}--}}
                                            {{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}

                                        </div>
                                    </div>

                                    @if($user->st_portal_antigo == 1)
                                        <div class="row">
                                            <div class="form-group">
                                                <div class=" col-sm-4">
                                                    <br>
                                                    <div class="checkbox" style="margin-top: 0px; top: 0px; top: -14px;" >
                                                        <label>
                                                            {{ Form::checkbox('concorda', 1, null, ['class' => 'field','id' => 'concorda','required']) }}
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-sm-pull-3 ">
                                                    <br>
                                                    Você concorda com os <a href="{{route('page-termo')}}" target="_blank"><strong> termos de uso e política de privacidade</strong></a> do iSonhei.
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-16" id="concorda-errors"></div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-xs-12">
                                        <br>
                                        <p class="login button">
                                            <input type="submit" value="Enviar" class="btn btn-primary"/>
                                        </p>
                                    </div>

                                </fieldset>
                            </form>
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

