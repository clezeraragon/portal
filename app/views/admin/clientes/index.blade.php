

{{-- Page title --}}
@section('title')
{{$data['title']}}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/modal/css/component.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/select2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<!-- end of page level css-->
@stop


{{-- Page content --}}
@section('content')

<section class="content">

  {{-- inserção do botão novo --}}
  <div class="row">
    <div class="col-md-12">

      <a href="{{ URL::to($data['route'].'/'.'create') }}" class="btn btn-success navbar-left btn_novo"><span class="glyphicon glyphicon-plus-sign"></span> Novo</a>
      <hr>
      <!-- BEGIN SAMPLE TABLE PORTLET-->
      <div class="portlet box primary">
        <div class="portlet-title">
          <div class="caption">

            {{$data['titles']}}
          </div>
          <div class="tools"></div>
        </div>
        {{-- fim do botão --}}

        {{-- sistema de busca pesquisar--}}

          <div class="portlet-body">

              <table cellpadding="0" cellspacing="0" border="0"
                     class="table table-striped table-condensed table-bordered teste col-sm-of" id="clientes">

                  <thead>
                      <tr>
                          {{--<th>ID</th>--}}
                          <th>Nome Fantasia</th>
                          <th>CNPJ</th>
                          <th>Responsável</th>
                          <th>E-mail</th>
                          <th>Telefone</th>
                          <th>Status</th>
                          <th>Exibir</th>
                          <th>Editar</th>
                          <th>Excluir</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          {{--<td></td>--}}
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>

</section>
{{--@stop--}}

{{----------------------------------------------------------------------MODAL GRID---------------------------------------------------------------------------------}}
{{--@section('content')--}}

{{--@include('elements.modal')--}}
{{-------------------------------------------------------------------------------------------------------------------------------------------------------}}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
    {{ HTML::script('/assets/js/grid-ajax/jquery.dataTables.js') }}
    {{HTML::script('/assets/vendors/datatables/jquery.dataTables.min.js')}}
    {{HTML::script('/assets/vendors/datatables/extensions/TableTools/js/dataTables.tableTools.js')}}
    {{HTML::script('/assets/vendors/datatables/dataTables.bootstrap.js')}}

    <!-- fim scripts -->
    {{ HTML::script('/assets/js/grid-ajax/grid-ajax.js') }}

    <!-- modal admin cliente -->
    {{--{{HTML::script('/assets/vendors/modal/js/classie.js')}}--}}
    {{--{{HTML::script('/assets/vendors/modal/js/modalEffects.js')}}--}}

<script>
// modal admin cliente
//    setTimeout(function(){
//    $('.teste .btn-orange').click(function(){
//        $(".md-effect-1").addClass("md-show");
//    });
//        $(".btn-modal").click(function(){
//            $(".md-modal").removeClass("md-show");
//        });
//    },1000);

</script>
@stop