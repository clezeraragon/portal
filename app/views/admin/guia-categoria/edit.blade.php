
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
                        Editar {{$data['title']}}
                    </div>
                </div>
                <div class="portlet-body">
	                {{ Form::open(array('url' => $data['route'] . '/' . $rs->id, 'method' => 'put', 'class' => 'form-horizontal', 'files' => true)) }}
                        <fieldset>

                                <!-- Text input-->
                               <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                                 {{ Form::label('nome', '* Nome', array('class' => 'col-md-3 control-label')) }}
                                 <div class="col-md-7">
                                    {{ Form::text('nome', Input::old('nome', $rs->nome), array('placeholder' => 'Nome da categoria', 'class' => 'form-control input-md', 'required', 'maxlength' => '40')) }}
                                    {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                                 </div>
                               </div>

                                <!-- Textarea -->
                               <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                                 {{ Form::label('descricao', '* Descrição', array('class' => 'col-md-3 control-label')) }}
                                 <div class="col-md-7">
                                     {{ Form::textarea('descricao', Input::old('descricao', $rs->descricao), array('placeholder' => 'Descrição da categoria', 'class' => 'form-control', 'required', 'size' => '30x4', 'maxlength' => '300')) }}
                                     {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                                 </div>
                               </div>

                                <!-- Text input-->
                                <div class="form-group {{ $errors->first('url', 'has-error') }}">
                                    {{ Form::label('url', '* URL', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-7">
                                        {{ Form::text('url', Input::old('url', $rs->url), array('placeholder' => 'url-seguindo-o-padrao', 'class' => 'form-control input-md', 'required', 'id' => 'url', 'disabled' => 'disabled')) }}
                                        {{ $errors->first('url', '<span class="text-danger">:message</span>') }}
                                    </div>
                                </div>

                               <!-- Text input-->
                               {{--<div class="form-group {{ $errors->first('ordem', 'has-error') }}">--}}
                                 {{--{{ Form::label('ordem', '* Ordem', array('class' => 'col-md-3 control-label')) }}--}}
                                 {{--<div class="col-md-7">--}}
                                    {{--{{ Form::text('ordem', Input::old('ordem', $rs->ordem), array('placeholder' => 'Ordem de exibição', 'class' => 'form-control input-md', 'required', 'maxlength' => '2')) }}--}}
                                    {{--{{ $errors->first('ordem', '<span class="text-danger">:message</span>') }}--}}
                                 {{--</div>--}}
                               {{--</div>--}}

                                <!-- File Button -->
                                  <div class="form-group {{ $errors->first('path_img', 'has-error') }}">
                                      <label class="col-md-3 control-label" for="filebutton">* Imagem</label>
                                      <div class="col-md-7">
                                          <img src="{{ asset($rs->path_img) }}" width="200">
                                          <br><br>
                                          {{ Form::file('path_img', Input::old('path_img'), array('class' => 'form-control input-md input-file"', 'required', 'id' => 'path_img')) }}
                                          {{ $errors->first('path_img', '<span class="text-danger">:message</span>') }}
                                      </div>
                                  </div>

                                  <!-- Multiple Radios (inline) -->
                                 <div class="form-group {{ $errors->first('status', 'has-error') }} ">
                                   {{ Form::label('status', '* Status', array('class' => 'col-md-3 control-label')) }}
                                   <div class="col-md-7">
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

@stop