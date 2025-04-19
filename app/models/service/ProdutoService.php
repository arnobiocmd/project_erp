<?php
namespace app\models\service;

use app\models\validacao\ProdutoValidacao;

class ProdutoService{
    public static function salvar($produto, $campo, $tabela){
        $validacao = ProdutoValidacao::salvar($produto);
        return Service::salvar($produto, $campo, $validacao->listaErros(), $tabela);
    }
}

