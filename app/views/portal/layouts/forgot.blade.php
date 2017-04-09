<div id="forgot" class="white-popup-login mfp-with-anim mfp-hide">
    <h3>Resetar sua Senha</h3>
    <hr>

    <div id="forgot" class="animate form">
        <form action="{{ route('forgot-password') }}" autocomplete="on" method="post" role="form" id="ajaxform">
            {{--<h3 class="black_bg">--}}
            {{--<img src="{{ asset('assets/img/logo.png') }}" alt="josh logo">Password</h3>--}}
            <p>
                Digite seu e-mail no campo abaixo para receber um link especial de redefinição de senha.
            </p>

            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <div class="row">
                <div class="form-group">
                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'seuemail@mail.com','class' => 'form-control input-md', 'required')) }}
                    <div class="col-sm-16" id="email-errors"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-xs-push-9">
                    <div class="col-xs-5 col-xs-pull-1">
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

                    <p class="login button">
                        <input type="submit" value="Enviar" class="btn btn-primary"/>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>