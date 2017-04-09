/**
 * Created by Ramos on 01/06/2015.
 */

var table = $('#cliente_foto');

/* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

/* Set tabletools buttons and button container */

$.extend(true, $.fn.DataTable.TableTools.classes, {
    "container": "btn-group tabletools-dropdown-on-portlet",
    "buttons": {
        "normal": "btn btn-sm default",
        "disabled": "btn btn-sm default disabled"
    },
    "collection": {
        "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
    }
});

//
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
$.fn.dataTable.pipeline = function ( opts ) {
    // Configuration options
    var conf = $.extend( {
        pages: 5,     // number of pages to cache
        url: '',      // script url
        data: null,   // function or object with parameters to send to the server
                      // matching how `ajax.data` works in DataTables
        method: 'GET' // Ajax HTTP method
    }, opts );

    // Private variables for storing the cache
    var cacheLower = -1;
    var cacheUpper = null;
    var cacheLastRequest = null;
    var cacheLastJson = null;

    return function ( request, drawCallback, settings ) {
        var ajax          = false;
        var requestStart  = request.start;
        var drawStart     = request.start;
        var requestLength = request.length;
        var requestEnd    = requestStart + requestLength;

        if ( settings.clearCache ) {
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
        }
        else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
            // outside cached data - need to make a request
            ajax = true;
        }
        else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
            JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
            JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
        ) {
            // properties changed (ordering, columns, searching)
            ajax = true;
        }

        // Store the request for checking next time around
        cacheLastRequest = $.extend( true, {}, request );

        if ( ajax ) {
            // Need data from the server
            if ( requestStart < cacheLower ) {
                requestStart = requestStart - (requestLength*(conf.pages-1));

                if ( requestStart < 0 ) {
                    requestStart = 0;
                }
            }

            cacheLower = requestStart;
            cacheUpper = requestStart + (requestLength * conf.pages);

            request.start = requestStart;
            request.length = requestLength*conf.pages;

            // Provide the same `data` options as DataTables.
            if ( $.isFunction ( conf.data ) ) {
                // As a function it is executed with the data object as an arg
                // for manipulation. If an object is returned, it is used as the
                // data object to submit
                var d = conf.data( request );
                if ( d ) {
                    $.extend( request, d );
                }
            }
            else if ( $.isPlainObject( conf.data ) ) {
                // As an object, the data given extends the default
                $.extend( request, conf.data );
            }

            settings.jqXHR = $.ajax( {
                "type":     conf.method,
                "url":      conf.url,
                "data":     request,
                "dataType": "json",
                "cache":    false,
                "success":  function ( json ) {
                    cacheLastJson = $.extend(true, {}, json);

                    if ( cacheLower != drawStart ) {
                        json.data.splice( 0, drawStart-cacheLower );
                    }
                    json.data.splice( requestLength, json.data.length );

                    drawCallback( json );
                }
            } );
        }
        else {
            json = $.extend( true, {}, cacheLastJson );
            json.draw = request.draw; // Update the echo for each response
            json.data.splice( 0, requestStart-cacheLower );
            json.data.splice( requestLength, json.data.length );

            drawCallback(json);
        }
    }
};

// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
$.fn.dataTable.Api.register( 'clearPipeline()', function () {
    return this.iterator( 'table', function ( settings ) {
        settings.clearCache = true;
    } );
} );


var oTable = table.dataTable({

    "bProcessing": '<div class="dataTables_processing" ><i class="livicon " data-name="spinner-four" data-size="50" data-c="#418BCA" data-hc="#ff0000" data-loop="true"></i><div style="font-size: 1.2em;">Processando...</div></div>',
    "serverSide": true,
    "ajax": $.fn.dataTable.pipeline( {
        url: '/admin/cliente-ajax-foto',
        pages: 5 // number of pages to cache
    } ),

    "order": [
        [0, 'asc']
    ],
    "oLanguage": {
        "sProcessing": '<div class="dataTables_processing" ><i class="livicon " data-name="spinner-four" data-size="50" data-c="#418BCA" data-hc="#ff0000" data-loop="true"></i><div style="font-size: 1.2em;">Processando...</div></div>',
        "sInfo": "Teve um total de _TOTAL_ registros para mostrar (_START_ até _END_)",
        "sInfoEmpty": "Não há registros para mostrar",
        "sInfoFiltered": "",
        "sSearch": "Pesquisar: _INPUT_ ",
        "sLengthMenu": "Páginar por _MENU_  Registros"
    },

    "lengthMenu": [
        [10, 15, 20, -1],
        [10, 15, 20, "All"] // change per page values here
    ],
    // set the initial value
    "pageLength": 10,

    "dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

    "tableTools": {
        "sSwfPath": "/assets/vendors/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
        "columnDefs": [ { //this prevents errors if the data is null
            "targets": "_all",
            "defaultContent": ""
        } ],
        "aButtons": [{
            "sExtends": "pdf",
            "sButtonText": "PDF",
            "sFileName": "iSonhei-Cliente.pdf",
            "sPdfMessage": "Your custom message would go here.",
            "mColumns": [0, 1]
        }, {
            "sExtends": "csv",
            "sButtonText": "CSV",
            "sFileName": "iSonhei-Cliente.csv"
        }, {
            "sExtends": "xls",
            "sButtonText": "Excel",
            "sFileName": "iSonhei-Cliente.xls"
        }, {
            "sExtends": "print",
            "sButtonText": "Print",
            "sInfo": 'Please press "CTR+P" to print or "ESC" to quit',
            "sMessage": "Generated by DataTables"
        }]
    },

    "columns": [
        //title will auto-generate th columns
        { "data" : "cliente_id", "title" : "Cliente", "orderable": true, "searchable": true },
        { "data" : "titulo", "title" : "Titulo", "orderable": true, "searchable": true },
        { "data": "descricao", "title" : "Descrição", "orderable": true, "searchable": true },
        { "data": "ordem",           "title" : "Ordem", "orderable": true, "searchable": true },
        { "data" : "status",            "title" : "Status", "orderable": true, "searchable": true },
        { "data" : 'updated_at',  "title" : "Modificado", "orderable": true, "searchable": true },
        { "data" : "editar",     "title" : "Editar", "orderable": false, "searchable": false },
        { "data" : "excluir",     "title" : "Excluir", "orderable": false, "searchable": false },
    ]


});
