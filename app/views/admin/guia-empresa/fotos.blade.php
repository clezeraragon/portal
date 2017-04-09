
{{-- Page title --}}
@section('title')
{{$data['title']}} - Galeria de Fotos
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/select2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')

<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::to($data['route']) }}" class="btn btn-info navbar-right btn_voltar"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>

            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        {{$data['titles']}} - Galeria de Fotos
                    </div>
                </div>
                <div class="portlet-body">
                     {{ Form::open(array('url' => 'admin/guia-empresa-fotos/' . $guia->id, 'method' => 'put', 'class' => 'form-horizontal')) }}
                        <fieldset>
                            <!-- Multiple Checkboxes -->
                            <div class="form-group {{ $errors->first('funcionalidades_ids', 'has-error') }}">
                                <label class="col-md-3 control-label" for="* Fotos">* Fotos</label>
                                <div class="col-md-7">

                                    @foreach (ClienteFoto::getGaleryByClient($guia->cliente_id) as $foto)

                                        <div class="checkbox col-md-3">
                                            {{ Form::checkbox('fotos_ids[]', $foto->id, in_array($foto->id, $fotos_ids), array('id' => $foto->id)) . ' ' . Form::label($foto->id, $foto->titulo)}}
                                            <img src="{{$foto->path_img}}" width="200">

                                            Destaque
                                            <input type="radio" name="destaque" value="{{$foto->id}}" @if($guia->foto_id == $foto->id) checked="checked" @endif required>
                                        </div>
                                    @endforeach

                                    {{ $errors->first('fotos_ids', '<span class="text-danger">:message</span>') }}
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
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.tableTools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables/table-advanced.js') }}"></script>
@stop
