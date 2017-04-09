<?php

class FuncionalidadeTableSeeder extends Seeder {

    public function run()
    {

//        Funcionalidade::create(array('id' => 1 , 'funcionalidade' => 'Acesso Total ao Sistema', 'metodo' => '*', 'modulo' => 'Geral'));
//
//		Funcionalidade::create(array('funcionalidade' => 'Listar usuários', 'metodo' => 'admin.usuario.index', 'modulo' => 'Usuário'));
//		//Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de usuário', 'metodo' => 'admin.usuario.create', 'modulo' => 'Usuário'));
//		//Funcionalidade::create(array('funcionalidade' => 'Adicionar usuário', 'metodo' => 'admin.usuario.store', 'modulo' => 'Usuário'));
//		Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de usuário', 'metodo' => 'admin.usuario.edit', 'modulo' => 'Usuário'));
//		Funcionalidade::create(array('funcionalidade' => 'Alterar usuário', 'metodo' => 'admin.usuario.update', 'modulo' => 'Usuário'));
//		Funcionalidade::create(array('funcionalidade' => 'Apagar usuário', 'metodo' => 'admin.usuario.destroy', 'modulo' => 'Usuário'));
//
//		Funcionalidade::create(array('funcionalidade' => 'Listar perfis', 'metodo' => 'admin.perfil.index', 'modulo' => 'Perfil'));
//		Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de perfil', 'metodo' => 'admin.perfil.create', 'modulo' => 'Perfil'));
//		Funcionalidade::create(array('funcionalidade' => 'Adicionar perfil', 'metodo' => 'admin.perfil.store', 'modulo' => 'Perfil'));
//		Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de perfil', 'metodo' => 'admin.perfil.edit', 'modulo' => 'Perfil'));
//		Funcionalidade::create(array('funcionalidade' => 'Alterar perfil', 'metodo' => 'admin.perfil.update', 'modulo' => 'Perfil'));
//		Funcionalidade::create(array('funcionalidade' => 'Apagar perfil', 'metodo' => 'admin.perfil.destroy', 'modulo' => 'Perfil'));
//
//        Funcionalidade::create(array('funcionalidade' => 'Listar Clientes', 'metodo' => 'admin.cliente.index', 'modulo' => 'Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de Cliente', 'metodo' => 'admin.cliente.create', 'modulo' => 'Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar Cliente', 'metodo' => 'admin.cliente.store', 'modulo' => 'Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de Cliente', 'metodo' => 'admin.cliente.edit', 'modulo' => 'Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar Cliente', 'metodo' => 'admin.cliente.update', 'modulo' => 'Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar Cliente', 'metodo' => 'admin.cliente.destroy', 'modulo' => 'Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar Cliente', 'metodo' => 'admin.cliente.show', 'modulo' => 'Cliente'));
//
//        Funcionalidade::create(array('funcionalidade' => 'Listar fotos de Clientes', 'metodo' => 'admin.cliente-foto.index', 'modulo' => 'Fotos de Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de fotos de Cliente', 'metodo' => 'admin.cliente-foto.create', 'modulo' => 'Fotos de Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar fotos de Cliente', 'metodo' => 'admin.cliente-foto.store', 'modulo' => 'Fotos de Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de fotos de Cliente', 'metodo' => 'admin.cliente-foto.edit', 'modulo' => 'Fotos de Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar fotos de Cliente', 'metodo' => 'admin.cliente-foto.update', 'modulo' => 'Fotos de Cliente'));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar fotos de Cliente', 'metodo' => 'admin.cliente-foto.destroy', 'modulo' => 'Fotos de Cliente'));
//
//        $titulo = "Conteúdo";
//        $rota = "conteudo";
//        $modulo = "Conteúdo";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//        $titulo = "Categoria de Conteúdo";
//        $rota = "conteudo-categoria";
//        $modulo = "Categoria de Conteúdo";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//        $titulo = "Vídeo";
//        $rota = "video";
//        $modulo = "Vídeo";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//        $titulo = "Guia Empresa";
//        $rota = "guia-empresa";
//        $modulo = "Guia Empresa";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//        $titulo = "Guia Categoria";
//        $rota = "guia-categoria";
//        $modulo = "Guia Categoria";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//        $titulo = "Guia Cidade";
//        $rota = "guia-cidade";
//        $modulo = "Guia Cidade";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//        $titulo = "Guia Plano";
//        $rota = "guia-plano";
//        $modulo = "Guia Plano";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de gestão de fotos do Guia', 'metodo' => 'guia-empresa-fotos', 'modulo' => 'Guia Empresa Galeria de Fotos'));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar fotos do Guia', 'metodo' => 'post-guia-empresa-fotos', 'modulo' => 'Guia Empresa Galeria de Fotos'));
//
//
//        $titulo = "Site Plano";
//        $rota = "site-plano";
//        $modulo = "Site Plano";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//
//        $titulo = "Site Tipo";
//        $rota = "site-tipo";
//        $modulo = "Site Tipo";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//
//        $titulo = "Site";
//        $rota = "site";
//        $modulo = "Site";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//
//        $titulo = "Fidelidade Ação";
//        $rota = "fidelidade-acao";
//        $modulo = "Fidelidade Ação";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//
//        $titulo = "Fidelidade Nível";
//        $rota = "fidelidade-nivel";
//        $modulo = "Fidelidade Nível";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));
//
//
//        $titulo = "Fidelidade Produto";
//        $rota = "fidelidade-produto";
//        $modulo = "Fidelidade Produto";
//        Funcionalidade::create(array('funcionalidade' => 'Listar ' . $titulo, 'metodo' => 'admin.'.$rota.'.index', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de inclusão de ' . $titulo, 'metodo' => 'admin.'.$rota.'.create', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Adicionar ' . $titulo, 'metodo' => 'admin.'.$rota.'.store', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Formulário de alteração de ' . $titulo, 'metodo' => 'admin.'.$rota.'.edit', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Alterar ' . $titulo, 'metodo' => 'admin.'.$rota.'.update', 'modulo' => $modulo));
//        Funcionalidade::create(array('funcionalidade' => 'Apagar ' . $titulo, 'metodo' => 'admin.'.$rota.'.destroy', 'modulo' => $modulo));


        Funcionalidade::create(array('funcionalidade' => 'Relatório de Promotores', 'metodo' => 'relatorio-promotor', 'modulo' => 'Usuário'));
        Funcionalidade::create(array('funcionalidade' => 'Relatório de Cupons', 'metodo' => 'relatorio-cupom', 'modulo' => 'Cupom de Desconto'));
        Funcionalidade::create(array('funcionalidade' => 'Relatório de Contatos no Guia', 'metodo' => 'relatorio-guia-contato', 'modulo' => 'Guia Empresa'));
        Funcionalidade::create(array('funcionalidade' => 'Métricas do Guia', 'metodo' => 'guia-metrica', 'modulo' => 'Guia Empresa'));

    }
}