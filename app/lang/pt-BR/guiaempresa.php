<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | CRUD Language Lines
    |--------------------------------------------------------------------------
    |
    | Mensagens de ações relacionadas ao Guia de Empresa
    |
    */

    "create" => array(
        'duplicate' => "O registro não pode ser salvo, pois já existe um registro com os mesmos campos de negócio (Cliente, Região, Categoria e Plano).",
        'limit' => "O registro não pode ser salvo, pois este plano já atingiu o limite de cadastro."
    ),
    "update" => array(
        'duplicate' => "O registro não pode ser atualizado, pois já existe um registro com os mesmos campos de negócio (Cliente, Região, Categoria e Plano).",
        'limit' => "O registro não pode ser atualizado, pois este plano já atingiu o limite de cadastro.",
        "plano" => array(
            'limit' => "O plano não pode ser atualizado, pois o limite informado é superior ao números de empresas vinculadas ao plano."
        )
    ),
    "galeriafotos" => array(
        'success' => "As fotos foram vinculadas com sucesso!",
        'limit' => "Quantidade de imagens selecionadas ultrapassa o limite desta publicação.",
    ),
    "galeriavideos" => array(
        'success' => "Os vídeos foram vinculadas com sucesso!",
        'limit' => "Quantidade de vídeos selecionados ultrapassa o limite desta publicação.",
    ),
    "contato" => array(
        'success' => "Obrigado, seu contato foi enviado com sucesso!",
    )



);