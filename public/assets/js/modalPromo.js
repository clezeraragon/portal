/**
 * Created by Ramos on 06/10/2015.
 */

 //Modal Promoção


window.onload = function () {
    var cookies = document.cookie;
    verifico = cookies.indexOf("modal");
    if (verifico > 1) {
        fechar();
    } else {
        abrir();
        document.cookie = "nome=modal";
    }
    document.getElementsByClassName("fecharPromo")[0].onclick = function () {
        fechar();
    }
    document.getElementsByClassName("modalPromo")[0].onclick = function () {

        fechar();
    }

}
function abrir() {
    $(".modalPromo").fadeIn('slow');
    $(".conteudoPromo").fadeIn('slow');

}
function fechar() {
    esconde = $(".modalPromo").fadeOut('slow');
    esconde.then(
        $(".conteudoPromo").fadeOut('slow')
    );
}


$(window).unload(function () {
    deleteCookie('nome');

});
