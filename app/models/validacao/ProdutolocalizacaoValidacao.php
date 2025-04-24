<?php
namespace app\models\validacao;

use app\core\Validacao;

class ProdutolocalizacaoValidacao{
    public static function salvar($produto_localizacao){
        $validacao = new Validacao();
        
        $validacao->setData("id_localizacao", $produto_localizacao->id_localizacao);
        $validacao->setData("id_produto", $produto_localizacao->id_produto);
        
        
        
        //fazendo a validação
        $validacao->getData("id_localizacao")->isVazio();
        $validacao->getData("id_produto")->isVazio();
       
       
        
        
        return $validacao;
        
    }
}

