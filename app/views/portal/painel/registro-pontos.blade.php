
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
<div>
    <!-- header Start -->
    <div class="container">
        <div class="page-header">
            <h1>{{$data['title_pag']}} </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('portal') }}">Home</a></li>
                <li class="active">{{$data['title_pag']}}</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container">

            @include('notifications')

            <div class="row">

                <div class="col-sm-4 col-md-4 col-xs-16">
                    <div class="bordered">
                        <div class="row">

                            @include("portal.painel.menu_lateral")

                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-sm-12 col-xs-16">
                    <div class="bordered painel_box_conteudo">
                        <div class="row">
                            <h3>Registre seus pontos</h3>
                            <br>

                            {{ Form::open(array('url' => Route($data['route']) ,  'class' => 'form-horizontal')) }}
                            <fieldset>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('codigo', 'has-error') }}">
                                    {{ Form::label('codigo', '* Código', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-10 col-sm-15">
                                        {{ Form::text('codigo', Input::old('codigo'), array('placeholder' => 'Insira aqui o seu código','class' => 'form-control input-md', 'required', 'maxlength' => '50')) }}
                                        {{ $errors->first('codigo', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="registrar"></label>
                                    <div class="col-md-10 col-sm-15" align="right">
                                        {{ Form::submit('Registrar', array('class' => 'btn btn-primary')) }}
                                    </div>
                                </div>

                            </fieldset>
                            {{ Form::close() }}

                        </div>
                    </div>
                </div>


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

