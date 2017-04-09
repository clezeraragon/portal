
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
                <li class="active">{{$data['title_pag']}}</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container">
            <div class="row">
                <!-- left sec Start -->
                <div class="col-sm-16">
                    <div class="row">

                        <a href="/site-sonhador/construtor/cotas/{{$siteid}}/" class="btn btn-success"></span>Voltar</a>
                        <hr>

                        {{ Form::open(array('url' => 'site-sonhador/construtor/cotas/' . $siteid . "/" . $rs->id, 'method' => 'put', 'class' => 'form-horizontal', 'files' => true)) }}
                            <fieldset>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('produto', 'has-error') }}">
                                    {{ Form::label('produto', '* Produto', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('produto', Input::old('produto', $rs->produto), array('placeholder' => '','class' => 'form-control input-md', 'required','maxlength' => '60')) }}
                                        {{ $errors->first('produto', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('vl_total', 'has-error') }}">
                                    {{ Form::label('vl_total', '* Valor Desejado', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('vl_total', Input::old('vl_total', Util::number($rs->vl_total,2)), array('id ' => 'vl_total','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('vl_total', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('qtd_cota', 'has-error') }}">
                                    {{ Form::label('qtd_cota', '* Qtd. Cota', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('qtd_cota', Input::old('qtd_cota', $rs->qtd_cota), array('id ' => 'qtd_cota', 'class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('qtd_cota', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('vl_unit', 'has-error') }}">
                                    {{ Form::label('vl_unit', '* Valor da Cota', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('vl_unit', Input::old('vl_unit', Util::number($rs->vl_unit,2)), array('id ' => 'vl_unit', 'placeholder' => '','class' => 'form-control input-md', 'required')) }}
                                        {{ $errors->first('vl_unit', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Multiple Radios (inline) -->
                                <div class="form-group" {{ $errors->first('status', 'has-error') }}>
                                    {{ Form::label('genero', '* Status', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        <label class="radio-inline" for="radios-0">
                                            <input type="radio" name="status" id="status-1" value="1" @if($rs->status == "1") checked="checked" @endif>
                                            Ativo
                                        </label>
                                        <label class="radio-inline" for="radios-1">
                                            <input type="radio" name="status" id="status-0" value="0" @if($rs->status == "0") checked="checked" @endif>
                                            Inativo
                                        </label>
                                        {{ $errors->first('status', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <!-- File Button -->
                                <div class="form-group {{ $errors->first('path_img', 'has-error') }}">
                                    <label class="col-md-3 control-label" for="filebutton">* Foto</label>
                                    <div class="col-md-7">
                                        <img src="{{ asset($rs->path_img) }}" width="200">
                                        <br><br>
                                        {{ Form::file('path_img', Input::old('path_img'), array('class' => 'form-control input-md input-file"', 'id' => 'path_img')) }}
                                        {{ $errors->first('path_img', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cadastrar"></label>
                                    <div class="col-md-7">
                                        {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
                                        <a href="/sonhador/{{$siteid}}/#3" class="btn btn-success">Visualizar o site</a>
                                    </div>
                                </div>

                            </fieldset>
                        {{ Form::close() }}

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

    <script src="{{ asset('/portal/js/jquery.maskMoney.js') }}"></script>
    <script type="text/javascript">$("#vl_total").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});</script>
    <script type="text/javascript">$("#vl_unit").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});</script>

    <script>
        $("#vl_total, #qtd_cota, #vl_unit").change(function(){

            var input    = $(this).attr('name');
            var vl_total = $('#vl_total').maskMoney('unmasked')[0];
            var qtd_cota = $("#qtd_cota").val();
            var vl_unit  = $("#vl_unit").maskMoney('unmasked')[0];

            if(input == "vl_total"){
                if(qtd_cota){
                    $("#vl_unit").maskMoney('mask', (vl_total / qtd_cota));
                }
            }
            if(input == "qtd_cota"){
                if(vl_total){
                    $("#vl_unit").maskMoney('mask', (vl_total / qtd_cota));
                }
            }
            if(input == "vl_unit"){
                if(qtd_cota){
                    $("#vl_total").maskMoney('mask', (vl_unit * qtd_cota));
                }
            }
        });
    </script>

@stop

