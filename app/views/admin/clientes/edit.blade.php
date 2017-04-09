{{-- Page title --}}
@section('title')
{{$data['title']}}

@parent
@stop
{{--{{$error}}--}}
{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<!-- end of page level css-->
@stop


{{-- Page content --}}
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
          {{ Form::open(array('url' => $data['route'] . '/' . $rs->id, 'method' => 'put', 'class' => 'form-horizontal','files' => true))}}
          {{Form::hidden('id',isset($rs->id)? $rs->id : '')}}
           <fieldset>

                   <!-- Select Basic -->
                   <div class="form-group {{ $errors->first('vendedor_id', 'has-error') }} ">
                       {{ Form::label('vendedor_id', 'Vendedor', array('class' => 'control-label col-md-3')) }}
                       <div class="input-group col-md-7">
                           {{ Form::select('vendedor_id', Vendedor::combobox(), Input::old('vendedor_id', $rs->vendedor_id), array('class' => 'form-control ')) }}
                           {{ $errors->first('vendedor_id', '<span class="text-danger">:message</span>') }}
                       </div>
                   </div>

                      <div class="form-group {{ $errors->first('nm_razao_social', 'has-error') }}">
                       {{ Form::label('nm_razao_social', '* Razão Social', array('class' => 'col-md-3 control-label')) }}
                       <div class="input-group col-md-7">
                        {{--<span class="input-group-addon"><i class="fa fa-circle col-md-3"></i></span>--}}
                        {{Form::text('nm_razao_social',isset($rs->nm_razao_social) ? $rs->nm_razao_social : Input::old('nm_razao_social'),array('class' => 'form-control','required'))}}
                        {{ $errors->first('nm_razao_social', '<span class="text-danger">:message</span>') }}
                      </div>
                    </div>

                    <div class="form-group {{ $errors->first('nm_nome_fantasia', 'has-error') }}">
                      {{ Form::label('nm_nome_fantasia', '* Nome Fantasia', array('class' => 'col-md-3 control-label')) }}
                      <div class="col-md-7 input-group">
                       {{--<span class="input-group-addon"><i class="fa fa-thumb-tack col-md-3"></i></span>--}}
                       {{Form::text('nm_nome_fantasia', isset($rs->nm_nome_fantasia) ? $rs->nm_nome_fantasia : Input::old('nm_nome_fantasia'),array('class' => 'form-control','required'))}}
                       {{ $errors->first('nm_nome_fantasia', '<span class="text-danger">:message</span>') }}
                     </div>
                   </div>

                   <!-- Text input-->
                   <div class="form-group {{ $errors->first('url', 'has-error') }}">
                       {{ Form::label('url', '* URL', array('class' => 'col-md-3 control-label')) }}
                       <div class="col-md-7 input-group">
                           {{ Form::text('url', Input::old('url', $rs->url), array('placeholder' => 'url-seguindo-o-padrao', 'class' => 'form-control input-md', 'required', 'id' => 'url', 'disabled' => 'disabled')) }}
                           {{ $errors->first('url', '<span class="text-danger">:message</span>') }}
                       </div>
                   </div>

                   <div class="form-group {{ $errors->first('nm_cnpj', 'has-error') }}">
                     {{ Form::label('nm_cnpj', 'CNPJ', array('class' => 'col-md-3 control-label')) }}
                     <div class="col-md-7 input-group">
                      {{--<span class="input-group-addon"><i class="fa fa-thumb-tack col-md-3"></i></span>--}}
                      {{Form::text('nm_cnpj',isset($rs->nm_cnpj) ? $rs->nm_cnpj : Input::old('nm_cnpj'),array('class' => 'form-control'))}}
                      {{ $errors->first('nm_cnpj', '<span class="text-danger">:message</span>') }}
                    </div>
                  </div>
                  <div class="form-group {{ $errors->first('nm_cpf', 'has-error') }}">
                   {{ Form::label('nm_cpf', 'CPF', array('class' => 'col-md-3 control-label')) }}
                   <div class="col-md-7 input-group">
                    {{--<span class="input-group-addon"><i class="fa fa-thumb-tack col-md-3"></i></span>--}}
                    {{Form::text('nm_cpf',isset($rs->nm_cpf) ? $rs->nm_cpf : Input::old('nm_cpf'),array('class' => 'form-control', 'id' => 'cpf'))}}
                    {{ $errors->first('nm_cpf', '<span class="text-danger">:message</span>') }}
                  </div>
                </div>
                 <div class="form-group {{ $errors->first('nm_responsavel', 'has-error') }}">
                   {{ Form::label('nm_responsavel', 'Responsável', array('class' => 'col-md-3 control-label')) }}
                   <div class="col-md-7 input-group">
                    {{--<span class="input-group-addon"><i class="fa fa-users col-md-3"></i></span>--}}
                    {{Form::text('nm_responsavel',isset($rs->nm_responsavel) ? $rs->nm_responsavel : Input::old('nm_responsavel'),array('class' => 'form-control'))}}
                    {{ $errors->first('nm_responsavel', '<span class="text-danger">:message</span>') }}
                  </div>
                </div>

               <div class="form-group {{ $errors->first('nm_email_responsavel', 'has-error') }}">
                   {{ Form::label('nm_email_responsavel', '* E-mail Responsável', array('class' => 'col-md-3 control-label')) }}
                   <div class="col-md-7 input-group input-group">
                       {{--<span class="input-group-addon "><i class="col-md-3">@</i></span>--}}
                       {{Form::email('nm_email_responsavel',isset($rs->nm_email_responsavel) ? $rs->nm_email_responsavel :  Input::old('nm_email_responsavel'),array('class' => 'form-control', 'id' => 'email','required'))}}
                       {{ $errors->first('nm_email_responsavel', '<span class="text-danger">:message</span>') }}
                   </div>
               </div>
               <div class="form-group {{ $errors->first('nm_email_administrativo', 'has-error') }}">
                   {{ Form::label('nm_email_administrativo', 'E-mail Administrativo', array('class' => 'col-md-3 control-label')) }}
                   <div class="col-md-7 input-group input-group">
                       {{Form::email('nm_email_administrativo',  Input::old('nm_email_administrativo', $rs->nm_email_administrativo), array('class' => 'form-control', 'id' => 'email-admin',))}}
                       {{ $errors->first('nm_email_administrativo', '<span class="text-danger">:message</span>') }}
                   </div>
               </div>

               <div class="form-group {{ $errors->first('nm_cep', 'has-error') }}">
                {{ Form::label('nm_cep', 'CEP', array('class' => 'col-md-3 control-label')) }}
                <div class="col-md-7 input-group" id="cep">
                 {{--<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker col-md-3"></i></span>--}}
                 {{Form::text('nm_cep',isset($rs->nm_cep) ? $rs->nm_cep : Input::old('nm_cep'),array('class' => 'form-control'))}}
                 {{--{{Form::text('nm_cep', Input::old('nm_cep'),array('class' => 'form-control', 'id' => 'cep'))}}--}}
                 {{ $errors->first('nm_cep', '<span class="text-danger">:message</span>') }}
               </div>
               </div>

               <div class="form-group {{ $errors->first('nm_endereco', 'has-error') }}">
                {{ Form::label('nm_endereco', '* Endereço', array('class' => 'col-md-3 control-label')) }}
                <div class="col-md-7 input-group">

                 {{--<span class="input-group-addon"><i class="fa fa-road col-md-3"></i></span>--}}

                 {{Form::text('nm_endereco',isset($rs->nm_endereco) ? $rs->nm_endereco : Input::old('nm_endereco'),array('class' => 'form-control','required'))}}
                 {{ $errors->first('nm_endereco', '<span class="text-danger">:message</span>') }}

               </div>
             </div>

             <div class="form-group {{ $errors->first('nu_numero', 'has-error') }}">
               {{ Form::label('nu_numero', '* Número', array('class' => 'col-md-3 control-label')) }}
               <div class="col-md-7 input-group">
                {{--<span class="input-group-addon"><i class="fa fa-home col-md-3"></i></span>--}}
                {{Form::text('nu_numero',isset($rs->nu_numero) ? $rs->nu_numero :  Input::old('nu_numero'),array('class' => 'form-control','required'))}}
                {{ $errors->first('nu_numero', '<span class="text-danger">:message</span>') }}
              </div>
            </div>
            <div class="form-group {{ $errors->first('nm_complemento', 'has-error') }}">
             {{ Form::label('nm_complemento', 'Complemento', array('class' => 'col-md-3 control-label')) }}
             <div class="col-md-7 input-group">
              {{--<span class="input-group-addon"><i class="fa fa-home col-md-3"></i></span>--}}
              {{Form::text('nm_complemento',isset($rs->nm_complemento) ? $rs->nm_complemento : Input::old('nm_complemento'),array('class' => 'form-control'))}}
              {{ $errors->first('nm_complemento', '<span class="text-danger">:message</span>') }}
            </div>
            </div>

            <div class="form-group {{ $errors->first('nm_bairro', 'has-error') }}">
              {{ Form::label('nm_bairro', 'Bairro', array('class' => 'col-md-3 control-label')) }}
              <div class="col-md-7 input-group">
               {{--<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker col-md-3"></i></span>--}}
               {{Form::text('nm_bairro',isset($rs->nm_bairro) ? $rs->nm_bairro : Input::old('nm_bairro'),array('class' => 'form-control'))}}
               {{ $errors->first('nm_bairro', '<span class="text-danger">:message</span>') }}
             </div>
            </div>
            <div class="form-group {{ $errors->first('nm_cidade', 'has-error') }}">
              {{ Form::label('nm_cidade', 'Cidade', array('class' => 'col-md-3 control-label')) }}
              <div class="col-md-7 input-group">
               {{--<span class="input-group-addon"><i class="fa fa-home col-md-3"></i></span>--}}
               {{Form::text('nm_cidade', isset($rs->nm_cidade) ? $rs->nm_cidade : Input::old('nm_cidade'),array('class' => 'form-control'))}}
               {{ $errors->first('nm_cidade', '<span class="text-danger">:message</span>') }}
             </div>
            </div>
            <div class="form-group {{ $errors->first('nm_uf', 'has-error') }}">
             {{ Form::label('nm_uf', 'Estado', array('class' => 'col-md-3 control-label')) }}
             <div class="col-md-7 input-group">
              {{--<span class="input-group-addon"><i class="fa fa-home col-md-3"></i></span>--}}
              {{Form::text('nm_uf',isset($rs->nm_uf) ? $rs->nm_uf : Input::old('nm_uf'),array('class' => 'form-control'))}}
              {{ $errors->first('nm_uf', '<span class="text-danger">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->first('st_google_maps', 'has-error') }} ">
                <br>
                {{ Form::label('st_google_maps', '* Deseja exibir o Mapa?', array('class' => 'col-md-3 control-label')) }}
                <div class="col-md-7  input-group">
                    <label class="radio-inline" for="radios-0">
                        <input type="radio" name="st_google_maps"  value="1" @if($rs->st_google_maps == "1") checked="checked" @endif>
                        Sim
                    </label>
                    <label class="radio-inline" for="radios-1">
                        <input type="radio" name="st_google_maps" value="0" @if($rs->st_google_maps == "0") checked="checked" @endif>
                        Não
                    </label>
                    {{ $errors->first('st_google_maps', '<span class="text-danger">:message</span>') }}
                </div>
            </div>

            </div>
            <div class="form-group {{ $errors->first('nm_telefone1', 'has-error') }}">
                {{ Form::label('nm_telefone1', 'Telefone 1', array('class' => 'col-md-3 control-label')) }}
                <div class="col-md-7 input-group">
                 {{--{{Form::text('nm_telefone1', Input::old('nm_telefone1'),array('class' => 'form-control', 'id' => 'phone-codes'))}}--}}
                 {{Form::text('nm_telefone1',isset($rs->nm_telefone1) ? $rs->nm_telefone1 : Input::old('nm_telefone1'),array('class' => 'form-control'))}}
                 {{ $errors->first('nm_telefone1', '<span class="text-danger">:message</span>') }}
               </div>
              </div>
            <div class="form-group {{ $errors->first('nm_telefone2', 'has-error') }}">
             {{ Form::label('nm_telefone2', 'Telefone 2', array('class' => 'col-md-3 control-label')) }}
             <div class="col-md-7 input-group">
              {{--<span class="input-group-addon"><i class="fa fa-phone col-md-3"></i></span>--}}
              {{Form::text('nm_telefone2',isset($rs->nm_telefone2) ? $rs->nm_telefone2 :  Input::old('nm_telefone2'),array('class' => 'form-control'))}}
              {{--{{Form::text('nm_telefone2',  Input::old('nm_telefone2'),array('class' => 'form-control', 'id' => 'phone-codes2'))}}--}}
              {{ $errors->first('nm_telefone2', '<span class="text-danger">:message</span>') }}
            </div>
            </div>
            <div class="form-group {{ $errors->first('nm_site', 'has-error') }}">
              {{ Form::label('nm_site', 'Site', array('class' => 'col-md-3 control-label')) }}
              <div class="col-md-7 input-group">
               {{--<span class="input-group-addon"><i class="fa fa-anchor col-md-3"></i></span>--}}
               {{Form::text('nm_site',isset($rs->nm_site) ? $rs->nm_site : Input::old('nm_site'),array('placeholder' => 'http:// ou https://','class' => 'form-control'))}}
               {{ $errors->first('nm_site', '<span class="text-danger">:message</span>') }}
             </div>
            </div>
          <div class="form-group {{ $errors->first('nm_link_facebook', 'has-error') }}">
            {{ Form::label('nm_link_facebook', 'Facebook', array('class' => 'col-md-3 control-label')) }}
            <div class="col-md-7 input-group">
             {{--<span class="input-group-addon"><i class="fa fa-anchor col-md-3"></i></span>--}}
             {{Form::text('nm_link_facebook',isset($rs->nm_link_facebook) ? $rs->nm_link_facebook : Input::old('nm_link_facebook'),array('placeholder' => 'http:// ou https://','class' => 'form-control'))}}
             {{ $errors->first('nm_link_facebook', '<span class="text-danger">:message</span>') }}
           </div>
          </div>
          <div class="form-group {{ $errors->first('nm_link_instagram', 'has-error') }}">
            {{ Form::label('nm_link_instagram', 'Instagram', array('class' => 'col-md-3 control-label')) }}
            <div class="col-md-7 input-group">
             {{--<span class="input-group-addon"><i class="fa fa-anchor col-md-3"></i></span>--}}
             {{Form::text('nm_link_instagram',isset($rs->nm_link_instagram) ? $rs->nm_link_instagram : Input::old('nm_link_instagram'),array('placeholder' => 'http:// ou https://','class' => 'form-control'))}}
             {{ $errors->first('nm_link_instagram', '<span class="text-danger">:message</span>') }}
           </div>
          </div>
          <div class="form-group {{ $errors->first('nm_link_twitter', 'has-error') }}">
            {{ Form::label('nm_link_twitter', 'twitter', array('class' => 'col-md-3 control-label')) }}
            <div class="col-md-7 input-group">
             {{--<span class="input-group-addon"><i class="fa fa-anchor col-md-3"></i></span>--}}
             {{Form::text('nm_link_twitter',isset($rs->nm_link_twitter) ? $rs->nm_link_twitter : Input::old('nm_link_twitter'),array('placeholder' => 'http:// ou https://','class' => 'form-control'))}}
             {{ $errors->first('nm_link_twitter', '<span class="text-danger">:message</span>') }}
           </div>
          </div>
          <!-- File Button -->
          <div class="form-group {{ $errors->first('path_img', 'has-error') }}">
              <label class="col-md-3 control-label" for="filebutton">Logo</label>
              <div class="col-md-7 input-group">
                  @if($rs->path_img)
                    <img src="{{ asset($rs->path_img) }}" width="200">
                    <br><br>
                  @else
                      <p>Nenhum arquivo salvo.</p>
                  @endif

                  {{ Form::file('path_img', Input::old('path_img'), array('class' => 'form-control input-md input-file"', 'required', 'id' => 'path_img')) }}
                  {{ $errors->first('path_img', '<span class="text-danger">:message</span>') }}
              </div>
          </div>

          <div class="form-group {{ $errors->first('status', 'has-error') }} ">
           {{ Form::label('status', '* Status', array('class' => 'col-md-3 control-label')) }}
           <div class="col-md-7 input-group">
             <label class="radio-inline" for="radios-0">
               <input type="radio" name="status"  value="1" @if($rs->status == "1") checked="checked" @endif>
               Ativo
             </label>
             <label class="radio-inline" for="radios-1">
               <input type="radio" name="status" value="0" @if($rs->status == "0") checked="checked" @endif>
               Inativo
             </label>
             {{ $errors->first('status', '<span class="text-danger">:message</span>') }}
           </div>
         </div>

          <div class="form-group {{ $errors->first('txt_descricao', 'has-error') }}">
           {{ Form::label('txt_descricao', 'Observação', array('class' => 'col-md-3 control-label')) }}
           <div class="col-md-7 input-group">
            {{--<span class="input-group-addon"><i class="fa fa-home col-md-3"></i></span>--}}
            {{--<p class="help-block">Breve Resumo do Cliente.</p>--}}
            {{Form::textarea('txt_descricao',isset($rs->txt_descricao) ? $rs->txt_descricao :  Input::old('txt_descricao'),array('class' => 'form-control'))}}
            {{ $errors->first('txt_descricao', '<span class="text-danger">:message</span>') }}
          </div>
          </div>


          <!-- Button -->
          <div class="form-group">
           <label class="col-md-3 control-label" for="cadastrar"></label>
           <div class="col-md-7 input-group">
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
        $("#nm_cep").change(function(){

            var cep = $("#nm_cep").val();
            $.get( "{{ URL::route("correio-cep") }}/" + cep, function(data){
                console.log(data);
                if(data["cidade"] || data["logradouro"])
                {
                    $("#nm_endereco").val(data["logradouro"]);
                    $("#nm_cidade").val(data["cidade"]);
                    $("#nm_bairro").val(data["bairro"]);
                    $("#nm_uf").val(data["uf"]);
                    $("#nm_cep").next().remove();
                }
                else {
                    $("#endereco").val("");
                    $("#cidade").val("");
                    $("#estado").val("");
                    $("#cep").before().append( '<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>' );
                    $('#cep .glyphicon-remove').css('color','#fff');
                    $("#cep").show();
                }
            });

        });
    </script>

    <script src="{{ asset('/portal/js/jquery-mask/jquery.mask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/js/custom/custom.js') }}" type="text/javascript"></script>

@stop