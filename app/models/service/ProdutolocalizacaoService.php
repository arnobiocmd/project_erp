<?php
namespace app\models\service;

use app\models\validacao\ProdutolocalizacaoValidacao;
use app\models\dao\ProdutolocalizacaoDao;
class ProdutolocalizacaoService{
    public static function lista(){
        $dao =  new ProdutolocalizacaoDao();
       return $dao->lista();
    }
    public static function salvar($produto_localizacao, $campo, $tabela){
        $validacao = ProdutolocalizacaoValidacao::salvar($produto_localizacao);
        return Service::salvar($produto_localizacao, $campo, $validacao->listaErros(), $tabela);
    }
}

