{{-- Page title --}}
@section('title')
    {{$data['title']}}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/select2.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <!--end of page level css-->
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"
          media="screen"/>
    <link href="{{ asset('assets/vendors/touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet"
          type="text/css" media="all"/>
@stop


{{-- Page content --}}
@section('content')

    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="container">
                    {{ Form::open(array('url' => $data['route'] . '/' , 'method' => 'get')) }}
                    <div class="row">
                        <div class="col-md-5 col-md-push-1">
                            <div class="form-group"><label>Data Inicial:</label>

                                <div  class="input-group date form_datetime3 col-md-8"
                                     data-date="2012-12-21" data-date-format="yyyy-mm-dd"
                                     data-link-field="dtp_input1">


                                    {{ Form::text('dt_inicial', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Realize o filtro por data', 'id' => 'dt_inicial')) }}
                                    {{--{{ Form::button('Filtrar', array('type' => 'submit', 'class' => 'btn btn-success btn-sm', 'title' => 'Filtrar')) }}--}}

                                    <span
                                            class="input-group-addon"> <span
                                                class="glyphicon glyphicon-remove"></span> </span> <span
                                            class="input-group-addon"> <span
                                                class="glyphicon glyphicon-th"></span> </span></div>
                            </div>


                        </div>

                        <div class="col-md-5">
                            <div class="form-group"><label>Data Final:</label>

                                <div class="input-group date form_datetime3 col-md-8"
                                     data-date="2012-12-21" data-date-format="yyyy-mm-dd"
                                     data-link-field="dtp_input1">
                                    {{ Form::text('dt_final', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Realize o filtro por data', 'id' => 'dt_final')) }}
                                    <span
                                            class="input-group-addon"> <span
                                                class="glyphicon glyphicon-remove"></span> </span> <span
                                            class="input-group-addon"> <span
                                                class="glyphicon glyphicon-th"></span> </span></div>

                            </div>

                        </div>

                        <div class="col-md-2 col-md-pull-1 ">
                            <div class="form-group">
                                {{ Form::button('Filtrar', array('type' => 'submit', 'class' => 'btn btn-responsive button-alignment btn-success', 'title' => 'Filtrar','style'=>'margin-top:24px')) }}

                            </div>


                        </div>

                    </div>
                    {{Form::close()}}

                </div>

                {{--<hr>--}}
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box primary">
                    <div class="portlet-title">
                        <div class="caption">
                            {{$data['titles']}}
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>Empresa</th>
                                <th>Quant.Clicks</th>
                                <th>Tipo Metrica</th>
                                <th>Origem.Pag.Vis</th>
                                <th>Período</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--{{dd($result)}}--}}
                            @foreach ($result as $key => $value)
                                {{--{{dd($value)}}--}}
                                <tr>
                                    <td>{{ ($value['anuncio']) }}</td>
                                    <td>@if(isset($value[11])){{ ($value[11]) }} @else 0 @endif</td>
                                    <td>@if(isset($value['tipo_metrica'])) {{ ($value['tipo_metrica'])  }} @else 0 @endif</td>
                                    <td>@if(isset($value['pagina'])) {{ ($value['pagina'])  }} @else 0 @endif</td>
                                    <td>{{ ($periodo)  }}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>



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
    <!--time picker-->
    <script src="{{ asset('assets/vendors/timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <!--datetime picker-->
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}"
            charset="UTF-8"></script>
    <script type="text/javascript"
            src="{{ asset('assets/vendors/datetimepicker/js/locales/bootstrap-datetimepicker.pt-BR.js') }}"
            charset="UTF-8"></script>
    <!--touchspin-->
    <script src="{{ asset('assets/vendors/touchspin/dist/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/table-advanced.js') }}"></script>
    <script>
        $(".form_datetime3").datetimepicker({
            language: 'pt-BR',
            format: "yyyy-mm-dd",
            timepicker: false,
            autoclose: true,
//            todayBtn: true,
            pickTime: false,
            startDate: "2015-01-01"
//            minuteStep: 10

        });


    </script>
@stop
