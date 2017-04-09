$(document).ready(function(){

    function opaciover(entra){
        $(entra).css({"opacity":"0.6","cursor":"pointer"});
        $(".positionIcone").css({"background-color":"#00a5e5"});
        $(".positionIcone").css({"opacity":"0.6","cursor":"pointer"});
        return false;
    }
    function opaciout(entra){
        $(entra).css("opacity","1");
        $(".positionIcone").css({"background-color":"#3d566e"});
        return false;
    }
    $(".videoPrincipal").on("mouseout",function(){
        opaciout(entra = this);
    });
    $(".videoPrincipal ").on("mouseover",function(){
        opaciover(entra = this);
    });
    $(".positionIcone").on("mouseover",function(){
        opaciover(entra = ".videoPrincipal");
    });
    $(".positionIcone").css("margin-top", "27%");

    function carregaFrame(passoValorLink){
        montaUrl = "//www.youtube.com/embed/"+ passoValorLink +"?showinfo=0";
        $(".vid-box .positionIcone").remove();
        $(".videoPrincipal").remove();
        $(".aquivideo .iframeclasse").remove();
        $(".aquivideo:eq(2)").append('<iframe class="iframeclasse" width="514" height="300" src="'+ montaUrl+"&rel=0&arp;autoplay=1"+'" frameborder="0"allowfullscreen ></iframe>');
    }

    $(".thumbvideo").click(function(){

        $(".vid-box .positionIcone").remove();
        $(".aquivideo .iframeclasse").remove();
        $(".videoPrincipal").remove();
        passoValorLink = $(this).attr("data-role");
        $(".iframeclasse").remove();
        //$("#"+passoValorLink).addClass("active");
        montaUrl = "//www.youtube.com/embed/"+ passoValorLink +"?showinfo=0";
        $("#"+passoValorLink).append('<iframe class="iframeclasse" width="514" height="300" src="'+ montaUrl+"&rel=0&arp;autoplay=1"+'" frameborder="0"allowfullscreen ></iframe>');

    });

    $(".videoPrincipal").click(function(){
        carregaFrame(passoValorLink = $(this).attr("data-role") );
    });
    $(".positionIcone").click(function(){
       carregaFrame(passoValorLink = $(this).next().attr("data-role") );

    });

});