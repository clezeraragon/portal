/*
 Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
$("#cke_18").click(function(){
    $("#cke_110_uiElement").removeAttr("checked");
});
$("#cke_110_uiElement").removeAttr("checked");
CKEDITOR.addTemplates("default",{imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates")+"templates/images/"),templates:[
    {title:"Título",
        description:"Texto ficará com um destaque de fundo azul",
        html:'<table cellspacing="0" cellpadding="0" style="width:100%; background:#3d566e; color:#fff; " border="0"  ><td ></td></table>'
    },{title:"Módulo Agenda",
        image:"template3.gif",
        description:"A title with some text and a table.",
        html:'<div class="boxDestaca"> <table class="table table-responsive agenda" align="center"><tr><td>        </td><td>        </td></tr></table></div>'
    },
    {title:"Image and Title",image:"template1.gif",description:"One main image with a title and text that surround the image.",html:'<h3><img style="margin-right: 10px" height="100" width="100" align="left"/>Type the title here</h3><p>Type the text here</p>'},{title:"Strange Template",image:"template2.gif",description:"A template that defines two colums, each one with a title, and some text.",
html:'<table cellspacing="0" cellpadding="0" style="width:100%" border="0"><tr><td style="width:50%"><h3>Title 1</h3></td><td></td><td style="width:50%"><h3>Title 2</h3></td></tr><tr><td>Text 1</td><td></td><td>Text 2</td></tr></table><p>More text goes here.</p>'},{title:"Text and Table",image:"template3.gif",description:"A title with some text and a table.",html:'<div style="width: 80%"><h3>Title goes here</h3><table style="width:150px;float: right" cellspacing="0" cellpadding="0" border="1"><caption style="border:solid 1px black"><strong>Table title</strong></caption><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table><p>Type the text here</p></div>'}
   , ]});
//$(".aqui").css({ "margin": "0 -10px 24px","padding": "0 10px","border-bottom": "1px solid #fff","border-radius": "2px 2px 0 0","-webkit-border-radius": "2px 2px 0 0","-moz-border-radius": "2px 2px 0 0", "color": "#fff","box-shadow": "0 -2px 0 rgba(0,0,0,0.2) inset","-webkit-box-shadow":"0 -2px 0 rgba(0,0,0,0.2) inset","-moz-box-shadow":"0 -2px 0 rgba(0,0,0,0.2) inset","font-size": "1rem","line-height": "2em","background": "#006938"});


