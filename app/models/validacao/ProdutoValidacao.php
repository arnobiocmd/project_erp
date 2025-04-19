<?php
namespace app\models\validacao;

use app\core\Validacao;

class ProdutoValidacao{
    public static function salvar($produto){
        $validacao = new Validacao();
        
        $validacao->setData("produto", $produto->produto);
        $validacao->setData("id_categoria", $produto->id_categoria);
        $validacao->setData("id_unidade", $produto->id_unidade);
        $validacao->setData("preco", $produto->preco);
        $validacao->setData("eh_produto", $produto->eh_produto);
        $validacao->setData("eh_insumo", $produto->eh_insumo);
        $validacao->setData("eh_lancamento", $produto->eh_lancamento);
        $validacao->setData("eh_maisvendido", $produto->eh_maisvendido);
        
        
        //fazendo a validação
        $validacao->getData("produto")->isVazio();
        $validacao->getData("id_categoria")->isVazio();
        $validacao->getData("id_unidade")->isVazio();
        $validacao->getData("preco")->isVazio();
        $validacao->getData("eh_produto")->isVazio();
        $validacao->getData("eh_insumo")->isVazio();
        $validacao->getData("eh_lancamento")->isVazio();
        $validacao->getData("eh_maisvendido")->isVazio();
        
        
        return $validacao;
        
    }
}

