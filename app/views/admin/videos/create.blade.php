
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
          <div class="form-group {{ $errors->first('cliente_id', 'has-error') }}">
            {{ Form::label('cliente_id', 'Cliente', array('class' => 'control-label col-md-3')) }}
            <div class="col-md-7">
              {{ Form::select('cliente_id', Cliente::combobox(), Input::old('cliente_id'), array('class' => 'form-control select2','id'=>'e1')) }}
              {{ $errors->first('cliente_id', '<span class="text-danger">:message</span>') }}
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group {{ $errors->first('link', 'has-error') }}">
            {{ Form::label('link', '* URL', array('class' => 'control-label col-md-3')) }}
            <div class="col-md-7">
              {{ Form::text('link', Input::old('link'), array('placeholder' => 'www.', 'class' => 'form-control input-md', 'required')) }}
              {{ $errors->first('link', '<span class="text-danger">:message</span>') }}
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group {{ $errors->first('titulo', 'has-error') }}">
            {{ Form::label('titulo', '* Titulo', array('class' => 'control-label col-md-3')) }}
            <div class="col-md-7">
              {{ Form::text('titulo', Input::old('titulo'), array('placeholder' => 'Titulo do Video', 'class' => 'form-control input-md', 'required')) }}
              {{ $errors->first('titulo', '<span class="text-danger">:message</span>') }}
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
            {{ Form::label('descricao', '* Descrição', array('class' => 'control-label col-md-3')) }}
            <div class="col-md-7">
              {{ Form::textarea('descricao', Input::old('descricao'), array('placeholder' => 'Descrição do Video', 'class' => 'form-control input-md', 'required')) }}
              {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
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

<script src="{{ asset('assets/js/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/custom/custom.js') }}"></script>
<!-- script de busca -->
<script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/formelements.js') }}" type="text/javascript"></script>
<!-- fim de busca -->
<script>

    /**
     * Formatar URL, quando os campos nome da categoria e url forem alterados
     */
     $("#plano_id").change(function(){

      var param = $(this).val();

      $.get( "{{ URL::route("config-plano") }}/" + param , function(data){
        $( "#qtd_imagem" ).val( 10 );
        $( "#qtd_video" ).val( 10 );
      });

    });

   </script>

   @stop