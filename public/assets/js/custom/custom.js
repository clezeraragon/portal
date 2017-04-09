// Mascaras do Admin

$(function () {
// Form Usuarios
    $('#phone').mask('(00) 000000009');

    $("#cpf").mask('000.000.000-00', {placeholder: '000.000.000-00'}, {selectOnFocus: true});
    //});
    $("#dt_nascimento").mask('00/00/0000', {placeholder: '__/__/____'}, {selectOnFocus: true});
});
/*-------------------------------------------------------------------------------------------------*/
$(function () {
    // Form cliente

    /*-----------------------------  cadastro novo -----------------------------------------------*/

    $('#nm_telefone1').mask('(00) 000000009', {placeholder: '(00) 000000000'}, {selectOnFocus: true});
    $('#nm_telefone2').mask('(00) 000000009', {placeholder: '(00) 000000000'}, {selectOnFocus: true});
    $("#nm_cnpj").mask('00.000.000/0000-00', {placeholder: '00.000.000/0000-00'}, {selectOnFocus: true});

    /* -------------------------------------------------------------------------------------------*/

    /*-----------------------------  editar cadastro  -----------------------------------------------*/

    $('#nm_telefone1').mask('(00) 000000009', {placeholder: '(00) 000000000'}, {selectOnFocus: true});
    $('#nm_telefone2').mask('(00) 000000009', {placeholder: '(00) 000000000'}, {selectOnFocus: true});
    $("#nm_cnpj").mask('00.000.000/0000-00', {placeholder: '00.000.000/0000-00'}, {selectOnFocus: true});
    $("#cpf").mask('000.000.000-00', {placeholder: '000.000.000-00'}, {selectOnFocus: true});

    /* -------------------------------------------------------------------------------------------*/

});
$(function () {

    // Form Anunciante

    /*-----------------------------  cadastro novo -----------------------------------------------*/

    $('#dt_ini').mask('00/00/0000', {placeholder: '__/__/____'}, {selectOnFocus: true});
    $('#dt_fim').mask('00/00/0000', {placeholder: '__/__/____'}, {selectOnFocus: true});

    /* -------------------------------------------------------------------------------------------*/

    /*-----------------------------  editar cadastro  -----------------------------------------------*/

    $('#dt_ini').mask('00/00/0000', {placeholder: '__/__/____'}, {selectOnFocus: true});
    $('#dt_fim').mask('00/00/0000', {placeholder: '__/__/____'}, {selectOnFocus: true});

    /* -------------------------------------------------------------------------------------------*/

});