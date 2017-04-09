
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
	                {{ Form::open(array('url' => $data['route'] . '/' . $perfil->id, 'method' => 'put', 'class' => 'form-horizontal')) }}
                       <fieldset>

                       <!-- Text input-->
                       <div class="form-group {{ $errors->first('perfil', 'has-error') }}">
                         {{ Form::label('perfil', '* Perfil', array('class' => 'col-md-3 control-label')) }}
                         <div class="col-md-7">
                            {{ Form::text('perfil', Input::old('perfil', $perfil->perfil), array('placeholder' => 'Perfil','class' => 'form-control input-md', 'required')) }}
                            {{ $errors->first('perfil', '<span class="text-danger">:message</span>') }}
                         </div>
                       </div>

                       <!-- Textarea -->
                       <div class="form-group {{ $errors->first('descricao', 'has-error') }}">
                         {{ Form::label('descricao', '* Descrição', array('class' => 'col-md-3 control-label')) }}
                         <div class="col-md-7">
                             {{ Form::textarea('descricao', Input::old('descricao', $perfil->descricao), array('placeholder' => 'Descrição', 'class' => 'form-control', 'required', 'size' => '30x2')) }}
                             {{ $errors->first('descricao', '<span class="text-danger">:message</span>') }}
                         </div>
                       </div>

                        <!-- Multiple Radios (inline) -->
                        <div class="form-group {{ $errors->first('st_admin', 'has-error') }}">
                          {{ Form::label('st_admin', '* Acesso ao sistema Admin?', array('class' => 'col-md-3 control-label')) }}
                          <div class="col-md-7">
                            <label class="radio-inline" for="radios-0">
                              <input type="radio" name="st_admin" id="st_admin-0" value="1" @if($perfil->st_admin == "1") checked="checked" @endif>
                              Sim
                            </label>
                            <label class="radio-inline" for="radios-1">
                              <input type="radio" name="st_admin" id="st_admin-1" value="0" @if($perfil->st_admin == "0") checked="checked" @endif>
                              Não
                            </label>
                            {{ $errors->first('st_admin', '<span class="help-block">:message</span>') }}
                          </div>
                        </div>

                        <!-- Multiple Checkboxes -->
                        <div class="form-group {{ $errors->first('funcionalidades_ids', 'has-error') }}">
                            <label class="col-md-3 control-label" for="* Funcionalidades">* Funcionalidades</label>
                            <div class="col-md-7">

                                <div class="checkbox col-md-12">
                                    <strong>Geral</strong>
                                </div>
                                <div class="checkbox col-md-12">
                                    {{ Form::checkbox('funcionalidades_ids[]', 1, null, array('id' => 1)) . ' ' . Form::label(1, "Acesso Total ao Sistema")}}
                                </div>

                                <?php $mod = null; ?>

                                @foreach (Funcionalidade::options() as $funcionalidade)

                                    @if($funcionalidade->modulo != $mod)
                                        <div class="checkbox col-md-12">
                                            <br>
                                            <strong>{{ $funcionalidade->modulo}} </strong>

                                            <?php $mod = $funcionalidade->modulo; ?>
                                        </div>
                                    @endif

                                    <div class="checkbox col-md-12">
                                        {{ Form::checkbox('funcionalidades_ids[]', $funcionalidade->id, in_array($funcionalidade->id, $funcionalidades_ids), array('id' => $funcionalidade->id)) . ' ' . Form::label($funcionalidade->id, $funcionalidade->funcionalidade)}}
                                    </div>
                                @endforeach
                                {{ $errors->first('funcionalidades_ids', '<span class="text-danger">:message</span>') }}
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