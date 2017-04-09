@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Dashboard
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="all" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/only_dashboard.css') }}" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
        <li class="active">
            <a href="#"> <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                Home
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
            <!-- Trans label pie charts strats here-->
            <div class="lightbluebg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 text-right">
                                <span>Cadastros</span>
                                <div class="number" id="m_cadastro.total"></div>
                            </div>
                            {{--<i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>--}}
                            <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stat-label">Hoje</small>
                                <h4 id="m_cadastro.hoje"></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-label">Última Semana</small>
                                <h4 id="m_cadastro.semana"></h4>
                            </div>
                            <div class="col-xs-4 text-right">
                                <small class="stat-label">Último Mês</small>
                                <h4 id="m_cadastro.mes"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
            <!-- Trans label pie charts strats here-->
            <div class="redbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Ativação</span>
                                <div class="number" id="m_ativacao.total"></div>
                            </div>
                            {{--<i class="livicon pull-right" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>--}}
                            <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stat-label">Hoje</small>
                                <h4 id="m_ativacao.hoje"></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-label">Última Semana</small>
                                <h4 id="m_ativacao.semana"></h4>
                            </div>
                            <div class="col-xs-4 text-right">
                                <small class="stat-label">Último Mês</small>
                                <h4 id="m_ativacao.mes"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
            <!-- Trans label pie charts strats here-->
            <div class="goldbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Login no Portal</span>
                                <div class="number" id="m_login.total"></div>
                            </div>
                            <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stat-label">Hoje</small>
                                <h4 id="m_login.hoje"></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-label">Última Semana</small>
                                <h4 id="m_login.semana"></h4>
                            </div>
                            <div class="col-xs-4 text-right">
                                <small class="stat-label">Último Mês</small>
                                <h4 id="m_login.mes"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
            <!-- Trans label pie charts strats here-->
            <div class="palebluecolorbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Contato no Guia</span>
                                <div class="number" id="m_guiacontato.total"></div>
                            </div>
                            <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stat-label">Hoje</small>
                                <h4 id="m_guiacontato.hoje"></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-label">Última Semana</small>
                                <h4 id="m_guiacontato.semana"></h4>
                            </div>
                            <div class="col-xs-4 text-right">
                                <small class="stat-label">Último Mês</small>
                                <h4 id="m_guiacontato.mes"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
            <!-- Trans label pie charts strats here-->
            <div class="palebluecolorbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Acesso link fidelidade</span>
                                <div class="number" id="m_indicacao_link_fidelidade.total"></div>
                            </div>
                            <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stat-label">Hoje</small>
                                <h4 id="m_indicacao_link_fidelidade.hoje"></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-label">Última Semana</small>
                                <h4 id="m_indicacao_link_fidelidade.semana"></h4>
                            </div>
                            <div class="col-xs-4 text-right">
                                <small class="stat-label">Último Mês</small>
                                <h4 id="m_indicacao_link_fidelidade.mes"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
            <!-- Trans label pie charts strats here-->
            <div class="goldbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Cadastro Fidelidade</span>
                                <div class="number" id="m_cadastro_fidelidade.total"></div>
                            </div>
                            <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stat-label">Hoje</small>
                                <h4 id="m_cadastro_fidelidade.hoje"></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-label">Última Semana</small>
                                <h4 id="m_cadastro_fidelidade.semana"></h4>
                            </div>
                            <div class="col-xs-4 text-right">
                                <small class="stat-label">Último Mês</small>
                                <h4 id="m_cadastro_fidelidade.mes"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->

</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!--  todolist-->
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<!-- EASY PIE CHART JS -->
<script src="{{ asset('assets/vendors/charts/easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/jquery.easypiechart.min.js') }}"></script>
<!--for calendar-->
<script src="{{ asset('assets/vendors/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/fullcalendar/calendarcustom.min.js') }}" type="text/javascript"></script>
<!--   Realtime Server Load  -->
<script src="{{ asset('assets/vendors/charts/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/charts/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
<!--Sparkline Chart-->
<script src="{{ asset('assets/vendors/charts/jquery.sparkline.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/countUp/countUp.js') }}"></script>
<!--   maps -->
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}" type="text/javascript"></script>
<!-- end of page level js -->
<script type="text/javascript">
$(document).ready(function() {
    var composeHeight = $('#calendar').height() + 21 - $('.adds').height();
    $('.list_of_items').slimScroll({
        color: '#A9B6BC',
        height: composeHeight + 'px',
        size: '5px'
    });
});


var demo = new countUp("m_cadastro.total",0, "{{$m_cadastro["total"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_cadastro.hoje",0, "{{$m_cadastro["hoje"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_cadastro.semana",0, "{{$m_cadastro["semana"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_cadastro.mes",0, "{{$m_cadastro["mes"]}}", 0, 6, options);
demo.start();

var demo = new countUp("m_ativacao.total",0, "{{$m_ativacao["total"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_ativacao.hoje",0, "{{$m_ativacao["hoje"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_ativacao.semana",0, "{{$m_ativacao["semana"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_ativacao.mes",0, "{{$m_ativacao["mes"]}}", 0, 6, options);
demo.start();

var demo = new countUp("m_login.total",0, "{{$m_login["total"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_login.hoje",0, "{{$m_login["hoje"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_login.semana",0, "{{$m_login["semana"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_login.mes",0, "{{$m_login["mes"]}}", 0, 6, options);
demo.start();

var demo = new countUp("m_guiacontato.total",0, "{{$m_guiacontato["total"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_guiacontato.hoje",0, "{{$m_guiacontato["hoje"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_guiacontato.semana",0, "{{$m_guiacontato["semana"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_guiacontato.mes",0, "{{$m_guiacontato["mes"]}}", 0, 6, options);
demo.start();

var demo = new countUp("m_indicacao_link_fidelidade.total",0, "{{$m_indicacao_link_fidelidade["total"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_indicacao_link_fidelidade.hoje",0, "{{$m_indicacao_link_fidelidade["hoje"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_indicacao_link_fidelidade.semana",0, "{{$m_indicacao_link_fidelidade["semana"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_indicacao_link_fidelidade.mes",0, "{{$m_indicacao_link_fidelidade["mes"]}}", 0, 6, options);
demo.start();

var demo = new countUp("m_cadastro_fidelidade.total",0, "{{$m_cadastro_fidelidade["total"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_cadastro_fidelidade.hoje",0, "{{$m_cadastro_fidelidade["hoje"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_cadastro_fidelidade.semana",0, "{{$m_cadastro_fidelidade["semana"]}}", 0, 6, options);
demo.start();
var demo = new countUp("m_cadastro_fidelidade.mes",0, "{{$m_cadastro_fidelidade["mes"]}}", 0, 6, options);
demo.start();


</script>
@stop