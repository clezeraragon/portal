
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

      <div class="portlet box primary">
        <div class="portlet-title">
          <div class="caption">
            Cadastrar {{$data['title']}}
          </div>
        </div>
        <div class="portlet-body">
         {{ Form::open(array('url' => $data['route'], 'class' => 'form-horizontal')) }}
         <fieldset>

          <!-- Text input-->
          <div class="form-group {{ $errors->first('categoria', 'has-error') }}">
            {{ Form::label('categoria', '* Categoria', array('class' => 'col-md-3 control-label')) }}
            <div class="col-md-7">
             {{ Form::text('categoria', Input::old('categoria'), array('placeholder' => 'Nome da categoria', 'class' => 'form-control input-md', 'required', 'id' => 'categoria')) }}
             {{ $errors->first('categoria', '<span class="text-danger">:message</span>') }}
           </div>
         </div>

         <!-- Text input-->
         <div class="form-group {{ $errors->first('url', 'has-error') }}">
          {{ Form::label('url', '* URL', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-7">
           {{ Form::text('url', Input::old('url'), array('placeholder' => 'url-seguindo-o-padrao', 'class' => 'form-control input-md', 'required', 'id' => 'url')) }}
           {{ $errors->first('url', '<span class="text-danger">:message</span>') }}
         </div>
       </div>

       <!-- Textarea -->
       <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
        {{ Form::label('descricao', '* Descrição', array('class' => 'col-md-3 control-label')) }}
        <div class="col-md-7">
          {{ Form::textarea('descricao', Input::old('descricao'), array('placeholder' => 'Descrição', 'class' => 'form-control', 'required', 'size' => '30x2')) }}
          {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group {{ $errors->first('titulo_pag', 'has-error') }}">
        {{ Form::label('titulo_pag', '* Título da página', array('class' => 'col-md-3 control-label')) }}
        <div class="col-md-7">
         {{ Form::text('titulo_pag', Input::old('titulo_pag'), array('placeholder' => 'Título da página', 'class' => 'form-control input-md', 'required')) }}
         {{ $errors->first('titulo_pag', '<span class="text-danger">:message</span>') }}
       </div>
     </div>

     <!-- Text input-->
     <div class="form-group {{ $errors->first('descricao_pag', 'has-error') }}">
      {{ Form::label('descricao_pag', '* Descrição da página', array('class' => 'col-md-3 control-label')) }}
      <div class="col-md-7">
       {{ Form::text('descricao_pag', Input::old('descricao_pag'), array('placeholder' => 'Descrição da Página', 'class' => 'form-control input-md', 'required')) }}
       {{ $errors->first('descricao_pag', '<span class="text-danger">:message</span>') }}
     </div>
   </div>

   <!-- Text input-->
   <div class="form-group {{ $errors->first('palavras_pag', 'has-error') }}">
    {{ Form::label('palavras_pag', '* Palavras chave da página', array('class' => 'col-md-3 control-label')) }}
    <div class="col-md-7">
     {{ Form::text('palavras_pag', Input::old('palavras_pag'), array('placeholder' => 'Palavras chave da Página', 'class' => 'form-control input-md', 'required')) }}
     {{ $errors->first('palavras_pag', '<span class="text-danger">:message</span>') }}
   </div>
 </div>

 <!-- Multiple Radios (inline) -->
 <div class="form-group {{ $errors->first('tipo_categoria', 'has-error') }}">
   {{ Form::label('tipo_categoria', '* Tipo Categoria', array('class' => 'col-md-3 control-label')) }}
   <div class="col-md-7">
     <label class="radio-inline" for="radios-0">
       <input type="radio" name="tipo_categoria" id="tipo_categoria-pai" value="Pai">
       Pai
     </label>
     <label class="radio-inline" for="radios-1">
       <input type="radio" name="tipo_categoria" id="tipo_categoria-filha" value="Filha">
       Filha
     </label>
     {{ $errors->first('tipo_categoria', '<span class="text-danger">:message</span>') }}
   </div>
 </div>

 <div id="categoria_pai" style="display:none;">
   <!-- Select Basic -->
   <div class="form-group {{ $errors->first('categoria_pai', 'has-error') }}">
     {{ Form::label('categoria_pai', '* Categoria Pai', array('class' => 'control-label col-md-3')) }}
     <div class="col-md-7">
       {{ Form::select('categoria_pai', ConteudoCategoria::options(), Input::old('categoria_pai'), array('class' => 'form-control', 'id' => 'input_categoria_pai')) }}
       {{ $errors->first('categoria_pai', '<span class="text-danger">:message</span>') }}
     </div>
   </div>
 </div>

 <!-- Multiple Radios (inline) -->
 <div class="form-group {{ $errors->first('status', 'has-error') }} ">
   {{ Form::label('status', '* Status', array('class' => 'col-md-3 control-label')) }}
   <div class="col-md-7">
     <label class="radio-inline" for="radios-0">
       <input type="radio" name="status"  value="1">
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
<script>

    /**
     * Formatar URL, quando os campos nome da categoria e url forem alterados
     */
     $("#categoria, #url").change(function(){

      var param = $(this).val();

      $.get( "{{ URL::route("format-url") }}/" + param , function(data){
        $( "#url" ).val( data );
      });
    });

    /**
     * Habilitar e Desabilitar campo Categoria Pai de acordo com a seleção do campo tipo categoria
     */
     $(function () {
      $("#tipo_categoria-pai, #tipo_categoria-filha").click(function () {

        var param = $(this).val();

        //RCO-005
        if(param == "Pai"){
          $('#input_categoria_pai').removeAttr('required');
          $('#categoria_pai').hide();
        }
        if(param == "Filha"){
          $('#input_categoria_pai').attr('required', true);
          $('#categoria_pai').show();
        }
      });
    });

   </script>
   @stop