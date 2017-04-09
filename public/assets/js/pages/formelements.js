
    
    var placeholder = "Select a State";

    $('.select2,.select2-multiple').select2({
        placeholder: placeholder
    });
    $('.select2-allow-clear').select2({
        allowClear: true,
        placeholder: placeholder
    });


    var select2OpenEventName = "select2-open";

    $(':checkbox').on("click", function() {
        $(this).parent().nextAll('select').select2("enable", this.checked);
    });


    $(".select2, .select2-multiple, .select2-allow-clear, .select2-remote").on(select2OpenEventName, function() {
        if ($(this).parents('[class*="has-"]').length) {
            var classNames = $(this).parents('[class*="has-"]')[0].className.split(/\s+/);
            for (var i = 0; i < classNames.length; ++i) {
                if (classNames[i].match("has-")) {
                    $('#select2-drop').addClass(classNames[i]);
                }
            }
        }

    });
    $(document).ready(function () {
        $("#e0").select2();
    });

    $(document).ready(function () {
        $("#e1").select2();
    });

    $(document).ready(function () {
        $("#e2").select2();
    });
    $(document).ready(function () {
        $("#e3").select2();
    });
    $(document).ready(function () {
        $("#e4").select2();
    });
    $(document).ready(function () {
        $("#e5").select2();
    });
    $(document).ready(function () {
        $("#e6").select2();
    });
  
    $(function() {
        var opts = $("#source").html(),
            opts2 = "<option></option>" + opts;
        $("select.populate").each(function() {
            var e = $(this);
            e.html(e.hasClass("placeholder") ? opts2 : opts);
        });
        $(".examples article:odd").addClass("zebra");
    });
   
    $(document).ready(function() {
        function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='img/us_states_flags/" + state.id.toLowerCase() + ".png'/>" + state.text;
        }
        $("#e4").select2({
            formatResult: format,
            formatSelection: format,
            escapeMarkup: function(m) {
                return m;
            }
        });
    });
   
    $(document).ready(function() {

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass: 'iradio_flat-red'
        });
        //Flat green color scheme
        $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
    
    $(document).ready(function() {
        $('.chk').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass: 'iradio_flat-red'
        });
    });
   
    $(document).ready(function() {
        $('.chk1').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });
    });
   
    $(document).ready(function() {
        $(
            'input#defaultconfig'
        ).maxlength()

        $(
            'input#thresholdconfig'
        ).maxlength({
            threshold: 20

        });
        $(
            'input#moreoptions'
        ).maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger"
        });

        $(
            'input#alloptions'
        ).maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            separator: ' chars out of ',
            preText: 'You typed ',
            postText: ' chars.',
            validate: true
        });


        $(
            'textarea#textarea'
        ).maxlength({
            alwaysShow: true
        });

        $('input#placement')
            .maxlength({
                alwaysShow: true,
                placement: 'top-left'
            });

    });

    function format(state) {
        if (!state.id) return state.text; // optgroup
        return "<img class='flag' src='img/countries_flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
    }
    $("#select2_sample4").select2({
        placeholder: "Select a Country",
        allowClear: true,
        formatResult: format,
        formatSelection: format,
        escapeMarkup: function(m) {
            return m;
        }
    });

    