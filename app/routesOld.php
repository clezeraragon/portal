<?php

Route::get('/guia-de-empresas', function()
{
    return Redirect::to(Route('guia-de-empresas-categorias'), 301);
});
