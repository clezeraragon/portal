
{{-- Page title --}}
@section('title')
{{$data['title']}}
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

            <br>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        {{$data['titles']}}
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="usuarios">

                        <thead>
                        <tr>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                        </tr>
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
{{HTML::script('/assets/js/grid-ajax/jquery.dataTables.js')}}
{{HTML::script('/assets/vendors/datatables/jquery.dataTables.min.js')}}
{{HTML::script('/assets/vendors/datatables/extensions/TableTools/js/dataTables.tableTools.js')}}
{{HTML::script('/assets/vendors/datatables/dataTables.bootstrap.js')}}

{{ HTML::script('assets/js/grid-ajax/usuarios/grid-ajax.js') }}

@stop